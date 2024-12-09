<?php
// Get data from form  
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';



$to = "khralenok.g@gmail.com";
$subject = "New form submission on khralenok.com";
$message = "Name = $name\r\nEmail = $email\r\nMessage = $message";
$headers = "From: grigorii@khralenok.com";

header("Content-Type: application/json");
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["status" => "success", "message" => "Email sent successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send email."]);
}
exit(); // Prevent further processing
?>

