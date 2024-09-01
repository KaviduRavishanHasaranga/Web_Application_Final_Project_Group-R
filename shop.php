<?php include 'assets/header.php'; ?>

<!--===Shop Section Start===-->
<section class="shop-section">
        <div class="container">
            <div class="sidebar">
                <h2>Categories</h2>
                <ul>
                    <li><a href="#">Blue Sapphire</a></li>
                    <li><a href="#">Ruby</a></li>
                    <li><a href="#">Yellow Sapphire</a></li>
                    <li><a href="#">Pink Sapphire</a></li>
                    <li><a href="#">Garnet</a></li>
                    <li><a href="#">Tourmaline</a></li>
                </ul>
                <h2>Filter by Price</h2>
                <input type="range" min="0" max="10000" value="5000" class="price-range">
                <button class="filter-btn">Apply Filter</button>
            </div>
            <div class="shop-items">
                <?php for ($i=0;$i<8;$i++) { ?>
                        <div class="item-card">
                            <img src="Images\shop_items\ruby-3.jpg" alt="Blue Sapphire">
                            <h3>Blue Sapphire</h3>
                            <p>$500</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                <?php } ?>

                <!-- Repeat similar item cards for other gemstones -->
            </div>
        </div>
    </section>
    <!--===Shop Section End===-->


<?php include 'assets/footer.php'; ?>