<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <li><a href="about.php">ABOUT US</a></li>
          </ul>

        <div class="buttons">
            <?php 
            session_start();
            ?>
            <p><a class="logout" href = "logout.php">LOG OUT</a></p>
        </div>
   </nav>
   <p>Millions of people around the globe ride bikes. But historically, this joy on two wheels would come to a screeching halt when you traveled because the equipment was too difficult to transport. </p>
        <p>Our enthusiastic staff will keep you informed, safe, and set you up with the right equipment to make your rental a fantastic experience. 

</p>
    
    <p></p>
    <p></p>
</body>
</html>