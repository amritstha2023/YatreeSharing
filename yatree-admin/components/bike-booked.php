<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" href="../css/bike-booked.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
    <?php
        include("../common/header.php");
    ?>
<body>
    <div class="container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>FULL NAME</th>
                    <th>PHONE NUMBER</th>
                    <th>BIKE NAME</th>
                    <!-- <th>BIKE COMPANY</th> -->
                    <th>BIKE NUMBER</th>
                    <th>DURATION</th>
                    <!-- <th>Final</th> -->
                </tr>
            </thead>


            <?php
            $conn = new mysqli('localhost', 'root', '', 'yatreebike-client');
            $sql = "select * from `ordered_bike`";
            $result = mysqli_query($conn, $sql);
            if($result){
                $sn = 1;
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $fullname = $row['Full_name'];
                    $phonenumber =$row['Phone_no'];
                    $bikename = $row['Bike_name'];
                    // $bikecompany = $row['Bike_company'];
                    $bikenumber = $row['Bike_no'];
                    $bikeduration = $row['Duration'];
                    


                    echo 
                    '<tr>
                        <td>'.$sn++.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$phonenumber.'</td>
                        <td>'.$bikename.'</td>
                        <td>'.$bikenumber.'</td>
                        <td>'.$bikeduration.' day</td>
                    </tr>';
            
                }
            }

            ?>
            
        </table>
    </div>
</body>
</html>
<script src="../js/confirm-delete.js"></script>