<?php
$to = "khralenok.g@gmail.com";
$subject = "Test Email";
$message = "This is a test email sent using the PHP mail() function.";
$headers = "From: grigorii@khraleok.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>