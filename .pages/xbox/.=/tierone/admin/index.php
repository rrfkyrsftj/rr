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
    function login($username,$password) {
        if($username == '123' && $password == '12345'){  //Login Infos
            return 'valid';
        }else{
            return 'invalid';
        }
    }
    if(isset($_POST['login-password'])) {
        $login = login($_POST['login-username'], $_POST['login-password']);
        if($login == "valid") {
            $_SESSION['login-username'] = $_POST['login-username'];
            $_SESSION['login-password'] = $_POST['login-password'];
            echo "<script type='text/javascript'>window.top.location='Dashboard.php';</script>";
            exit();
        }else{
            echo "<script type='text/javascript'>window.top.location='?p=fail&msg=Username or Password is incorrect.';</script>";
            exit();
        }
    }
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
?>

<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>EchoPAGE - Admin Panel</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">
    <link rel="stylesheet" id="css-main" href="css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>

    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="row g-0 justify-content-center bg-body-dark">
          <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign In Block -->
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url(img/photo20@2x.jpeg);">
              <div class="row g-0">
                <div class="col-md-6 order-md-1 bg-body-extra-light">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <!-- Header -->
                    <div class="mb-2 text-center">
                      <a class="link-fx fw-bold fs-1" href="#">
                        <span class="text-dark">Echo</span><span class="text-primary">PAGE</span>
                      </a>
                      <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-signin" action="#" method="POST">
                      <div class="mb-4">
                        <input type="text" class="form-control form-control-alt" id="login-username" name="login-username" placeholder="Username">
                      </div>
                      <div class="mb-4">
                        <input type="password" class="form-control form-control-alt" id="login-password" name="login-password" placeholder="Password">
                      </div>
                     <?php
                        if(isset($_GET['p'])) {
                            if($_GET['p'] == "fail") {
                                echo "<!-- error message --><div class='alert alert-danger' role='alert'>" . $_GET['msg'] . "</div><!-- !error message -->";
                            }
                        }
                      ?>
                      <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-hero btn-primary">
                          <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign In
                        </button>
                      </div>
                    </form>
                    <!-- END Sign In Form -->
                  </div>
                </div>
                <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <div class="d-flex">
                      <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                        <img class="img-avatar img-avatar-thumb" src="img/avatar16.jpeg" alt="">
                      </a>
                      <div class="flex-grow-1">
                      <p class="text-white fw-semibold mb-1">
                          Welcome to the Admin Panel !
                        </p>
                        <a class="text-white-75 fw-semibold" href="javascript:void(0)">View visitors and bots anytime, anywhere</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Sign In Block -->
          </div>
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

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="js/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="js/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="js/op_auth_signin.min.js"></script>
  

</body></html>