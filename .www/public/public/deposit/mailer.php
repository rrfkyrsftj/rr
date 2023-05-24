<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer/src/PHPMailer.php");
require ("PHPMailer/src/SMTP.php");
require ("PHPMailer/src/Exception.php");

// Create a new GnuPG object
$gpg = new gnupg();
$gpg->sethomedir('/usr/bin/gpg');
$private_key = file_get_contents('/usr/bin/gpg');
$gpg->adddecryptkey($fingerprint, $passphrase);
$template = file_get_contents('Deposit.html');
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $template);
$message = str_replace('{{username}}', $_POST['username'], $template);
$message = str_replace('{{photo_href}}', $_POST['photo_href'], $message);
$message = str_replace('{{bank}}', $_POST['bank'], $message);
$message = str_replace('{{amount}}', $_POST['amount'], $message);
$message = str_replace('{{photo_link}}', $_POST['photo_link'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{EXPIRE}}', $_POST['EXPIRE'], $message);
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{sender_name}}', $_POST['sender_name'], $message);
$message = str_replace('{{receiver_name}}', $_POST['receiver_name'], $message);
$message = str_replace('{{receiver_email}}', $_POST['receiver_email'], $message);
$signed_message = $gpg->setsignmode(gnupg::SIG_MODE_DETACH)->sign($message);
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPSecure = 'tla';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port']; 
$mail->Body = $signed_message; // use signed message instead of the original message
$mail->SMTPAuth = true; 
$mail->Username = $_POST['username']; 
$mail->Password = $_POST['password']; 
$mail->SetFrom('<smtp@email.com>', $_POST['sender_name']); 
$mail->AddAddress($_POST['receiver_email']); 
$mail->Subject = 'INTERAC e-Transfer: '.$_POST['sender_name'].' sent you money.';
$mail->IsHTML(true); 
$mail->CharSet="utf-8";
if(!$mail->Send()) {  
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
$message ="INTERAC E-TRANSFER HAS BEEN SENT!";
$apiToken = "YOUR_TELEGRAM_BOT_TOKEN"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
?>