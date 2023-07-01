<?php
  session_start();
  include("../database/connection.php");
  $id = $_GET['updateid'];

    $sql = "select * from `bikelist` where id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $bikename = $row['Bike_name'];
    $rentalprice = $row['Rental_price'];
    $bikecompany = $row['Bike_company'];
    $bikenumber = $row['Bike_no'];


  if(isset($_POST['submit'])){
    $bikename =$_POST['bike-name'];
    $rentalprice =$_POST['rental-price'];
    $bikecompany = $_POST['bike-company'];
    $bikenumber = $_POST['bike-number'];


      $sql = "UPDATE `bikelist`set `id` = $id, `Bike_name` = '$bikename', `Rental_price` = '$rentalprice', `Bike_company` = '$bikecompany', `Bike_no`= '$bikenumber' WHERE id ='$id'";
      $result = mysqli_query($conn,$sql);
  
      if(!$result){
        die("not inserted data");
      }
  
      else {
        header("location:bike-list-display.php");
      }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Price</title>
  <link rel="stylesheet" href="../css/bike-list-add.css">
</head>
<body>
<div>
      <form action="" method = "post">
        <div class="login-box">
        <?php
          include("../crud-message/crud-message.php");
        ?>
        <h1>UPDATE BIKE!</h1>

          <div class="textbox">
            <input type="text" name ="bike-name" placeholder="Bike Name" required autocomplete = "off" value = '<?php echo $bikename;?>'>
          </div>
          
          <div class="textbox">
            <input type="text" name ="bike-number" placeholder="Bike-Number required autocomplete = "off" value = '<?php echo $bikenumber;?>'>
          </div>

          
          <div class="textbox">
            <input type="text" name ="bike-company" placeholder="Rental Price" required autocomplete = "off" value = '<?php echo $bikecompany;?>'>
          </div>
          
          <div class="textbox">
            <input type="text" name ="rental-price" placeholder="Rental Price" required autocomplete = "off" value = '<?php echo $rentalprice;?>'>
          </div>
          
          <input type="submit" value="Update" class="btn" name= "submit" required>
        </div>
        </form>
    </div>
</body>
</html>