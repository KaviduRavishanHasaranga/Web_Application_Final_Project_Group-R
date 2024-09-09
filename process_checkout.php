<?php
session_start();
include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Gather customer details
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $apartment = $_POST['apartment'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $delivery_method = $_POST['delivery'];
    $total_amount = $totalPrice; // Assuming $totalPrice is calculated earlier in the code

    // Insert into Orders table
    $stmt = $conn->prepare("INSERT INTO Orders (first_name, last_name, company, address, apartment, city, state, zip_code, country, phone, email, delivery_method, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssssd', $first_name, $last_name, $company, $address, $apartment, $city, $state, $zip_code, $country, $phone, $email, $delivery_method, $total_amount);
    $stmt->execute();
    $order_id = $stmt->insert_id; // Get the ID of the newly created order

    // Gather payment details
    $payment_method = $_POST['payment_method'];
    $card_number = $_POST['card_number'];
    $card_expiry = $_POST['card_expiry'];
    $card_cvc = $_POST['card_cvc'];
    $name_on_card = $_POST['name_on_card'];

    // Insert into Payments table
    $stmt = $conn->prepare("INSERT INTO Payments (order_id, payment_method, card_number, card_expiry, card_cvc, name_on_card, billing_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $billing_address = $address; // Assuming the billing address is the same as the shipping address
    $stmt->bind_param('issssss', $order_id, $payment_method, $card_number, $card_expiry, $card_cvc, $name_on_card, $billing_address);
    $stmt->execute();

    // Clear the cart session after successful order
    unset($_SESSION['cart']);

    // Redirect to a thank you page
    header('Location: thank_you.php');
    exit();
}
?>