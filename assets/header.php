<?php
session_start();
include 'connection.php'; // Include your database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Gemstone Kingdom</title>
    <link rel="icon" type="image/jpg" href="logo.jpg">

    <!-- ==== CSS File Links ====-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/subpages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ==== Google Fonts Links ====-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <!-- ==== JavaScript File Links ====-->
    <script src="js/cart.js"></script>
    <script src="js/script.js"></script>

</head>

<body>
    <!--===Header Section Start===-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="Images/logo.png" alt="Logo">
            </div>

            <div>
                <ul class="navmenu">
                    <li><a href="index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="shop.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'shop.php') ? 'active' : ''; ?>">Shop</a></li>
                    <li><a href="blog.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'blog.php') ? 'active' : ''; ?>">Blog</a></li>
                    <li><a href="events.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'events.php') ? 'active' : ''; ?>">Events</a></li>
                    <li><a href="information.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'information.php') ? 'active' : ''; ?>">Information</a></li>
                    <li><a href="about.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">About Us</a></li>
                    <li><a href="contact.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">Contact Us</a></li>
                </ul>
            </div>

            <div class="nav-icon">
                <a href="#"><i class='bx bx-search'></i></a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="logout.php"><i class='bx bxs-user'></i>Log out</a>
                <?php else: ?>
                    <a href="sign_in.php"><i class='bx bxs-user'></i>Sign In</a>
                <?php endif; ?>
                <a href="checkout.php"><i class='bx bx-cart'></i></a>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </nav>
    </header>
    <!--===Header Section Close===-->

    <!-- Rest of the page content -->
