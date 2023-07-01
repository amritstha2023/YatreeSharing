<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['username'];
    $mymobileno = $_POST['mobile-number'];
    $mypassword = md5($_POST['password']);
    
    $_SESSION['mobile-number'] = $mymobileno;
    $_SESSION['isLoggedIn'] = true;
    
    $mobileno_search = "select * from `signup-database` where `Mobile_no` = '$mymobileno'";
    $result = mysqli_query($conn,$mobileno_search);
    $mobileno_count = mysqli_num_rows($result);
    var_dump($mobileno);
    
    if($mobileno_count){
        $row = mysqli_fetch_assoc($result);
        $username = $row['Username'];
        $fullname = $row['Full_name'];
        $_SESSION['fullname'] =$fullname;
        $_SESSION['username'] =  $username;
        $mobileno = $row['Mobile_no'];
        $password = $row['Password'];

            if($password!=$mypassword){
                header('location:../components/login.php');
                $_SESSION['incorrect-userpass']= "Incorrect password";
            } 
            else {
                header('location:../components/welcome.php');
            }
            
    } else {
        header('location:../components/login.php');
        $_SESSION['incorrect-userpass']= "This number doesn't register";
    }
}
 
?>