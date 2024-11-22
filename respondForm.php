<?php
// Get data from form  
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

// Define recipient and subject
$to = "khralenok.g@gmail.com";
$subject = "This is the subject line";

// The following text will be sent
$txt = "Name = $name\r\nEmail = $email\r\nMessage = $message";

// Define headers
$headers = "From: grigorii@khralenok.com\r\n" .
           "Reply-To: $email\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Validate email and send mail
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mail($to, $subject, $txt, $headers);
}

// Redirect to another page
header("Location: index.html");
exit(); // Ensure no further processing
?>
