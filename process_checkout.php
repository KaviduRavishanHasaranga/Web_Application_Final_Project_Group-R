<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to checkout.";
    exit();
}

$userId = $_SESSION['user_id'];
$orderDate = date('Y-m-d H:i:s');
$totalPrice = 0;
$error = false;
$errorMessage = "";

// Calculate total price and check stock availability
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartItems = array_keys($_SESSION['cart']);
    $cartItemsString = implode(',', array_map('intval', $cartItems));

    $sql = "SELECT id, price, stock_quantity FROM products WHERE id IN ($cartItemsString)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            $productPrice = $row['price'];
            $stockQuantity = $row['stock_quantity'];
            $productQuantity = $_SESSION['cart'][$productId]['quantity'];

            // Check if the ordered quantity exceeds stock quantity
            if ($productQuantity > $stockQuantity) {
                $error = true;
                $errorMessage .= "The quantity for product ID $productId exceeds available stock.<br>";
            }

            // Calculate total price for this product (price * quantity)
            $totalPrice += $productPrice * $productQuantity;
        }
    } else {
        echo "Some items in your cart are no longer available.";
        exit();
    }
    if ($error) {
        echo "<p>There was an issue with your order:</p>";
        echo "<p>$errorMessage</p>";
        echo "<p>Please adjust the quantity of your items.</p>";
        exit(); // Exit to prevent processing the payment
    }
} else {
    echo "Your cart is empty.";
    exit();
}

// Proceed with the payment and deduct stock if no errors
if (!$error) {
    // Assuming the payment is successful (you should integrate with a real payment gateway)
    // Use your payment processing code here

    // Deduct stock quantity after successful payment
    foreach ($_SESSION['cart'] as $productId => $cartItem) {
        $productQuantity = $cartItem['quantity'];

        // Update the stock quantity in the database
        $sqlUpdateStock = "UPDATE products SET stock_quantity = stock_quantity - ? WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdateStock);
        $stmt->bind_param("ii", $productQuantity, $productId);
        $stmt->execute();
        $stmt->close();
    }

    // Insert order into orders table
    $sql = "INSERT INTO orders (user_id, order_date, total_price, status) VALUES (?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isd", $userId, $orderDate, $totalPrice);
    $stmt->execute();
    $orderId = $stmt->insert_id; // Get the last inserted order ID
    $stmt->close();

    // Insert each product into the order_items table
    foreach ($_SESSION['cart'] as $productId => $cartItem) {
        $productQuantity = $cartItem['quantity'];
        $productPrice = $cartItem['price'];

        // Insert order items into order_items table
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cartItems = array_keys($_SESSION['cart']);
            $cartItemsString = implode(',', array_map('intval', $cartItems));

            $sql = "SELECT id, price FROM products WHERE id IN ($cartItemsString)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $productId = $row['id'];
                    $productPrice = $row['price'];
                    $productQuantity = $_SESSION['cart'][$productId]['quantity'];

                    // Insert order details into order_items table
                    $sql = "INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("iiid", $orderId, $productId, $productQuantity, $productPrice);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
    }
}

// Insert payment into payments table
$paymentMethod = $_POST['payment_method'];
$cardNumber = $_POST['card_number']; // In practice, use a secure payment gateway
$cardExpiry = $_POST['card_expiry'];
$cardCvc = $_POST['card_cvc'];
$nameOnCard = $_POST['name_on_card'];

// For demonstration purposes, you may want to handle these details securely
$sql = "INSERT INTO payments (order_id, payment_date, amount, payment_method, payment_status) VALUES (?, ?, ?, ?, 'Completed')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isds", $orderId, $orderDate, $totalPrice, $paymentMethod);
$stmt->execute();
$stmt->close();

// Clear cart
unset($_SESSION['cart']);

// Redirect to thank you page or order confirmation
header("Location: thank_you.php");
exit();