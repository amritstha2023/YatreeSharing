<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Login Page</title>
</head>
<link rel="stylesheet" href="../css/login.css">
  <body>
    <div>
      <form action="../database/login-database.php" method = "post">
        <div class="login-box">
        <?php
            session_start();
            include('../crud-message/crud-message.php');
          ?>
          
        
        <h1>LOG IN</h1>

          <div class="textbox">
            <input type="number" name ="mobile-number" placeholder="Phone Number" required>
          </div>

          <div class="textbox">
            <input type="password" name ="password" placeholder="Password" required>
          </div>
            <a href = "signup.php">Don't have a account?</a>
          <input type="submit" value="Login" class="btn" required>
        </div>
        </form>
    </div>
    
  </body>
</html>