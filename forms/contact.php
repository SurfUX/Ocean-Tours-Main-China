<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/phpmailer/Exception.php';
require '../assets/vendor/phpmailer/PHPMailer.php';
require '../assets/vendor/phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contact@gochinaholidays.com';   // your email
    $mail->Password   = 'GOTChina2026#';          // your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email headers
    $mail->setFrom('contact@gochinaholidays.com', 'Ocean Tour China');
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    // Recipients
    
    $mail->addAddress('tecnetsoftwaresolution@gmail.com');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'] ?? 'New Contact Form Message';

    $mail->Body = "
        <h3>New Contact Form Submission</h3>
        <p><strong>Name:</strong> {$_POST['name']}</p>
        <p><strong>Email:</strong> {$_POST['email']}</p>
        <p><strong>Message:</strong><br>{$_POST['message']}</p>
    ";

    $mail->AltBody = "
        Name: {$_POST['name']}
        Email: {$_POST['email']}
        Message: {$_POST['message']}
    ";

    $mail->send();
    echo "OK";

} catch (Exception $e) {
    echo "Message could not be sent.";
}