<?php
function makeInputSafe($value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
// Get data from form  
$humanTest = isset($_POST['humanTest']) ? makeInputSafe($_POST['humanTest']) : 'Field was changed';

if($humanTest === 'unchanged'){
    $name = isset($_POST['name']) ? makeInputSafe($_POST['name']) : 'Field was empty';
    $email = isset($_POST['email']) ? makeInputSafe($_POST['email']) : 'Field was empty';
    $message = isset($_POST['message']) ? makeInputSafe($_POST['message']) : 'Field was empty';

    if ($email !== 'Field was empty' && $name !== 'Field was empty' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "khralenok.g@gmail.com";
        $subject = "New form submission on khralenok.com";
        $message = "Name = $name\r\nEmail = $email\r\nMessage = $message";
        $headers = "From: grigorii@khralenok.com";
    
        header("Content-Type: application/json");
        if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "Submission sent successfully."]);
        } else {
        error_log("Submission sending failed.");
        echo json_encode(["status" => "error", "message" => "Submission sending failed."]);
        }
    } else {
        error_log("Key fields was empty or filled wrong. Submission was not sent.");
        echo json_encode(["status" => "error", "message" => "Key fields was empty or filled wrong. Submission not sent."]);
    }
} else {
    error_log("Human test was failed. Email was not set");
    echo json_encode(["status" => "error", "message" => "Human test was failed. Submission not sent."]);
}
exit(); // Prevent further processing
?>

