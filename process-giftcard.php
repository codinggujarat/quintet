<?php
session_start();
include 'includes/config.php';

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipient_email = $_POST['recipient_email'];
    $amount = $_POST['amount'];

    // Generate Unique Gift Code
    $gift_code = strtoupper(substr(md5(time()), 0, 10));

    // Store in Database
    $query = "INSERT INTO gift_orders (gift_code, recipient_email, amount) VALUES ('$gift_code', '$recipient_email', '$amount')";
    if (mysqli_query($con, $query)) {

        // Send Confirmation Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'quintetonline@gmail.com';
            $mail->Password = 'tazirgkatioldejv';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('your-email@example.com', 'QUINTET');
            $mail->addAddress($recipient_email);
            $mail->isHTML(true);
            $mail->Subject = "🎁 Your Gift Card Code!";
            $mail->Body = "
                <h2>You've received a gift card!</h2>
                <p><strong>Gift Code:</strong> $gift_code</p>
                <p><strong>Amount:</strong> $$amount</p>
                <p>Use this gift code at checkout to redeem your balance.</p>
            ";

            $mail->send();
            echo "✅ Gift Card Purchased & Email Sent!";
        } catch (Exception $e) {
            echo "❌ Email Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "❌ Database Error: " . mysqli_error($con);
    }
}