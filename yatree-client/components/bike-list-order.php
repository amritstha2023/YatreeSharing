<?php
  session_start();
  $id = $_GET['order-bike-id'];
  $mobilenumber = $_GET['mobile-number'];
  $status = $_GET['status'];
    include("../database/connection-admin.php");
    $sql = "SELECT * FROM `bikelist` WHERE `id` = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
 
    $bikename = $row['Bike_name'];
    $bikecompany = $row['Bike_company'];
    $bikenumber = $row['Bike_no'];    
    $bikeprice = $row['Rental_price'];    
    $fullname = $_SESSION['fullname'];
    
  if(isset($_POST['submit'])){
    $bikeduration = $_POST['duration'];

    if($bikeduration<=0){
      echo "can't be zero";
    }

    else if($bikeduration>9){
      echo "can't be double digits";
    }

    else {
      
      include("../database/connection.php");
      $sql = "INSERT INTO `ordered_bike`(`Phone_no`,`Full_name`, `Bike_name`, `Bike_company`, `Bike_no`, `Duration`) VALUES ('$mobilenumber','$fullname','$bikename','$bikecompany','$bikenumber','$bikeduration')";      
      $result = mysqli_query($conn,$sql);
  
      include("../database/connection-admin.php");
      $sql1 = mysqli_query($conn, "update `bikelist` set status = $status where id = $id");
      
      $totalprice = $bikeprice * $bikeduration;
      echo $totalprice;
  
      if(!$result){
        die("not inserted data");
      }
      else {
        header("location:bike-list-display.php?total-price=$totalprice&message=bike-booked-successfully...........");
      }
    }

  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Confirm Bike Order</title>
    <link rel="stylesheet" href="../css/bike-list-order.css">
</head>
  <body>
    <div>
    <a href="welcome.php">go to home</a>

      <form action="" method = "post">
        <div class="login-box">
        <?php
          include("../crud-message/crud-message.php");
        ?>
        <h1>Confirm Order</h1>

          <div class="textdisplay">
            <p>Mobile Number: <?php echo '<h4>'.$mobilenumber.'</h4>';?></p>
          </div>

          <div class="textdisplay">
            <p>Bike Name: <?php echo '<h4>'.$bikename.'</h4>';?></p>
          </div>
          
          <div class="textdisplay">
            <p>Bike Company: <?php echo '<h4>'.$bikecompany.'</h4>';?></p>            
          </div>
          
          <div class="textdisplay">
            <p>Bike Number: <?php echo '<h4>'.$bikenumber.'</h4>';?></p>
          </div>
          
          <div class="textdisplay">
            <p>Rental Price: <?php echo '<h4>'.$bikeprice.'per day</h4>'?></p>
          </div>

          
          <div class="textbox">
            <input type="number" name ="duration" placeholder="Bike duration in days" required autocomplete = "off">
          </div>   
          
          <input type="submit" value="Confirm" class="btn" name= "submit" required>
        </div>
        </form>
    </div>
    
  </body>
</html>