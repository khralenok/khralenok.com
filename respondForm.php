<?php
// Get data from form  
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';



$to = "khralenok.g@gmail.com";
$subject = "New form submission on khralenok.com";
$message = "Name = $name\r\nEmail = $email\r\nMessage = $message";
$headers = "From: grigorii@khraleok.com";


if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}

// Redirect to another page
header("Location: /");
exit(); // Ensure no further processing
?>

