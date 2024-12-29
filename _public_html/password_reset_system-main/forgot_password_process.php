<?php
if(isset($_POST['reset'])) {
    $email = $_POST['email'];
}
else {
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'nmietgrievance@gmail.com';                     // SMTP username
    $mail->Password   = 'byxwyjonjhaprsau';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Recipients
    $mail->setFrom('nmietgrievance@gmail.com', 'Admin');
    $mail->addAddress($email);     // Add a recipient

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);
    
    // Calculate the expiration time (2 minutes)
    $expiration_time = time() + 120;

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'To reset your password click <a href="https://grievancenmiet.in/password_reset_system-main/change_password.php?code='.$code.'">here </a>. </br>Reset your password within 2 minutes.';

    $conn = new mySqli('localhost', 'u624446011_grc1', 'Omkar@133', 'u624446011_grc');

    if($conn->connect_error) {
        die('Could not connect to the database.');
    }

    $verifyQuery = $conn->query("SELECT * FROM user_account WHERE email = '$email'");

    if($verifyQuery->num_rows) {
        // Update the code and expiration time in the database
        $codeQuery = $conn->prepare("UPDATE user_account SET code = ?, code_expiration = ? WHERE email = ?");
        $codeQuery->bind_param("sss", $code, $expiration_time, $email);
        $codeQuery->execute();
        $codeQuery->close();
        
        $mail->send();
        echo 'Message has been sent, check your email';
    }
    $conn->close();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
