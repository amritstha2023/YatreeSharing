<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Login Page</title>
  <?php
    session_start();
    // include("../common/header.php")
  ?>
</head>
<link rel="stylesheet" href="../css/login.css">
  <body>
    <div>
      <form action="../database/login-database.php" method = "post">
        <div class="login-box">
          
        
        <h1>LOG IN</h1>

          <div class="textbox">
            <input type="text" name ="username" placeholder="Enter Usename" required>
          </div>

          <div class="textbox">
            <input type="password" name ="password" placeholder="Enter Password" required>
          </div>
          
        <?php
            include('../crud-message/crud-message.php');
          ?>
          <input type="submit" value="Login" class="btn" required>
        </div>
        </form>
    </div>
    
  </body>
</html>