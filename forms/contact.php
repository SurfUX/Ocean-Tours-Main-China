<?php

$to = "gihan@surfux.com";

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? 'New Contact Form Message';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill all required fields.";
    exit;
}

$headers  = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

$body  = "New Contact Form Submission\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n\n";
$body .= "Message:\n$message\n";

if (mail($to, $subject, $body, $headers)) {
    echo "OK";
} else {
    echo "Failed to send message. Please try again later.";
}