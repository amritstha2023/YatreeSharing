<?php
  session_start();
  include("../database/connection.php");
  if(isset($_POST['submit'])){
    $bikename =$_POST['bike-name'];
    $rentalprice =$_POST['rental-price'];
    $bikecompany =$_POST['bike-company'];
    $bikenumber = $_POST['bike-number'];

    if(!ctype_alnum($bikenumber)){
      echo "please enter alphanumeric value for bikenumber";
    }

    else if(!is_numeric($rentalprice)){
      echo "please enter only numeric value for price";
    }

    else
    { 
      $sql = "INSERT INTO `bikelist`(`Bike_name`, `Bike_company`, `Bike_no`, `Rental_price`) VALUES ('$bikename','$bikecompany','$bikenumber','$rentalprice')";
      $result = mysqli_query($conn,$sql);
      
      if(!$result){
        die("not inserted data");
      }
      
      else {
        header("location:bike-list-display.php");
      }
    }

  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>ADD BIKE LIST</title>
    <link rel="stylesheet" href="../css/bike-list-add.css">
</head>
  <body>
    <div>
      <form action="" method = "post">
        <div class="login-box">
        <?php
          include("../crud-message/crud-message.php");
        ?>
        <h1>ADD BIKE</h1>

          <div class="textbox">
            <input type="text" name ="bike-name" placeholder="Bike Name" required autocomplete = "off">
          </div>
          
          <div class="textbox">
            <input type="text" name ="bike-company" placeholder="Bike Company" required autocomplete = "off">
          </div>
          
          <div class="textbox">
            <input type="text" name ="bike-number" placeholder="Bike Number" required autocomplete = "off">
          </div>
          
          <div class="textbox">
            <input type="text" name ="rental-price" placeholder="Rental Price" required autocomplete = "off">
          </div>
          
          <input type="submit" value="ADD" class="btn" name= "submit" required>
        </div>
        </form>
    </div>
    
  </body>
</html>