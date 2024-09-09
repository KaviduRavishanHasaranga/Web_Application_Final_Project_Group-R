<?php
session_start();
include 'connection.php'; // Ensure this file contains the database connection

// Define error message variables
$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signIn'])) {
        // Sign In logic
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } else {
            $stmt = $conn->prepare("SELECT id, fname, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['fname'] = $user['fname'];
                    $success = "Login successful! Redirecting...";
                    header("refresh:2;url=index.php");
                    exit();
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "No user found with that email.";
            }
        }
    } elseif (isset($_POST['signUp'])) {
        // Registration logic
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $country = $_POST['country'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $apartment = $_POST['apartment'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        $phone = $_POST['phone'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, country, company, address, apartment, city, state, zip_code, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssss", $fname, $lname, $email, $password, $country, $company, $address, $apartment, $city, $state, $zip_code, $phone);

            if ($stmt->execute()) {
                $success = "Registration successful! Redirecting to login...";
                header("refresh:2;url=sign_in.php");
                exit();
            } else {
                $error = "Error occurred during registration.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In / Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<?php include 'assets/header.php'; ?>

<!-- Sign Up Form -->
<div class="container" id="signUp" style="display: none;">
    <h1 class="form-title">Register</h1>
    <form method="post" action="">
        <?php if ($success) echo "<p class='success'>$success</p>"; ?>
        <?php if ($error) echo "<p class='error'>$error</p>"; ?>
        
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
            <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
            <label for="lname">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <!-- Additional fields for registration -->
        <div class="form-section full">
            <label for="country" class="cou">Country/Region:</label>
            <div class="input-group">
                <i class="fas fa-globe"></i>
                <select id="country" name="country" required>
                    <!-- Options for countries -->
                    <option value="United States">United States</option>
                    <!-- Add more options as needed -->
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

    <p class="or">----- or -----</p>
    <div class="icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-google"></i>
    </div>
    <div class="links">
        <p>Already Have an Account?</p>
        <button id="signInButton">Sign In</button>
    </div>
</div>

<!-- Sign In Form -->
<div class="container" id="signIn" style="display: block;">
    <h1 class="form-title">Sign In</h1>
    <form method="post" action="">
        <?php if ($success) echo "<p class='success'>$success</p>"; ?>
        <?php if ($error) echo "<p class='error'>$error</p>"; ?>
        
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <p class="recover">
            <a href="#">Forgot Password?</a>
        </p>
        <input type="submit" class="btn" value="Sign In" name="signIn">
    </form>

    <p class="or">----- or -----</p>
    <div class="icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-google"></i>
    </div>
    <div class="links">
        <p>Don't Have an Account yet?</p>
        <button id="signUpButton">Sign Up</button>
    </div>
</div>

<script src="js/login.js"></script>
</body>
</html>