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
<body>
    <?php
        include("../common/header.php");
    ?>
    <div class="container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>BIKE NAME</th>
                    <th>Rental Price</th>
                    <th>BIKE COMPANY</th>
                    <th>BIKE NUMBER</th>
                    <th>MODIFICATION</th>
                    <th>Status</th>
                </tr>
            </thead>

            <?php
                include("../database/connection.php");
            ?>

            <?php
            
            $sql = "select * from `bikelist` ORDER BY `bikelist`.`Id` DESC";
            $result = mysqli_query($conn, $sql);
            if($result){
                $i = 1;
                $sn=1;
                while($row=mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <?php $id = $row['id'] ?>
                        <th><?php echo $sn?></th>
                        <td><?php echo $row['Bike_name']?></td>
                        <td>Rs <?php echo $row['Rental_price']?>per day</td>
                        <td><?php echo $row['Bike_company']?></td>
                        <td><?php echo $row['Bike_no']?></td>
                        
                        <td class="modifications">
                                <a style = "text-decoration:none;padding:5px;background:orange;color:white;"            href="bike-list-edit.php?updateid=<?php echo $id ?>">Edit</a>

                                <?php  if ($row['Status']==0)
                                {
                                  echo '<a style = "text-decoration:none;padding:5px;background:red;color:white;" href="bike-list-delete.php?deleteid='.$id.'" onclick="return checkDelete()">Delete</a></button>'  ;    

                                }

                                else {
                                    echo '<a style = "text-decoration:none;padding:5px;background:red;color:white;"  href="#" onclick="return alreadyBooked()">Delete</a>';
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
                    <?php
                    $sn++;

            
                }
            }

            ?>
            
        </table>
        <button class="add-item"><a href = "bike-list-add.php">ADD</a></button>
    </div>
</body>
</html>
<script src="../js/confirm-delete.js"></script>

<script>
    function alreadyBooked(){
        return alert("This bike is already booked u can't delete?");
    }
</script>