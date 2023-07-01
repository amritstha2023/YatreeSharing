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
<link rel="stylesheet" href="../css/signup.css">
  <body>
    <div>
      <form action="../database/signup-database.php" method = "post">
        <div class="login-box">
          
        
        <h1>SIGN UP</h1>
        
        <div class="textbox">
            <input type="text" name ="full-name" placeholder="Enter Full Name" required>
        </div>
        
        <div class="textbox">
            <input type="text" name ="user-name" placeholder="Enter Username" required>
        </div>

          <div class="textbox">
            <input type="number" name ="mobile-number" placeholder="Enter Mobile Number" required>
          </div>

          <div class="textbox">
            <input type="password" name ="password" placeholder="Enter Password" required>
          </div>

          <div class="textbox">
            <input type="password" name ="confirm-password" placeholder="Confirm Password" required>
          </div>
          
          <a href="login.php">Already have an account?</a>

          <input type="submit" value="SIGN UP" class="btn" required>

        <?php
            include('../crud-message/crud-message.php');
          ?>
        </div>
        </form>
    </div>
    
  </body>
</html>