<?php
function makeInputSafe($value){
    return trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
}

function nameValidation($testName){
    return (preg_match('/^[a-zA-Z\s\-]+$/', $testName) && (strlen(preg_replace('/[^A-Z]/', '', $testName)) / strlen($testName)) <= 0.25);
}   

// Get data from form  
$humanTest = isset($_POST['humanTest']) ? makeInputSafe($_POST['humanTest']) : 'Field was changed';
$name = isset($_POST['name']) ? makeInputSafe($_POST['name']) : 'Field was empty';
$email = isset($_POST['email']) ? makeInputSafe($_POST['email']) : 'Field was empty';
$message = isset($_POST['message']) ? makeInputSafe($_POST['message']) : 'Field was empty';

if($humanTest === 'unchanged' && nameValidation($name)){
    if ($email !== 'Field was empty' && $name !== 'Field was empty' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "khralenok.g@gmail.com";
        $subject = "New form submission on khralenok.com";
        $emailBody = "Name = $name\r\nEmail = $email\r\nMessage = $message";
        $headers = "From: grigorii@khralenok.com";
    
        header("Content-Type: application/json");
        if (mail($to, $subject, $emailBody, $headers)) {
        echo json_encode(["status" => "success", "message" => "Submission sent successfully."]);
        } else {
        error_log("Submission sending failed.");
        echo json_encode(["status" => "error", "message" => "Submission sending failed. You could try again later."]);
        }
    } else {
        error_log("Key fields was empty or filled wrong. Submission was not sent.");
        echo json_encode(["status" => "error", "message" => "Submission not sent. Could you doublecheck information?"]);
    }
} else {
    error_log("Human test was failed. Email was not set");
    echo json_encode(["status" => "error", "message" => "Submission not sent. Human test was failed. "]);
}
exit(); // Prevent further processing
?>

