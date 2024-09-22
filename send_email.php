<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $company = htmlspecialchars(trim($_POST['company']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($name) || empty($surname) || empty($email) || empty($message)) {
        echo "Please fill in all mandatory fields.";
        exit;
    }

    // Prepare the email
    $to = "emma.grisot@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nSurname: $surname\nEmail: $email\nCompany: $company\nMessage:\n$message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email successfully sent.";
    } else {
        echo "Email sending failed.";
    }
}
?>
