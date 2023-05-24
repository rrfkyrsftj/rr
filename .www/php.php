<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $templateFile = $_POST['template'];
    $subject = $_POST['subject'];
    $expiredate = $_POST['expiredate'];
    $username = $_POST['username'];
    $photo_href = $_POST['photo_href'];
    $bank = $_POST['bank'];
    $amount = $_POST['amount'];
    $photo_link = $_POST['photo_link'];
    $link = $_POST['link'];
    $EXPIRE = $_POST['EXPIRE'];
    $sender_name = $_POST['sender_name'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_email = $_POST['receiver_email'];

    // Load the email template file
    $template = file_get_contents($templateFile);

    // Replace the placeholders in the template with form data
    $message = str_replace('{{expiredate}}', $expiredate, $template);
    $message = str_replace('{{username}}', $username, $message);
    $message = str_replace('{{photo_href}}', $photo_href, $message);
    $message = str_replace('{{bank}}', $bank, $message);
    $message = str_replace('{{amount}}', $amount, $message);
    $message = str_replace('{{photo_link}}', $photo_link, $message);
    $message = str_replace('{{link}}', $link, $message);
    $message = str_replace('{{EXPIRE}}', $EXPIRE, $message);
    $message = str_replace('{{sender_name}}', $sender_name, $message);
    $message = str_replace('{{receiver_name}}', $receiver_name, $message);
    $message = str_replace('{{receiver_email}}', $receiver_email, $message);

    // Load the PHPMailer library
    require 'class.phpmailer.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'tls';
    $mail->Host = $_POST['host'];
    $mail->Port = $_POST['port'];
    $mail->Body = $message;
    $mail->SMTPAuth = true;
    $mail->Username = $_POST['sender_email'];
    $mail->Password = $_POST['password'];
    $mail->setFrom($_POST['sender_email'], $_POST['sender_name']);
    $mail->addAddress($receiver_email);

    $mail->isHTML(true);
    $mail->CharSet = 'utf-8';

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Email sent successfully!";
    }
}
?>
