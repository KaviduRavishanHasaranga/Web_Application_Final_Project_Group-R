<?php
session_start();
include 'assets/header.php';
include 'connection.php';

// Handle removal of items from the cart
if (isset($_POST['remove_from_cart'])) {
    $productIdToRemove = $_POST['product_id'];

    // Check if the product exists in the cart, then remove it
    if (isset($_SESSION['cart'][$productIdToRemove])) {
        unset($_SESSION['cart'][$productIdToRemove]);

        // If the cart is now empty, remove the session variable
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

    // Redirect to avoid form resubmission issues
    header("Location: checkout.php");
    exit();
}
?>

<link rel="stylesheet" href="css/shop.css">

<div class="container">
    <div class="checkout">
        <form action="process_checkout.php" method="POST" class="checkout-form">
            <h2>Express checkout</h2>
            <div class="express-checkout-buttons">
                <button type="button" class="shop-pay"><i class="fa-brands fa-paypal"></i>&nbsp;&nbsp;PayPal</button>
                <button type="button" class="gpay"><i class="fa-brands fa-google-pay"></i></button>
            </div>



            <!-- Delivery Options -->
            <h2>Delivery</h2>
            <div class="delivery-options">
                <input type="radio" id="ship" name="delivery" value="ship" checked>
                <label for="ship">Ship</label>
                <input type="radio" id="pickup" name="delivery" value="pickup">
                <label for="pickup">Pickup in store</label>
            </div>

        
            <!-- Shipping Method -->
            <h2>Shipping method</h2>
            <div class="form-section full">
                <label for="shipping">Enter your shipping address to view available shipping methods.</label>
            </div>

            <!-- Payment Information -->
            <h2>Payment</h2>
            <div class="form-section full">
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <!-- Add more payment methods as needed -->
                </select>
            </div>
            <div class="form-section full">
                <label for="card_number">Card number:</label>
                <input type="text" id="card_number" name="card_number" required>
            </div>
            <div class="form-section full">
                <label for="card_expiry">Expiration date (MM / YY):</label>
                <input type="text" id="card_expiry" name="card_expiry" required>
            </div>
            <div class="form-section full">
                <label for="card_cvc">Security code:</label>
                <input type="text" id="card_cvc" name="card_cvc" required>
            </div>
            <div class="form-section full">
                <label for="name_on_card">Name on card:</label>
                <input type="text" id="name_on_card" name="name_on_card" required>
            </div>
            <div class="form-section full">
                <input type="checkbox" id="same_billing" name="same_billing" checked>
                <label for="same_billing">Use shipping address as billing address</label>
            </div>

            <div class="form-section full">
                <input type="checkbox" id="remember_me" name="remember_me">
                <label for="remember_me">Save my information for a faster checkout</label>
            </div>

            <button type="submit" class="pay-now"><a href="payment_sucessfull.php"></a>Pay now</button>
        </form>
    </div>

    <hr>

    <div class="order">
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cartItems = array_keys($_SESSION['cart']);
            $cartItemsString = implode(',', array_map('intval', $cartItems)); // Ensure integers are used in query

            $sql = "SELECT id, product_name, image1_base64, price FROM products WHERE id IN ($cartItemsString)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="order-item">';
                    echo '<div><img src="data:image/jpeg;base64,' . $row["image1_base64"] . '" alt="' . $row["product_name"] . '" class="order-item-image"></div>';
                    echo '<div><h3>' . $row["product_name"] . '</h3>';
                    echo '<p>$' . $row["price"] . '</p>';
                    echo '</div>';

                    // Add the "Remove" button
                    echo '<form method="POST" action="checkout.php">';
                    echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                    echo '<button type="submit" name="remove_from_cart" class="remove-from-cart">Remove</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>

        <div class="order-summary">
            <h3>Order Summary</h3>
            <?php
            $totalPrice = 0;
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $cartItems = array_keys($_SESSION['cart']);
                $cartItemsString = implode(',', array_map('intval', $cartItems)); // Ensure integers are used in query

                $sql = "SELECT price FROM products WHERE id IN ($cartItemsString)";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $totalPrice += $row["price"];
                    }
                }
            }
            ?>
            <div class="order-summary-item">
                <span>Subtotal</span>
                <span>$<?php echo number_format($totalPrice, 2); ?></span>
            </div>
            <div class="order-summary-item">
                <span>Shipping</span>
                <span>Enter shipping address</span>
            </div>
            <div class="order-summary-item">
                <span class="order-summary-total">Total</span>
                <span class="order-summary-total">USD $<?php echo number_format($totalPrice, 2); ?></span>
            </div>
        </div>
    </div>
</div>

<?php include 'assets/footer.php'; ?>