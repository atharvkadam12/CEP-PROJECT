<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;

        $mail->Username = "atharvkadam001@gmail.com"; // Email
        $mail->Password = "PASS";  // Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email Content
        $mail->setFrom($email, 'Atharv Kadam');
        $mail->addAddress($email); // Sends email to the user
        $mail->Subject = "Thank You for Your Submission";
        $mail->Body = "Hello $name,\n\nYour Appointment is Booked.!";

        $mail->send();
        echo json_encode(["status" => "success", "message" => "Email sent for further communication!"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Error sending email: " . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
