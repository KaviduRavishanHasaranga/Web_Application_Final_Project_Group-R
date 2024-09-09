<?php include 'assets/header.php';
include 'connection.php';

// Fetch user details if logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT fname, lname, country, company, apartment, address, city, state, zip_code, phone FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        // If no user found, handle the error (optional)
        echo "<p>User details not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Please log in to continue to checkout.</p>";
    exit(); // Stop execution if the user is not logged in
}

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

        <h2>Express checkout</h2>
        <!-- Display user details -->
        <div class="con">
            <div class="ship">
                <h3>Shipping Information</h3>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?></p>
                <p><strong>Address:</strong> <?php
                                                echo htmlspecialchars($user['address']) . ', ';
                                                if (!empty($user['apartment'])) {
                                                    echo htmlspecialchars($user['apartment']) . ', ';
                                                }
                                                echo htmlspecialchars($user['city']) . '<br>' . htmlspecialchars($user['state']) . ' ' . htmlspecialchars($user['zip_code']) . '<br>';
                                                echo htmlspecialchars($user['country']);
                                                ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
            </div>
            <div class="but">
                <!-- Edit button to toggle form -->
                <button type="button" id="edit-address-btn" class="edit-btn">Edit</button>
            </div>
        </div>

        <!-- Shipping address form (hidden by default) -->
        <div id="edit-address-form" class="edit-address-form" style="display: none;">
            <form action="edit_address_checkout.php" method="POST">
                <div class="form-section full">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($user['fname']); ?>" required>
                </div>
                <div class="form-section full">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($user['lname']); ?>" required>
                </div>
                <div class="form-section full">
                    <label for="country">Country:</label>
                    <select id="country" name="country" required>
                        <option value="Albania" <?php if ($user['country'] === 'Albania') echo 'selected'; ?>>Albania</option>
                        <option value="Andorra" <?php if ($user['country'] === 'Andorra') echo 'selected'; ?>>Andorra</option>
                        <option value="Austria" <?php if ($user['country'] === 'Austria') echo 'selected'; ?>>Austria</option>
                        <option value="Belarus" <?php if ($user['country'] === 'Belarus') echo 'selected'; ?>>Belarus</option>
                        <option value="Belgium" <?php if ($user['country'] === 'Belgium') echo 'selected'; ?>>Belgium</option>
                        <option value="Bosnia and Herzegovina" <?php if ($user['country'] === 'Bosnia and Herzegovina') echo 'selected'; ?>>Bosnia and Herzegovina</option>
                        <option value="Bulgaria" <?php if ($user['country'] === 'Bulgaria') echo 'selected'; ?>>Bulgaria</option>
                        <option value="Croatia (Hrvatska)" <?php if ($user['country'] === 'Croatia (Hrvatska)') echo 'selected'; ?>>Croatia (Hrvatska)</option>
                        <option value="Cyprus" <?php if ($user['country'] === 'Cyprus') echo 'selected'; ?>>Cyprus</option>
                        <option value="Czech Republic" <?php if ($user['country'] === 'Czech Republic') echo 'selected'; ?>>Czech Republic</option>
                        <option value="Denmark" <?php if ($user['country'] === 'Denmark') echo 'selected'; ?>>Denmark</option>
                        <option value="Estonia" <?php if ($user['country'] === 'Estonia') echo 'selected'; ?>>Estonia</option>
                        <option value="Faroe Islands" <?php if ($user['country'] === 'Faroe Islands') echo 'selected'; ?>>Faroe Islands</option>
                        <option value="Finland" <?php if ($user['country'] === 'Finland') echo 'selected'; ?>>Finland</option>
                        <option value="France" <?php if ($user['country'] === 'France') echo 'selected'; ?>>France</option>
                        <option value="Germany" <?php if ($user['country'] === 'Germany') echo 'selected'; ?>>Germany</option>
                        <option value="Gibraltar" <?php if ($user['country'] === 'Gibraltar') echo 'selected'; ?>>Gibraltar</option>
                        <option value="Greece" <?php if ($user['country'] === 'Greece') echo 'selected'; ?>>Greece</option>
                        <option value="Greenland" <?php if ($user['country'] === 'Greenland') echo 'selected'; ?>>Greenland</option>
                        <option value="Holy See (Vatican City State)" <?php if ($user['country'] === 'Holy See (Vatican City State)') echo 'selected'; ?>>Holy See (Vatican City State)</option>
                        <option value="Hungary" <?php if ($user['country'] === 'Hungary') echo 'selected'; ?>>Hungary</option>
                        <option value="Iceland" <?php if ($user['country'] === 'Iceland') echo 'selected'; ?>>Iceland</option>
                        <option value="Ireland" <?php if ($user['country'] === 'Ireland') echo 'selected'; ?>>Ireland</option>
                        <option value="Italy" <?php if ($user['country'] === 'Italy') echo 'selected'; ?>>Italy</option>
                        <option value="Latvia" <?php if ($user['country'] === 'Latvia') echo 'selected'; ?>>Latvia</option>
                        <option value="Liechtenstein" <?php if ($user['country'] === 'Liechtenstein') echo 'selected'; ?>>Liechtenstein</option>
                        <option value="Lithuania" <?php if ($user['country'] === 'Lithuania') echo 'selected'; ?>>Lithuania</option>
                        <option value="Luxembourg" <?php if ($user['country'] === 'Luxembourg') echo 'selected'; ?>>Luxembourg</option>
                        <option value="Macedonia" <?php if ($user['country'] === 'Macedonia') echo 'selected'; ?>>Macedonia</option>
                        <option value="Malta" <?php if ($user['country'] === 'Malta') echo 'selected'; ?>>Malta</option>
                        <option value="Moldova" <?php if ($user['country'] === 'Moldova') echo 'selected'; ?>>Moldova</option>
                        <option value="Monaco" <?php if ($user['country'] === 'Monaco') echo 'selected'; ?>>Monaco</option>
                        <option value="Montenegro" <?php if ($user['country'] === 'Montenegro') echo 'selected'; ?>>Montenegro</option>
                        <option value="Netherlands" <?php if ($user['country'] === 'Netherlands') echo 'selected'; ?>>Netherlands</option>
                        <option value="Norway" <?php if ($user['country'] === 'Norway') echo 'selected'; ?>>Norway</option>
                        <option value="Poland" <?php if ($user['country'] === 'Poland') echo 'selected'; ?>>Poland</option>
                        <option value="Portugal" <?php if ($user['country'] === 'Portugal') echo 'selected'; ?>>Portugal</option>
                        <option value="Romania" <?php if ($user['country'] === 'Romania') echo 'selected'; ?>>Romania</option>
                        <option value="San Marino" <?php if ($user['country'] === 'San Marino') echo 'selected'; ?>>San Marino</option>
                        <option value="Serbia" <?php if ($user['country'] === 'Serbia') echo 'selected'; ?>>Serbia</option>
                        <option value="Slovakia" <?php if ($user['country'] === 'Slovakia') echo 'selected'; ?>>Slovakia</option>
                        <option value="Slovenia" <?php if ($user['country'] === 'Slovenia') echo 'selected'; ?>>Slovenia</option>
                        <option value="Spain" <?php if ($user['country'] === 'Spain') echo 'selected'; ?>>Spain</option>
                        <option value="Svalbard and Jan Mayen Islands" <?php if ($user['country'] === 'Svalbard and Jan Mayen Islands') echo 'selected'; ?>>Svalbard and Jan Mayen Islands</option>
                        <option value="Sweden" <?php if ($user['country'] === 'Sweden') echo 'selected'; ?>>Sweden</option>
                        <option value="Switzerland" <?php if ($user['country'] === 'Switzerland') echo 'selected'; ?>>Switzerland</option>
                        <option value="Turkey" <?php if ($user['country'] === 'Turkey') echo 'selected'; ?>>Turkey</option>
                        <option value="Ukraine" <?php if ($user['country'] === 'Ukraine') echo 'selected'; ?>>Ukraine</option>
                        <option value="United Kingdom" <?php if ($user['country'] === 'United Kingdom') echo 'selected'; ?>>United Kingdom</option>
                        <option value="United States" <?php if ($user['country'] === 'United States') echo 'selected'; ?>>United States</option>
                    </select>
                </div>
                <div class="form-section full">
                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($user['company']); ?>">
                </div>
                <div class="form-section full">
                    <label for="address">Street, house/apartment/unit:</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>
                </div>
                <div class="form-section full">
                    <label for="apartment">Apt, suite, unit, etc (optional):</label>
                    <input type="text" id="apartment" name="apartment" value="<?php echo htmlspecialchars($user['apartment']); ?>">
                </div>
                <div class="form-section full">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" required>
                </div>
                <div class="form-section full">
                    <label for="state">State/Province</label>
                    <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($user['state']); ?>" required>
                </div>
                <div class="form-section full">
                    <label for="zip_code">ZIP Code:</label>
                    <input type="text" id="zip_code" name="zip_code" value="<?php echo htmlspecialchars($user['zip_code']); ?>" required>
                </div>
                <div class="form-section full">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                </div>
                <button type="submit" name="update_address" class="save-btn">Save</button>
            </form>
        </div>


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
        <form action="process_checkout.php" method="POST" class="checkout-form">
            <div class="form-section full">
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                </select>
            </div>
            <div class="form-section full">
                <label for="card_number">Card number:</label>
                <input type="text" id="card_number" name="card_number" pattern="\d{13,19}" title="Enter a valid card number (13-19 digits)" required>
            </div>
            <div class="form-section full">
                <label for="card_expiry">Expiration date (MM / YY):</label>
                <input type="text" id="card_expiry" name="card_expiry" pattern="\d{2}/\d{2}" title="Enter a valid expiration date (MM/YY)" required>
            </div>
            <div class="form-section full">
                <label for="card_cvc">Security code:</label>
                <input type="text" id="card_cvc" name="card_cvc" pattern="\d{3,4}" title="Enter a valid security code (3 or 4 digits)" required>
            </div>
            <div class="form-section full">
                <label for="name_on_card">Name on card:</label>
                <input type="text" id="name_on_card" name="name_on_card" required>
            </div>
            <button type="submit" class="pay-now">Pay now</button>
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
                    $productId = $row['id'];
                    $productName = $row['product_name'];
                    $productImage = $row['image1_base64'];
                    $productPrice = $row['price'];
                    $productQuantity = $_SESSION['cart'][$productId]['quantity']; // Fetch quantity from the session

                    echo '<div class="order-item">';
                    echo '<div><img src="data:image/jpeg;base64,' . $productImage . '" alt="' . $productName . '" class="order-item-image"></div>';
                    echo '<div><h3>' . $productName . '</h3>';
                    echo '<p>Price: $' . $productPrice . '</p>';
                    echo '<p>Quantity: ' . $productQuantity . '</p>'; // Show the quantity
                    echo '<p>Total: $' . ($productPrice * $productQuantity) . '</p>'; // Show total price for that item
                    echo '</div>';

                    // Add the "Remove" button
                    echo '<form method="POST" action="checkout.php">';
                    echo '<input type="hidden" name="product_id" value="' . $productId . '">';
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

                $sql = "SELECT id, price FROM products WHERE id IN ($cartItemsString)";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['id'];
                        $productPrice = $row['price'];
                        $productQuantity = $_SESSION['cart'][$productId]['quantity']; // Get the quantity of the product from the session

                        // Calculate total price for this product (price * quantity)
                        $totalPrice += $productPrice * $productQuantity;
                    }
                }
            }
            ?>
            <div class="order-summary-item">
                <span>Subtotal</span>
                <span>$<?php echo number_format($totalPrice, 2); ?></span> <!-- Subtotal based on quantity -->
            </div>
            <div class="order-summary-item">
                <span>Shipping</span>
                <span>
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        // Show DHL VIP when the cart has items
                        echo 'DHL VIP';
                    } else {
                        // If no items in the cart, show the message to enter a shipping address
                        echo 'Enter shipping address';
                    }
                    ?>
                </span>
            </div>

            <div class="order-summary-item">
                <span class="order-summary-total">Total</span>
                <span class="order-summary-total">USD $<?php echo number_format($totalPrice, 2); ?></span> <!-- Total is the same as subtotal for now -->
            </div>
        </div>
    </div>
</div>


<script src="js\script.js"></script>
<?php include 'assets/footer.php'; ?>