<?php
include 'connection.php';

// Capture form data
if (isset($_POST['submit'])) {
    $title = $_POST['titles'];
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
    $viber = isset($_POST['viber']) ? 1 : 0;
    $telegram = isset($_POST['telegram']) ? 1 : 0;
    $subject = $_POST['subject'];
    $budget = $_POST['budget'];
    $message = $_POST['message'];


    $insertQuery = "INSERT INTO contactus (title, full_name, email, country, city, phone, whatsapp, viber, telegram, subject, budget, message) 
            VALUES ('$title', '$full_name', '$email', '$country', '$city', '$phone', '$whatsapp', '$viber', '$telegram', '$subject', '$budget', '$message')";

    if ($conn->query($insertQuery) == TRUE) {
        header("Location: sucess.php");
 
    }       exit();
    } else {
        echo "Error" . $conn->error;
    //cose the connetion
    $conn->close();
}
