<?php

session_start();

// Function to check if the password is valid
function isValidPassword($password)
{
    // Define the valid passwords
    $validPasswords = [
        'password1' => ['page1.php', 'page2.php'],
        'password2' => ['page3.php'],
        'password3' => ['page4.php', 'page5.php'],
        'password4' => ['page6.php'],
        'password5' => ['page7.php', 'page8.php', 'page9.php'],
    ];

    // Check if the password is valid
    if (isset($validPasswords[$password])) {
        // Set the session token
        $_SESSION['token'] = generateToken();
        // Set a cookie to remember the session token
        setcookie('token', $_SESSION['token'], time() + 3600, '/');
        return true;
    }

    return false;
}

// Function to generate a random token
function generateToken($length = 32)
{
    return bin2hex(random_bytes($length));
}

// Check if the user is already authenticated
if (isset($_SESSION['token']) && isset($_COOKIE['token']) && $_SESSION['token'] === $_COOKIE['token']) {
    header('Location: dashboard.php'); // Redirect to the dashboard page
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted password
    $password = $_POST['password'];

    // Validate the password
    if (isValidPassword($password)) {
        header('Location: dashboard.php'); // Redirect to the dashboard page
        exit;
    } else {
        $error = 'Invalid password!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIDENTIAL AND PRIVATE</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>
    <div class="tm-container">
        <footer class="tm-site-footer">
            <form action="admin/Main.php" method="POST" id="contact-form">
                <div class="tm-form-group">
                    <br><br><br><br><br><br><br><br>
                    <input type="password" name="password" class="tm-form-control" placeholder="" required="">
                </div>
                <div class="tm-form-group tm-mb-30">
                </div>
                <div>
                    <button type="submit" class="tm-btn-primary tm-align-right">
                        <img width="60%" src="better-grade.png">
                    </button>
                </div>
            </form>
        </footer>
    </div>

    <script src="./login_files/jquery-3.4.1.min.js"></script>
    <script>
        $(document).
    });
});
</script>

</body>
</html>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIDENTIAL AND PRIVATE</title>
    <link rel="stylesheet" href="./login_files/all.min.css">
    <link href="./login_files/css" rel="stylesheet">
    <style>


html { scroll-behavior: smooth; }

body {
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    font-size: 18px;
    overflow-x: hidden;
    background-color: #1E5050;
}

ul {
    padding: 0;
    margin: 0;
}

nav > ul > li { list-style: none; }

a { 
	color: #3CF;
    text-decoration: none;
    transition: all 0.3s ease; 
}

p { 
    line-height: 1.8; 
    margin-top: 0;
}

h2 { margin-top: 0; }

#tm-video {
    position: fixed;
    right: 0;
    bottom: 0;    
    z-index: -1000;
}

.tm-video-wrapper { position: relative; }

#tm-video-control-button {
    cursor: pointer;
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
    background-color: rgba(0,0,0,0.5);
    color: white;    
    padding: 10px;
}

.tm-container { padding: 30px; }

.tm-row {
    display: flex;
    justify-content: space-between;
}

.tm-left,
.tm-right {
    width: 50%;
}

.tm-left-inner { position: fixed; }

.tm-site-header {
    background-color: white;
    color: #099;
    width: 100%;
    height: 160px; 
    display: flex;
    align-items: center;
    justify-content: center;   
}

.tm-site-logo { margin-right: 30px; }

.tm-site-name {
    font-size: 2.2rem;
    font-style: italic;    
}

.tm-left-inner {
    max-width: 500px;
    width: 100%;
}

.tm-site-nav-ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.tm-page-nav-item { margin-top: 20px; }

.tm-page-link {
    min-width: 240px;
    height: 100px;
    background-color: white;
    color: #099;
    display: flex;
    text-decoration: none;
    align-items: center;      
    font-size: 1.2rem;
}

.tm-page-link:hover,
.tm-page-link.active {
    background-color: #099;
    color: white;
}

.tm-page-link-icon {
    margin-right: 25px;
    margin-left: 25px;
    font-size: 1.5rem;
}

.tm-black-bg {
    background-color: rgba(0,0,0,0.6);
    color: white;
}

.tm-drinks-nav > ul > li { display: inline-block; }

.tm-drinks-nav > ul > li > a {
    color: white;
    font-size: 1.2rem;
    padding-top: 15px;
    padding-bottom: 5px;
    border-bottom: 3px solid transparent;
}

.tm-drinks-nav { height: 80px; }
.tm-main { max-width: 660px; }

.tm-drinks-nav > ul {
    display: flex;
    align-items: center;
    justify-content: space-around;
    height: 100%;
}

.tm-drinks-nav > ul > li a.active,
.tm-drinks-nav > ul > li a:hover {
    color: #96FEFF;
    border-bottom: 4px solid #96FEFF;
}

.tm-list-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
}

.tm-list-item-2 { align-items: flex-start; }

.tm-list-item-img {
    margin-right: 20px;
    width: 160px;
    height: 160px;
    background-color: #099;
}

.tm-list-item-img-big {
    margin-right: 25px;
    width: 200px;
    height: 200px;
}

.tm-list-item-text {
    padding: 20px 25px;
    flex: 1;
}

.tm-list-item-text-2 { flex: 1; }

.tm-list-item-name {
    display: flex;
    justify-content: space-between;
    margin-top: 0;
}

.tm-list-item-price { color: #96FEFF; }
.tm-site-footer { margin-top: 15px; }

.tm-footer-text {
    padding: 10px 65px 10px 20px;
    display: inline-block;
}

.tm-footer-link {color: #f61c1c;}
.tm-tab-content { animation: fadeEffect 1s; }
.tm-page-content { animation: fadeEffect 1s; }

.tm-text-primary { color: #3CC; }
.tm-mb-20 { margin-bottom: 20px; }
.tm-mb-30 { margin-bottom: 30px; }
.tm-img-right { 
    margin-left: 30px; 
    margin-right: 0;
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
    from { opacity: 0.3; }
    to { opacity: 1; }
}

/* About */
.tm-about-box-1 { padding: 40px 30px 50px 0; }
.tm-about-box-2 { padding: 50px 40px 30px; }
.tm-about-header { margin-left: 220px; }

/* Special */
.tm-special-items {
    display: flex;
    flex-wrap: wrap;
    margin: -30px -10px 0;
}

.tm-special-item {
    max-width: 320px;
    margin: 30px 10px;
}

.tm-special-item-title { font-size: 1.4rem; }
.tm-special-item-description { padding: 25px 30px; }

/* Contact */
.tm-contact-text-container {
    padding: 45px 50px;
    margin-bottom: 20px;    
}

.tm-contact-form-container {
    max-width: 460px;
    padding: 40px 50px;
    box-sizing: border-box;
}

.tm-form-group { margin-bottom: 25px; }

.tm-form-control {
    display: block;
    box-sizing: border-box;
    width: 100%;
    padding: 15px;
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    color: #286e39;
    background-color: transparent;
    background-clip: padding-box;
    border: 0;
    border-bottom: 1px solid rgb(10 42 18);
}

.tm-form-control::-webkit-input-placeholder { color: white; } /* Edge */  
.tm-form-control:-ms-input-placeholder { color: white; } /* Internet Explorer 10-11 */  
.tm-form-control::placeholder { color: white; }

.tm-btn-primary {
    color: #286e394d;
    background-color: rgba(0,0,0,0.6);
    border: 0;
    padding: 12px 40px;
    font-size: 1.4rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tm-btn-primary:hover {
    color: white;
    background-color: #099;
}

.tm-align-right {
    display: block;
    margin-left: auto;
    margin-right: 0;
}

.tm-mb-30 { margin-bottom: 30px; }

@media (max-width: 1130px) and (min-width: 992px) {
    .tm-left-inner { max-width: 380px; }
    .tm-site-name { font-size: 2.6rem; }
    .tm-site-logo { margin-right: 20px; }
    .tm-page-link { width: 100%; }
    .tm-page-link-icon { margin-right: 15px; }
    .tm-left { width: 45%; }
    .tm-right { width: 55%; }
}

@media (max-width: 991px) {
    .tm-left-inner { position: static; }
    .tm-left, .tm-right { width: 100%; }
    .tm-left { margin-bottom: 50px; }
    .tm-row { display: block; }
}

@media (max-width: 574px) {
    .tm-site-nav-ul { display: block; }
}

@media (max-width: 550px) and (min-width: 501px) {
    .tm-list-item-img-big {
        width: 160px;
        height: 160px;
    }

    .tm-about-header { margin-left: 180px; }
}

@media (max-width: 500px) {
    .tm-about-header { margin-left: 0; }
    .tm-list-item-2 { flex-direction: column; }
    .tm-about-box-1 { padding-left: 30px; }

    .tm-list-item-img-big {
        margin-right: 0;
        margin-bottom: 25px;
    }

    .tm-img-right { margin-left: 0; }
}

@media (max-width: 479px) {
    .tm-site-name { font-size: 2.6rem; }
    .tm-site-logo { margin-right: 20px; }

    .tm-list-item {
        flex-direction: column;
        margin-top: 40px;     
    }

    .tm-list-item-img {
        margin-right: 0;
        margin-bottom: 15px;        
    }

    .tm-drinks-nav { height: auto; }

    .tm-drinks-nav > ul {
        flex-direction: column;
        padding: 15px;
    }

    .tm-drinks-nav > ul > li { margin-bottom: 10px; }
    .tm-drinks-nav > ul > li > a { display: block; }
}
    </style><link rel="stylesheet" href="./login_files/tooplate-wave-cafe.css">
    
</head>
<body>
<div class="tm-container">
    <div class="tm-row">
        <!-- Site Header -->
    </div>
    <footer class="tm-site-footer">
        <form action="admin/Main.php" method="POST" id="contact-form">
            <div class="tm-form-group">
                <br><br><br><br><br><br><br><br>
                <input type="password" name="password" class="tm-form-control" placeholder="" required="">
            </div>
            <div class="tm-form-group tm-mb-30">
            </div>
            <div>
                <button type="submit" class="tm-btn-primary tm-align-right">
                    <img width="60%" src="better-grade.png">
                </button>
            </div>
        </form>
    </footer>
</div>

<!-- Background video -->
<div class="tm-video-wrapper">
    <i id="" class="fas fa-pause"></i>
    <video autoplay="" muted="" loop="" id="tm-video" style="width: 1500.44px; height: 844px;">
        <source src="video/wave-cafe-video-bg.mp4" type="video/mp4">
    </video>
</div>

<script src="./login_files/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        // Check the entered password when the form is submitted
        $("#contact-form").submit(function (event) {
            event.preventDefault(); // Prevent the form from submitting

            var password = $("input[name='password']").val(); // Get the entered password

            // Check the password and redirect to the appropriate page
            if (password === "Covid-19") {
                window.location.href = "Main.php";
            } else {
                alert("Invalid password. Please try again.");
            }
        });
    });
</script>

</body></html>