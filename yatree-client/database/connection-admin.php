<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database_name = "yatreebike";

    $conn = new mysqli($server, $username, $password, $database_name);

    if(!$conn){
        die("not connected");
    }
?>


