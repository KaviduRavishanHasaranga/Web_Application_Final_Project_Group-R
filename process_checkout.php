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

// Calculate total price
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

            $totalPrice += $productPrice * $productQuantity;
        }
    } else {
        echo "Some items in your cart are no longer available.";
        exit();
    }
} else {
    echo "Your cart is empty.";
    exit();
}

// Insert order into orders table
$sql = "INSERT INTO orders (user_id, order_date, total_price, status) VALUES (?, ?, ?, 'Pending')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isd", $userId, $orderDate, $totalPrice);
$stmt->execute();
$orderId = $stmt->insert_id; // Get the last inserted order ID
$stmt->close();

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

            $sql = "INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiid", $orderId, $productId, $productQuantity, $productPrice);
            $stmt->execute();
            $stmt->close();
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
?>
