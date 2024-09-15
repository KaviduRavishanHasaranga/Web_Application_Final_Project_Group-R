<?php
include 'assets/header.php';
include 'connection.php';

// Check if the "Add to Cart" button was clicked
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_id'])) {
        // User not signed in, show an alert
        echo "<script>alert('Please sign in to add items to your cart.');</script>";
    } else {
        // User is signed in, proceed with adding to cart
        $productId = $_POST['product_id'];

        // Fetch product details from the database
        $sql = "SELECT id, product_name, price, image1_base64 FROM products WHERE id = '$productId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();

            // Initialize the cart if not already done
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Check if the product is already in the cart
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += 1; // Increase quantity
            } else {
                // Add the product to the cart with quantity 1
                $_SESSION['cart'][$productId] = [
                    'name' => $product['product_name'],
                    'price' => $product['price'],
                    'image' => $product['image1_base64'],
                    'quantity' => 1
                ];
            }
        }

        // Redirect back to the shop page (or another page)
        header("Location: shop_data.php?category=" . $_POST['category']);
        exit();
    }
}

// Get the category from the URL
$category = isset($_GET['category']) ? $_GET['category'] : 'default-category';


// Customize the description based on the category
$descriptions = [
    'Blue Sapphire' => 'Blue Sapphires are renowned for their deep, royal blue hue, symbolizing wisdom, virtue, and good fortune. They are often associated with loyalty and trust, making them a popular choice for engagement rings and other meaningful jewelry.',
    'Ruby' => 'Rubies are celebrated for their vibrant red color, representing love, passion, and power. This gemstone is one of the most valuable precious stones, known for its exceptional hardness and brilliant shine.',
    'Yellow Sapphire' => 'Yellow Sapphires are prized for their sunny, golden hue, symbolizing prosperity, wisdom, and success. They are often worn to attract wealth and improve financial status.',
    'Pink Sapphire' => 'Pink Sapphires offer a delicate and romantic pink hue, symbolizing love, compassion, and emotional healing. They are a popular alternative to traditional engagement stones due to their unique color.',
    'White Sapphire' => 'White Sapphires are known for their clear and sparkling appearance, often used as a diamond alternative. They symbolize clarity, purity, and spiritual wisdom.',
    'Padparadscha' => 'Padparadscha Sapphires are highly sought after for their unique and rare pink-orange color, resembling the hues of a lotus flower. This gemstone symbolizes rare beauty and elegance.',
    'Star Sapphire' => 'Star Sapphires display a mesmerizing star-like pattern, known as asterism, when viewed under light. They symbolize destiny, divine guidance, and protection.',
    'Purple Sapphire' => 'Purple Sapphires are admired for their rich and regal purple tones, symbolizing royalty, luxury, and wisdom. They are a striking choice for those seeking a unique and vibrant gemstone.',
    'Garnet' => 'Garnets come in a variety of colors, with deep red being the most well-known. They symbolize friendship, trust, and loyalty. Garnets are also believed to inspire love and devotion.',
    'Tourmaline' => 'Tourmaline is known for its wide array of colors, from vibrant pinks to deep greens. This versatile gemstone is believed to protect against negative energy and enhance understanding and compassion.',
    'Chrysoberyl' => 'Chrysoberyl gemstones, including the rare Alexandrite, are known for their brilliance and striking color-changing properties. They symbolize luck, protection, and balance.',
    'Aquamarine' => 'Aquamarine gemstones are prized for their serene blue color, reminiscent of the sea. They symbolize tranquility, courage, and clear communication, making them a favorite for those seeking inner peace.',
    'Topaz' => 'Topaz comes in various colors, including blue, yellow, and pink. It is believed to bring joy, generosity, abundance, and good health. Blue Topaz, in particular, is associated with calmness and emotional stability.',
    'Spinel' => 'Spinel gemstones are valued for their brilliance and wide range of colors, including vibrant reds, pinks, and blues. They symbolize renewal, revitalization, and protection.',
    'Amethyst' => 'Amethyst is celebrated for its stunning range of purple shades, symbolizing peace, stability, and spiritual awareness. It is often used to calm the mind and protect against negative energy.',
    'Moonstone' => 'Moonstone is admired for its ethereal glow and unique play-of-color, resembling the light of the moon. It symbolizes intuition, balance, and new beginnings.',
];

// Set the description based on the category
$description = $descriptions[$category] ?? 'Category not recognized.';

// Set the background image based on the category
$backgroundImage = 'DescriptionBgImg/' . htmlspecialchars($category) . '.jpg';
?>

<link rel="stylesheet" href="css/store.css">

<div class="main-container">
    <div class="shop-container"
        style="background-image: url('<?php echo $backgroundImage; ?>'); 
                background-size: cover; 
                background-position: center;">
        <div class="gem-title">
            <h1><?php echo ucwords(str_replace('-', ' ', $category)); ?></h1>
            <br>
            <p><?php echo $description; ?></p>
        </div>
    </div>

    <div class="sub-container">
        <!-- Filter Section Code -->
        <aside class="filter-sidebar">
            <div class="filter-section">
                <h3>Location</h3>
                <ul>
                    <li><input type="checkbox" id="location1"><label for="location1">Langley (1)</label></li>
                    <li><input type="checkbox" id="location2"><label for="location2">Sri Lanka (209)</label></li>
                    <li><input type="checkbox" id="location3"><label for="location3">Vancouver (3)</label></li>
                </ul>
            </div>

            <div class="filter-section">
                <h3>Carat Weight</h3>
                <input type="range" min="0" max="103" value="0" id="caratWeightRange">
                <div class="range-values">
                    <span id="rangeMin">0</span> - <span id="rangeMax">103</span> ct
                </div>
            </div>

            <div class="filter-section">
                <h3>Colour</h3>
                <ul>
                    <li><input type="checkbox" id="color1"><label for="color1">Blue (5)</label></li>
                    <li><input type="checkbox" id="color2"><label for="color2">Cornflower Blue (4)</label></li>
                    <li><input type="checkbox" id="color3"><label for="color3">Fancy (1)</label></li>
                </ul>
            </div>

            <div class="filter-section">
                <h3>Shape</h3>
                <ul>
                    <li><input type="checkbox" id="shape1"><label for="shape1">Briolette (1)</label></li>
                    <li><input type="checkbox" id="shape2"><label for="shape2">Cushion (16)</label></li>
                    <li><input type="checkbox" id="shape3"><label for="shape3">Heart (1)</label></li>
                </ul>
            </div>

            <div class="filter-section">
                <h3>Price ($)</h3>
                <input type="range" min="459" max="130485" value="459" id="priceRange">
                <div class="range-values">
                    <span id="priceMin">$459</span> - <span id="priceMax">$130,485</span>
                </div>
            </div>
        </aside>

        <div class="card-container">
            <?php
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch product data based on the category
            $sql = "SELECT id, product_name, image1_base64, price, description FROM products WHERE category = '$category'";
            $result = $conn->query($sql);      
            // Check if any results were returned
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<a href="product_details.php?id=' . $row['id'] . '">';
                    echo '<img src="data:image/jpeg;base64,' . $row["image1_base64"] . '" alt="' . $row["product_name"] . '">';
                    echo '<h3>' . $row["product_name"] . '</h3>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '<div class="price">';
                    echo '<span class="new-price">$' . $row["price"] . '</span>';
                    echo '</a>';
                    echo '</div>';

                    // Add to cart button or alert to sign in
                    if (isset($_SESSION['user_id'])) {
                        echo '<form method="POST" action="shop_data.php">';
                        echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="category" value="' . $category . '">';
                        echo '<button type="submit" name="add_to_cart" class="add-to-cart">Buy Now 🛒</button>';
                        echo '</form>';
                    } else {
                        echo '<button onclick="alert(\'Please sign in to add items to your cart.\')" class="add-to-cart">Add to Cart 🛒</button>';
                    }

                    echo '</div>';
                }
            } else {
                echo "No products found";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</div>

<?php include 'assets/footer.php'; ?>