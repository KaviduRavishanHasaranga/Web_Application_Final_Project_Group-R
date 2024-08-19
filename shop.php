<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-Gemstone Kingdom</title>
    <link rel="favicon" type="image/jpg" href="logo.jpg">

    <!-- ==== CSS File Links ====-->
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\subpages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ==== Google Fonts Links ====-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="css\shop.css">
</head>

<body>
    <!--===Header Section Start===-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="Images/logo.png">
            </div>

            <div>
                <ul class="navmenu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="information.php">Information</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="nav-icon">
                <a href="#"><i class='bx bx-search'></i></a>
                <a href="#"><i class='bx bxs-user'></i></a>
                <a href="#"><i class='bx bx-cart'></i></a>

                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </nav>
    </header>
    <!--===Header Section Close===-->

    <!---===item main container===-->
    <div class="one">
    <div class="one-container">
        <div class="filterSecion">
            <div class="filtercontainer">
            <h1>Filter by Category</h1>
            
            <!--Carat Weight control-->
            <div class="price-filter">
            Carat Weight
                <input type="range" min="0" max="1840" value="920" id="priceRange">
                 <p>Carat 0 - <span id="priceValue">1840</span></p>
            </div>

                <div class="price">
                </div><br>
                <div class="filtercontainer">
    

    
    <div class="dropdown">
        <button class="dropdown-toggle">Gem Type</button>
        <div class="dropdown-content">
            <label class="dropdown-item">
                <input type="radio" name="gemType" value="Alexandrite"> Alexandrite
            </label>
            <label class="dropdown-item">
                <input type="radio" name="gemType" value="Amethyst"> Amethyst
            </label>
            <label class="dropdown-item">
                <input type="radio" name="gemType" value="Apatite"> Apatite
            </label>
            <label class="dropdown-item">
                <input type="radio" name="gemType" value="Aquamarine"> Aquamarine
            </label>
            <label class="dropdown-item">
                <input type="radio" name="gemType" value="Blue Sapphire"> Blue Sapphire
            </label>
        </div>
    </div>
</div>


<div class="dropdown">
        <button class="dropdown-toggle">Colour Type</button>
        <div class="dropdown-content">
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Alexandrite Cat's Eye"> Alexandrite Cat's Eye
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Blue"> Blue
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Blue Green Changing to Red"> Blue Green Changing to Red
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Blueish to Purplish"> Blueish to Purplish
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Corm Flower"> Corm Flower
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Corn Flower Blue"> Corn Flower Blue
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Cornflower"> Cornflower 
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Cornflower blue"> Cornflower blue
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Cornflower Blue"> Cornflower Blue
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Dark Pink"> Dark Pink
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Deep Yellow"> Deep Yellow

            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Fancy"> Fancy

            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Forest Green"> Forest Green
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Green"> Green

            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Green Blue"> Green Blue

            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Greenish Yellow"> Greenish Yellow
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Honey"> Honey
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Honey Cat's Eye"> Honey Cat's Eye
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Kashmir Blue"> Kashmir Blue
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Light Blue"> Light Blue

            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Light Green"> Light Green
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Medium Blue"> Medium Blue
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Medium Yellow"> Medium Yellow
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Mix"> Mix
            </label>
            <label class="dropdown-item">
                <input type="radio" name="colourType" value="Multi Colour"> Multi Colour
            </label>
            
        </div>
    </div>
</div>

<div class="dropdown">
        <button class="dropdown-toggle">Shape</button>
        <div class="dropdown-content">
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Baguette"> Baguette
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Briolette"> Briolette

            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Cabochon"> Cabochon
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="cushion"> cushion
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Heart"> Heart
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Marquise"> Marquise
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Mix"> Mix
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Octagon"> Octagon
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Oval"> Oval
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Oval/Pear"> Oval/Pear
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Pear"> Pear
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="pear"> pear
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Radiant"> Radiant
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Rectangle"> Rectangle
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Rectangle cushion"> Rectangle cushion
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Rectangular Cushion"> Rectangular Cushion
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Round"> Round
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Square"> Square
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Square Cushion"> Square Cushion
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Tapered Baguette"> Tapered Baguette
            </label>
            <label class="dropdown-item">
                <input type="radio" name="shape" value="Trigonal"> Trigonal
            </label>

        </div>
    </div>
     <!--price control-->
     <div class="price-filter">
            Price
                <input type="range" min="0" max="5000" value="2500" id="priceRange">
                 <p>Rs:0 - <span id="priceValue">2500</span></p>
            </div>
</div>

        
           
           
            
           
        </div>

        <dev class="all">
        <section class="start">
            <h1>Jem Colection</h1><br>
            <div class="start-container">
                
               
                <div class="start-colum"> 
                    <a href="shopdata.php" id="BLUE_SAPPHIRE">
                    <img src="Images/BLUE SAPPHIRE-1.jpg" alt="this is jem picture" class="one-image-f"> 
                    <P>Precious Gemstones</P>
                    <p>RS 150000</p>
                    <button id="jembutton"><h1>BLUE SAPPHIRE</h1></button>
                   
                </a>
                </div>
       
               
                <div class="start-colum">
                <a href="shopdata.php" id="RUBY">
                    <img src="Images/ruby-2.jpg" alt="this is jem picture" class="one-image-f">
                   <p>Precious Gemstones</p>
                   <p>Rs 225000</p>
                    <button id="jembutton"><h1>RUBY</h1></button>
                </a>
                </div>

                
                <div class="start-colum">
                    <a href="shopdata.php" id="PINK_SAPPHIRE">
                    <img src="Images/Pink Sapphire.jpg" alt="this is jem picture" class="one-image-f">
                    <p>Precious Gemstones</p>
                    <p>Rs 175000</P>
                    <button id="jembutton"><h1>PINK SAPPHIRE</h1></button>
                </a>
                </div>

                
                <div class="start-colum">
                    <a href="shopdata.php" id="WHITE_SAPPHIRE">
                    <img src="Images/whitesapphire.jpeg" alt="this is jem picture" class="one-image-f">
                    <p>Precious Gemstones</p>
                    <p>Rs 135623</p>
                    <button id="jembutton"><h1>WHITE SAPPHIRE</h1></button>
                </a>
                </div>
                
                
                <div class="start-colum">
                    <a href="shopdata.php" id="PADPARADSCHA">
                    <img src="Images/PADPARADSCHA.jpg" alt="this is jem picture" class="one-image-f">
                    <p>Precious Gemstones</p>
                    <p>Rs 145000</p>
                    <button id="jembutton"><h1>PADPARADSCHA</h1></button>
                </a>
                </div>
                
                
                <div class="start-colum">
                    <a href="shopdata.php" id="STAR_SAPPHIRE">
                    <img src="Images/STAR SAPPHIRE-1.jpg" alt="this is jem picture" class="one-image-f">
                    <p>Precious Gemstones</p>
                    <p>Rs 135850</p>
                    <button id="jembutton"><h1>STAR SAPPHIRE</h1></button>
                </a>
                </div>

                
                <div class="start-colum">
                    <a href="shopdata.php" id="PURPLE_SAPPHIRE">
                    <img src="Images/Purple Sapphire-1.jpg" alt="this is jem picture" class="one-image-f">
                    <p>Precious Gemstones</p>
                    <p>Rs 11010</p>
                    <button id="jembutton"><h1>PURPLE SAPPHIRE</h1></button>
                    </a>
                </div>

                
                <div class="start-colum">
                    <a href="shopdata.php" id="YELLOW_SAPPHIRE">
                    <img src="Images/YELLOW SAPPHIRE.jpg" alt="this is jem picture" class="one-image-f">
                    <p>Precious Gemstones</p>
                    <p>Rs 125623</p>
                   <button id="jembutton"> <h1>YELLOW SAPPHIRE</h1></button>
                </div>
                </a>
            </div>
        </section>  
        </dev>    

        </div>
    </div>
</div>

  




    <!--===Footer Section Start===-->
    <footer class="footer">
        <div class="container">
            <div class="footer-col">
                <h2>Our Specialties</h2>
                <ul>
                    <li><a href="#"> We sell Fresh stones only (unused).</a></li>
                    <hr>
                    <li><a href="#"> We send goods with 100% insurance.</a></li>
                    <hr>
                    <li><a href="#"> All Gemstones are Worldwide shipped by Free of Charges.</a></li>
                    <hr>
                    <li><a href="#"> We courier your purchased item(s) at your address within 24 hours.</a></li>
                    <hr>
                    <li><a href="#"> Our sales department keeps in touch with you after your purchase until reaching
                            goods at your home.</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h2>Precious Gemstones</h2>
                <ul>
                    <li><a href="#">Blue Sapphire</a></li>
                    <hr>
                    <li><a href="#">Ruby</a></li>
                    <hr>
                    <li><a href="#">Yellow Sapphire</a></li>
                    <hr>
                    <li><a href="#">Pink Sapphire</a></li>
                    <hr>
                    <li><a href="#">White Sapphire</a></li>
                    <hr>
                    <li><a href="#">Padparadscha</a></li>
                    <hr>
                    <li><a href="#">Star Sapphire</a></li>
                    <hr>
                    <li><a href="#">Purple Sapphire</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h2>Semi Precious Gemstones</h2>
                <ul>
                    <li><a href="#">Garnet</a></li>
                    <hr>
                    <li><a href="#">Tourmaline</a></li>
                    <hr>
                    <li><a href="#">Chrysoberyl</a></li>
                    <hr>
                    <li><a href="#">Aqamarine</a></li>
                    <hr>
                    <li><a href="#">Topaz</a></li>
                    <hr>
                    <li><a href="#">Spinel</a></li>
                    <hr>
                    <li><a href="#">Amethyst</a></li>
                    <hr>
                    <li><a href="#">Moonstone</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="gia-img">
                    <img src="/Images/cc1.png" alt="">
                    <p>We Provide NGJA Authorized Certificate with All Our Gemstones.
                        www.gemsinsrilanka.com Manage by ROYAL GEMSTONE PARADICE (PVT) LTD – Since 2024.</p>
                </div>
            </div>
        </div>
    </footer>
    <!--===Footer Section End===-->
    <div class="copyright-text">
        <p>Copyright 2024 &copy; ROYAL GEMSTONE PARADICE (PVT) LTD</p>
    </div>
</body>

</html>