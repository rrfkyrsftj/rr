<?php
session_start();

// Define the valid admin username and password
$adminUsername = 'swiftrynx@gmail.com';
$adminPassword = 'Covid-19';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the submitted username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the username and password
  if ($username === $adminUsername && $password === $adminPassword) {
    // Set session variables to mark the user as authenticated and an admin
    $_SESSION['authenticated'] = true;
    $_SESSION['isAdmin'] = true;

    // Redirect to the admin dashboard
<<<<<<< HEAD
    header('Location: /sarah.php');
=======
    header('Location: /admin/Main.php');
>>>>>>> 5cf96fe71510912bc4974ef3763b94e3d4c3229f
    exit;
  } else {
    // Invalid credentials, show error message
    $errorMessage = 'Invalid username or password.';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #101010;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.4);
      width: 90%;
      max-width: 400px;
    }

    h1 {
      text-align: center;
      color: #fff;
      font-size: 24px;
      margin-bottom: 30px;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #fff;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.2);
      color: #fff;
      font-size: 16px;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #6c63ff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      margin-top: 20px;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
      font-weight: bold;
    }

    p.error-message {
      color: #f00;
      text-align: center;
      margin-top: 10px;
    }

    .logo {
      display: block;
      margin: 0 auto;
      width: 120px;
      height: 120px;
      background-image: url("https://yt3.ggpht.com/a/AATXAJyM1wWer5OZP_CaZagTF28XNDLJFiNBlGvsmw=s900-c-k-c0xffffffff-no-rj-mo");
      background-size: cover;
      background-position: center;
      border-radius: 50%;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>

    <?php if (isset($errorMessage)) { ?>
      <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php } ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login">
    </form>

    <div class="logo"></div>
  </div>

  <script>

      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
</head>
<body>

  </div>

  <script>
    function setCookie(name, value, days) {
      var expires = "";
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }

    function eraseCookie(name) {
      document.cookie = name + "=; Max-Age=-99999999; path=/";
    }

    var loginForm = document.querySelector("form");
    loginForm.addEventListener("submit", function(e) {
      e.preventDefault();
      var passwordInput = document.getElementById("password").value;

      // Admin password check
      if (passwordInput === "admin") {
        setCookie("accessLevel", "admin", 1);
        window.location.href = "admin.html";
      }
      // User password check
      else if (passwordInput === "user") {
        setCookie("accessLevel", "user", 1);
        window.location.href = "user.html";
      } else {
        alert("Invalid password. Please try again.");
      }
    });
  </script>
</body>
</html>