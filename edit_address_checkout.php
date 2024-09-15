<?php
include 'connection.php';
session_start();

// Ensure the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Check if the form was submitted
    if (isset($_POST['update_address'])) {
        // Get form input values
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $company = isset($_POST['company']) ? $_POST['company'] : null;
        $apartment = isset($_POST['apartment']) ? $_POST['apartment'] : null;
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        
        // Retain the previous country value if not edited
        $country = isset($_POST['country']) ? $_POST['country'] : $user['country'];

        $phone = $_POST['phone'];

        // Prepare SQL to update user details in the database
        $sql = "UPDATE users SET fname = ?, lname = ?, company = ?, apartment = ?, address = ?, city = ?, state = ?, zip_code = ?, country = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssi", $fname, $lname, $company, $apartment, $address, $city, $state, $zip_code, $country, $phone, $userId);

        if ($stmt->execute()) {
            // Redirect back to the checkout page after the update
            header("Location: checkout.php");
            exit();
        } else {
            // Handle error if the update fails
            echo "<p>Failed to update your address. Please try again.</p>";
        }

        $stmt->close();
    }
} else {
    echo "<p>You need to log in to edit your address.</p>";
    exit();
}
?>
