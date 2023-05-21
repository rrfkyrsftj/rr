<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Redirect the user to the login page or perform any other desired action
  header('Location: login.php');
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