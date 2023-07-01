
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>display</title>
        <link rel="stylesheet" href="../css/bike-list-display.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    </head>
    <?php
        session_start();
        include("../common/header.php");
        // $mobilenumber = echo $_SESSION['mobile-number'];
        // echo $_SESSION['mobile-number'];
        ?>
<body>
    <div class="container">
        <p><?php if(isset($_GET['total-price'])) echo 'Your Price is'.  $_GET['total-price']?></p>
        <p style="color:green;font-size:20px;"><?php if(isset($_GET['message'])) echo $_GET['message']?></p>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>BIKE NAME</th>
                    <th>RENTAL PRICE</th>
                    <th>BIKE COMPANY</th>
                    <th>BIKE NUMBER</th>
                    <th>ORDER</th>
                    <th>Status</th>
                </tr>
            </thead>
            
            
            <?php
            $conn = new mysqli('localhost', 'root', '', 'yatreebike');
            $sql = "select * from `bikelist` ORDER BY `bikelist`.`Id` DESC";
            $result = mysqli_query($conn, $sql);
            if($result){
                $sn=1;
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <?php $id = $row['id'];?>
                        <th><?php echo $sn?></th>
                        <td><?php echo $row['Bike_name']?></td>
                        <td>Rs <?php echo $row['Rental_price']?> per day</td>
                        <td><?php echo $row['Bike_company']?></td>
                        <td><?php echo $row['Bike_no']?></td>
                        <td class="modifications">
                            <?php if($row['Status']==0)
                             echo '
                             <a style = "text-decoration:none;padding:5px;background:green;color:white;" href="bike-list-order.php?order-bike-id='.$id.'
                                &mobile-number='.$_SESSION['mobile-number'].'
                                &status=1">Order
                                </a>';
                                else {
                                    echo '
                                    <a style = "text-decoration:none;padding:5px;background:green;color:white;" href = "#?" onclick = "return alreadyBooked()">Order</a>';
                                }

                                ?>
                        </td>

                        <td>
                        <?php
                             if($row['Status']==0){
                                 echo 
                                 '<p style="
                                 color:rgb(198, 82, 19);
                                 font-size:13px;">
                                 available
                                 </p>';
                                } else {
                                    echo
                                    '<p style ="color:green;font-size:13px;">
                                    booked
                                    </p>';
                                }
                                ?>
                        </td>
                    </tr>
                    <?php $sn++;
                    $_SESSION['bike-price '] = $row['Rental_price'];
                }
            }
            ?>
        </table>
    </div>

    
    <?php
        $bikebooked = mysqli_query($conn,"SELECT * FROM `bikelist` WHERE `Status`=1;");
        $booked_count = mysqli_num_rows($bikebooked);
        ?>
    <?php
        $bikebooked = mysqli_query($conn,"SELECT * FROM `bikelist` WHERE `Status`=0;");
            $available_count = mysqli_num_rows($bikebooked);
    ?>

<span>Total BIkes Booked: <?php echo $booked_count?></span>
<br>
<span>Total BIkes Available: <?php echo $available_count?></span>

</body>
</html>
<script src="../js/confirm-delete.js"></script>

<script>
    function alreadyBooked(){
        return alert("This bike is already booked");
    }
</script>