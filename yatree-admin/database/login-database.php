<?php
    session_start();
include("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['username'];
    $mypassword = ($_POST['password']);


    $_SESSION['isLoggedIn'] = true;

    $sql = "SELECT `Username`, `Password` FROM `login-database` WHERE `Username`='$myusername' and `Password` = MD5('$mypassword')";


    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);
    // echo $row;

    $count = mysqli_num_rows($result);
    // echo $count;

}
    if($count == 1) {
        header("location:../components/welcome.php");
    }else {
        $_SESSION['incorrect-userpass'] ="Your Username or Password is Incorrect";
        header('location:../components/login.php');
    }
    

?>