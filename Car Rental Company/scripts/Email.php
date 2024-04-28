<?php
function sendConfirmationEmail($recipient, $subject, $message) {
    $headers = "From: wheelswander@gmail.com";

    if (mail($recipient, $subject, $message, $headers)) {
        echo '<script>alert("Email sent successfully!");</script>';
        return true;
    } else {
        return false; 
        echo '<script>alert("Email not sent Please try again!");</script>';
    }
}
?>
