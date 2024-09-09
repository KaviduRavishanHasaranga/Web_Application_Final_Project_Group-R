<?php
session_start();
include 'assets\header.php'; // Your database connection file
require 'connection.php'; // Your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUp'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = $_POST['country'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $apartment = $_POST['apartment'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $phone = $_POST['phone'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, country, company, address, apartment, city, state, zip_code, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $fname, $lname, $email, $password, $country, $company, $address, $apartment, $city, $state, $zip_code, $phone);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<link rel="stylesheet" href="css/login.css">

<div class="container" id="signUp">
    <h1 class="form-title">Register</h1>
    <form method="post" action="sign_up.php">
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="fname" id="fname" placeholder="First Name">
            <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lname" id="lname" placeholder="Last Name">
            <label for="lname">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <div class="form-section full">
            <label for="country" class="cou">Country/Region:</label>
            <div class="input-group">
                <i class="fas fa-globe"></i>
                <select id="country" name="country" required>
                    <!-- Add your country options here -->
                </select>
            </div>
        </div>
        <div class="input-group">
            <i class="fas fa-building"></i>
            <input type="text" id="company" name="company" placeholder="Company (optional)">
            <label for="company">Company (optional)</label>
        </div>
        <div class="input-group">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" id="address" name="address" placeholder="Address" required>
            <label for="address">Address</label>
        </div>
        <div class="input-group">
            <i class="fas fa-home"></i>
            <input type="text" id="apartment" name="apartment" placeholder="Apartment, suite, etc. (optional)">
            <label for="apartment">Apartment, suite, etc. (optional)</label>
        </div>
        <div class="input-group">
            <i class="fas fa-city"></i>
            <input type="text" id="city" name="city" placeholder="City" required>
            <label for="city">City</label>
        </div>
        <div class="input-group">
            <i class="fas fa-map"></i>
            <input type="text" id="state" name="state" placeholder="State" required>
            <label for="state">State</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope-open"></i>
            <input type="text" id="zip_code" name="zip_code" placeholder="ZIP code" required>
            <label for="zip_code">ZIP code</label>
        </div>
        <div class="input-group">
            <i class="fas fa-phone"></i>
            <input type="text" id="phone" name="phone" placeholder="Phone">
            <label for="phone">Phone</label>
        </div>
        <input type="submit" class="btn" value="Sign Up" name="signUp">
    </form>

    <p class="or">
        ----- or -----
    </p>
    <div class="icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-google"></i>
    </div>
    <div class="links">
        <p>Already Have Account</p>
        <button id="signInButton">Sign In</button>
    </div>
</div>
<script src="script.js"></script> <!-- Link to your JavaScript file -->