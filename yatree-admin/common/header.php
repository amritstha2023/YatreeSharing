<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Page</title>
    <link rel="stylesheet" href="../css/welcome.css">
</head>
<body>
<nav class="header">
       <div class="logo">
           <h4>YATREE SHARING</h4>
       </div>
      
          <ul class="nav-links">
            <li><a href="../components/welcome.php">HOME</a></li>
            <li><a href="bike-list-display.php">BIKE LIST</a></li>
            <li><a href="bike-booked.php">BOOKED BIKE</a></li>
          </ul>

        <div class="buttons">
            <?php 
            // session_start();
            ?>
            <p><a style = "background-color:green;" class="logout" href = "logout.php">LOG OUT</a></p>
        </div>
   </nav>
</body>
</html>