<?php
include 'assets/header.php';
include 'connection.php';

// Get the product ID from the URL
$productId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$productId) {
    echo "Product not found!";
    exit();
}

// Fetch product details from the database
$sql = "SELECT * FROM products WHERE id = '$productId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found!";
    exit();
}

// Handle the add-to-cart functionality
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_id'])) {
        // User not signed in, show an alert
        echo "<script>alert('Please sign in to add items to your cart.');</script>";
    } else {
        // Capture the selected quantity from the form
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        // Ensure the quantity is valid and greater than 0
        if ($quantity < 1) {
            $quantity = 1;
        }

        // Initialize the cart if not already done
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$productId])) {
            // If already in the cart, increase the quantity
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            // Otherwise, add the product to the cart with the selected quantity
            $_SESSION['cart'][$productId] = [
                'name' => $product['product_name'],
                'price' => $product['price'],
                'image' => $product['image1_base64'],
                'quantity' => $quantity
            ];
        }

        // Redirect to the same page after adding to the cart to prevent form re-submission
        header("Location: product_details.php?id=" . $productId);
        exit();
    }
}
?>

<link rel="stylesheet" href="css/product_details.css">

<div class="product-details-container">
    <div class="product-images">
        <div class="main-image">
            <!-- Main image -->
            <img id="main-image" src="data:image/jpeg;base64,<?php echo $product['image1_base64']; ?>" alt="<?php echo $product['product_name']; ?>">
        </div>
        <div class="thumbnail-images">
            <!-- Thumbnails -->
            <img class="thumbnail" src="data:image/jpeg;base64,<?php echo $product['image1_base64']; ?>" alt="Thumbnail 1" data-large-src="data:image/jpeg;base64,<?php echo $product['image1_base64']; ?>">
            <img class="thumbnail" src="data:image/jpeg;base64,<?php echo $product['image2_base64']; ?>" alt="Thumbnail 2" data-large-src="data:image/jpeg;base64,<?php echo $product['image2_base64']; ?>">
            <img class="thumbnail" src="data:image/jpeg;base64,<?php echo $product['image3_base64']; ?>" alt="Thumbnail 3" data-large-src="data:image/jpeg;base64,<?php echo $product['image3_base64']; ?>">
        </div>
    </div>

    <div class="product-info">
        <h1><?php echo $product['product_name']; ?></h1>
        <p><?php echo $product['description']; ?></p>
        <h2>$<?php echo number_format($product['price'], 2); ?></h2>
        <p><?php echo $product['stock_quantity']; ?> in stock</p>

        <form method="POST" action="product_details.php?id=<?php echo $productId; ?>">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo $product['stock_quantity']; ?>">
            <button type="submit" name="add_to_cart" class="add-to-cart">Add to Cart 🛒</button>
        </form>

        <div class="product-description">
            <h3>Product Details</h3>
            <ul>
                <li>Weight: <?php echo $product['weight']; ?> carat</li>
                <li>Clarity: <?php echo $product['clarity']; ?></li>
                <li>Size: <?php echo $product['size']; ?></li>
                <li>Colour: <?php echo $product['color']; ?></li>
                <li>Shape & Cut: <?php echo $product['shape_cut']; ?></li>
                <li>Treatment: <?php echo $product['treatment']; ?></li>
                <li>Certificate: <?php echo $product['certificate']; ?></li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Function to handle thumbnail click event
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('main-image');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Set the main image to the data-large-src attribute of the clicked thumbnail
            const largeSrc = this.getAttribute('data-large-src');
            mainImage.setAttribute('src', largeSrc);
        });
    });
</script>

<?php include 'assets/footer.php'; ?>