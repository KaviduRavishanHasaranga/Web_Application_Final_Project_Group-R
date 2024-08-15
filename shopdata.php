<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Gemstone Kingdom</title>
    <link rel="stylesheet" href="css/shop.css">
</head>
<body>
    <!--===Shop Data Section Start===-->
    
    <section class="shop-data">
        <div class="filter-section">
            <h2>Filter by Category</h2>
            <ul class="filter-list">
                <li><a href="#" class="filter-option active">All</a></li>
                <li><a href="#" class="filter-option">Precious</a></li>
                <li><a href="#" class="filter-option">Semi-Precious</a></li>
                <li><a href="#" class="filter-option">Special Offers</a></li>
            </ul>
            <div class="price-filter">
                <h2>Filter by Price</h2>
                <input type="range" min="0" max="5000" value="2500" id="priceRange">
                <p>$0 - <span id="priceValue">2500</span></p>
            </div>
        </div>
        <div class="product-grid">
            <!-- Example Product Item -->
            <a href="itemdetails.php">
            <div class="product-item">
                <img src="https://picsum.photos/300/300?grayscale" alt="Blue Sapphire">
                <h2>Blue Sapphire</h2>
                <p class="price">$2000</p>
                <button class="btn add-to-cart" data-product="Blue Sapphire" data-price="2000">Add to Cart</button>
            </div>
            </a>
            <!-- Add more products here -->
            <a href="itemdetails.php">
            <div class="product-item">
                <img src="https://picsum.photos/300/300?grayscale" alt="Ruby">
                <h2>Ruby</h2>
                <p class="price">$1500</p>
                <button class="btn add-to-cart" data-product="Ruby" data-price="1500">Add to Cart</button>
            </div>
            </a>
            <a href="itemdetails.php">
            <div class="product-item">
                <img src="https://picsum.photos/300/300?grayscale" alt="Emerald">
                <h2>Emerald</h2>
                <p class="price">$1800</p>
                <button class="btn add-to-cart" data-product="Emerald" data-price="1800">Add to Cart</button>
            </div>
            </a>
        </div>
    </section>
    <!--===Shop Data Section End===-->

    <div id="cart" class="cart">
        <h2>Shopping Cart</h2>
        <ul id="cart-items">
            <!-- Cart items will be dynamically added here -->
        </ul>
        <p>Total: $<span id="cart-total">0</span></p>
        <button id="checkout" class="btn">Checkout</button>
    </div>

    <script>
        // Update price filter value
        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');
        priceRange.addEventListener('input', () => {
            priceValue.textContent = priceRange.value;
        });

        // Cart functionality
        const cart = document.getElementById('cart');
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        let total = 0;

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const product = button.getAttribute('data-product');
                const price = parseFloat(button.getAttribute('data-price'));

                total += price;
                cartTotal.textContent = total.toFixed(2);

                const cartItem = document.createElement('li');
                cartItem.textContent = `${product} - $${price.toFixed(2)}`;
                cartItems.appendChild(cartItem);
            });
        });
    </script>
</body>
</html>
