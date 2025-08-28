<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST["name"]);
    $email   = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'arifulalam7865@gmail.com';
        $mail->Password   = 'ckng dieq idzt guws';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('arifulalam7865@gmail.com', 'Mahim');

        $mail->isHTML(true);
        $mail->Subject = 'New Message from a visitor.';
        $mail->Body    = "<b>Name:</b> $name<br><b>Email:</b> $email<br><br><b>Message:</b><br>$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!');</script>";
    } catch (Exception $e) {
        $error = addslashes($mail->ErrorInfo); 
        echo "<script>alert('Failed to send message. Mailer Error: {$error}');</script>";
    }
}
