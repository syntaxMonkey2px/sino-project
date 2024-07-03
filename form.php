<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Add email validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $headers = "From: " . $name . "<" . $email . ">\r\n";
        $to = "for.sinohome@gmail.com";
        $subject = "New Message from SinoHomeDeco Website";
        $body = "Name: $name\nEmail: $email\nMessage: $message";

        if (mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $success = false;
        }
    } else {
        $success = false;
    }

    include 'success.html';
}