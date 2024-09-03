<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-Gemstone Kingdom</title>

    <link rel="favicon" type="image/jpg" href="logo.jpg">

    <!-- ==== CSS File Links ====-->
    <link rel="stylesheet" href="css/porduct_info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!--===Header Section Start===-->
    <header>
        <!-- Your existing header content -->
    </header>
    <!--===Header Section Close===-->

    <div class="container">

    <?php
    // Assuming the product ID is passed via a GET parameter
    $product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

    // Fetch product details from the database using a prepared statement
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of the selected product
        $row = $result->fetch_assoc();
    ?>

        <!-- Image Box -->
         <!--
        <div class="images">
            <img class="main_image" src="Images/<?php echo htmlspecialchars($row['main_image']); ?>" id="mainImg">
            <div class="child_image">
                <div class="child_image_col">
                    <img src="Images/<?php echo htmlspecialchars($row['image_1']); ?>" class="childImg">
                </div>
                <div class="child_image_col">
                    <img src="Images/<?php echo htmlspecialchars($row['image_2']); ?>" class="childImg">
                </div>
                <div class="child_image_col">
                    <img src="Images/<?php echo htmlspecialchars($row['image_3']); ?>" class="childImg">
                </div>
            </div>
        </div>  
    -->

        <!--new image box -->

        <div class="images">
        <!-- Main Image -->
        <img class="main_image" src="data:image/jpeg;base64,<?php echo htmlspecialchars($row['main_image']); ?>" id="mainImg">
    
        <div class="child_image">
        <!-- Child Image 1 -->
            <div class="child_image_col">
                 <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($row['image_1']); ?>" class="childImg">
            </div>
        <!-- Child Image 2 -->
            <div class="child_image_col">
                 <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($row['image_2']); ?>" class="childImg">
            </div>
        <!-- Child Image 3 -->
            <div class="child_image_col">
                <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($row['image_3']); ?>" class="childImg">
            </div>
         </div>
        </div>


        <!-- Product Details -->
        <div class="product_details">
            <h1><?php echo htmlspecialchars($row['name']); ?></h1>
            <div class="price">Rs <?php echo number_format($row['price'], 2); ?></div>
            <div class="stock_info"><?php echo $row['stock']; ?> in stock</div>
            <div class="quantity">
                <label for="quantity">Quantity</label>
                <input class="quantity_box" type="number" id="quantity" name="quantity" min="1" max="<?php echo $row['stock']; ?>" value="1">
            </div>
            <div class="add_to_cart">
                <button>Add to Cart</button>
                <button>Buy Now</button>
            </div>
            <div class="pickup">Pickup available at <?php echo htmlspecialchars($row['pickup_location']); ?></div>

            <!-- Gem Info -->
            <div class="gem_info">
                <p>Gem type: <?php echo htmlspecialchars($row['gem_type']); ?></p>
                <p>Weight: <?php echo htmlspecialchars($row['weight']); ?> carat</p>
                <p>Clarity: <?php echo htmlspecialchars($row['clarity']); ?></p>
                <p>Size: <?php echo htmlspecialchars($row['size']); ?></p>
                <p>Color: <?php echo htmlspecialchars($row['color']); ?></p>
                <p>Shape & Cut: <?php echo htmlspecialchars($row['shape_cut']); ?></p>
                <p>Treatment: <?php echo htmlspecialchars($row['treatment']); ?></p>
                <p>Certificate: <?php echo htmlspecialchars($row['certificate']); ?></p>
            </div> 
        </div>       

    <?php
    } else {
        echo "Product not found.";
    }

    $stmt->close();
    $conn->close();
    ?>

    </div>

    <script>
        var mainImg = document.getElementById("mainImg");
        var childImg = document.getElementsByClassName("childImg");

        for(let i=0;i<childImg.length;i++){
            childImg[i].onclick=function(){
                mainImg.src=childImg[i].src;
            }
        }
    </script>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
