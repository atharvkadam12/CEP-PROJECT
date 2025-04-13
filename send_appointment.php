<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "gym"; 

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    

    $sql = "INSERT INTO enquiry (name, email,contact) VALUES ('$name', '$email','$phone')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
    // $mail = new PHPMailer(true);
    // try {
    //     // SMTP Configuration
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com'; // SMTP server
    //     $mail->SMTPAuth = true;

    //     $mail->Username = "atharvkadam001@gmail.com"; // Email
    //     $mail->Password = "tnvc jmmj dygm hiyr";  // Password
    //     $mail->SMTPSecure = 'tls';
    //     $mail->Port = 587;

    //     // Email Content
    //     $mail->setFrom("atharvkadam001@gmail.com", 'Atharv Kadam');
    //     $mail->addAddress($email); // Sends email to the user
    //     $mail->Subject = "Thank You for Your Submission";
    //     $mail->Body = "Hello $name,\n\nYour Appointment is Booked.!";

    //     $mail->send();
    //     echo json_encode(["status" => "success", "message" => "Email sent for further communication!"]);
    // } catch (Exception $e) {
    //     echo json_encode(["status" => "error", "message" => "Error sending email: " . $mail->ErrorInfo]);
    // }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
