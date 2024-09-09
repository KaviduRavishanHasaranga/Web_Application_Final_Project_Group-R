<?php
include 'assets/header.php';

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

<link rel="stylesheet" href="css/login.css">
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
                    <option value="Albania" class="opt">Albania</option>
                    <option value="Andorra" class="opt">Andorra</option>
                    <option value="Austria" class="opt">Austria</option>
                    <option value="Belarus" class="opt">Belarus</option>
                    <option value="Belgium" class="opt">Belgium</option>
                    <option value="Bosnia and Herzegovina" class="opt">Bosnia and Herzegovina</option>
                    <option value="Bulgaria" class="opt">Bulgaria</option>
                    <option value="Croatia (Hrvatska)" class="opt">Croatia (Hrvatska)</option>
                    <option value="Cyprus" class="opt">Cyprus</option>
                    <option value="Czech Republic" class="opt">Czech Republic</option>
                    <option value="Denmark" class="opt">Denmark</option>
                    <option value="Estonia" class="opt">Estonia</option>
                    <option value="Faroe Islands" class="opt">Faroe Islands</option>
                    <option value="Finland" class="opt">Finland</option>
                    <option value="France" class="opt">France</option>
                    <option value="Germany" class="opt">Germany</option>
                    <option value="Gibraltar" class="opt">Gibraltar</option>
                    <option value="Greece" class="opt">Greece</option>
                    <option value="Greenland" class="opt">Greenland</option>
                    <option value="Holy See (Vatican City State)" class="opt">Holy See (Vatican City State)</option>
                    <option value="Hungary" class="opt">Hungary</option>
                    <option value="Iceland" class="opt">Iceland</option>
                    <option value="Ireland" class="opt">Ireland</option>
                    <option value="Italy" class="opt">Italy</option>
                    <option value="Latvia" class="opt">Latvia</option>
                    <option value="Liechtenstein" class="opt">Liechtenstein</option>
                    <option value="Lithuania" class="opt">Lithuania</option>
                    <option value="Luxembourg" class="opt">Luxembourg</option>
                    <option value="Macedonia" class="opt">Macedonia</option>
                    <option value="Malta" class="opt">Malta</option>
                    <option value="Moldova" class="opt">Moldova</option>
                    <option value="Monaco" class="opt">Monaco</option>
                    <option value="Montenegro" class="opt">Montenegro</option>
                    <option value="Netherlands" class="opt">Netherlands</option>
                    <option value="Norway" class="opt">Norway</option>
                    <option value="Poland" class="opt">Poland</option>
                    <option value="Portugal" class="opt">Portugal</option>
                    <option value="Romania" class="opt">Romania</option>
                    <option value="San Marino" class="opt">San Marino</option>
                    <option value="Serbia" class="opt">Serbia</option>
                    <option value="Slovakia" class="opt">Slovakia</option>
                    <option value="Slovenia" class="opt">Slovenia</option>
                    <option value="Spain" class="opt">Spain</option>
                    <option value="Svalbard and Jan Mayen Islands" class="opt">Svalbard and Jan Mayen Islands</option>
                    <option value="Sweden" class="opt">Sweden</option>
                    <option value="Switzerland" class="opt">Switzerland</option>
                    <option value="Turkey" class="opt">Turkey</option>
                    <option value="Ukraine" class="opt">Ukraine</option>
                    <option value="United Kingdom" class="opt">United Kingdom</option>
                    <option value="United States" class="opt">United States</option>
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

<script src="js\signin.js"></script>

<?php include 'assets/footer.php'; ?>