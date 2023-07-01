<?php
    include("../database/connection.php");
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "delete from `bikelist` where id=$id";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:bike-list-display.php");
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>