<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Console-like Website</title>
    <style>
    body {
        font-family: 'Courier New', Courier, monospace;
        background-color: #333;
        color: #fff;
        padding: 0;
        margin: 0;
    }

    .console {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .input-container {
        display: flex;
        align-items: center;
        margin-top: auto;
        border-top: 2px solid #fff;
        padding: 10px;
    }

    .input-container input {
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        background-color: transparent;
        border: none;
        outline: none;
        width: 100%;
    }

    .output {
        padding: 10px;
    }

    .output.error {
        color: red;
    }

    .login-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .login-form input[type="password"] {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        margin-bottom: 10px;
    }

    .login-form input[type="submit"] {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
    }
    </style>

      session_start();
      if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password == 'Covid-19') {
          $_SESSION['logged_in'] = true;
          header('Location: console.php');
        } else {

      if (isset($_SESSION['logged_in'])) {
        header('Location: ' . $_SESSION['logged_in']); // Redirect to the saved page
        exit; // 
      } else {  
      }
      ?>
      </head>

<body>

    <?php
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="password" name="password" placeholder="API KEY">
    <input type="submit" value="Login">
    </form>

    </div>
</body>

</html>