<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        // require 'vendor/autoload.php';
        // $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        // $dotenv->load();

        // $mail->Username = $_ENV['EMAIL'];
        // $mail->Password = $_ENV['PASS'];

        $mail->Username = getenv('EMAIL'); // Email
        $mail->Password = getenv('PASS');  // Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email Content
        $mail->setFrom($email, 'Atharv Kadam');
        $mail->addAddress($email); // Sends email to the user
        $mail->Subject = "Thank You for Your Submission";
        $mail->Body = "Hello $name,\n\nThank you for your comment!\n\nDetails:\nWebsite: $website\nComment: $comment\n\nBest Regards,\nYour Team";

        $mail->send();
        echo json_encode(["status" => "success", "message" => "Email sent successfully!"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Error sending email: " . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>