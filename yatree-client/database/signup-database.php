<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myfullname = $_POST['full-name'];
    $myusername = $_POST['user-name'];
    $mymobileno = $_POST['mobile-number'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm-password']);

    $len = strlen($mymobileno);

    if($len>10){
        $_SESSION['mobile_length_error'] = "Mobile number cannot-greater than 10 digits";
        header('location:../components/signup.php');
    }

    else if($len<10) {
        $_SESSION['mobile_length_error'] = "Mobile number should be  10 digits";
        header('location:../components/signup.php');
    } 
    
    else {
        $_SESSION['username'] =  $myusername;
        $_SESSION['isLoggedIn'] = true;

        $mobile_numberCheck = mysqli_query($conn,"select * from `signup-database` where `Mobile_no` = '$mymobileno' ");

        if(mysqli_num_rows($mobile_numberCheck)>0){
            header('location:../components/signup.php');
            $_SESSION['password-not-match'] = "This mobile number already registered please use another";
        }

        else {
            if($confirm_password==$password){
                $sql = "INSERT INTO `signup-database`(`Full_name`, `Username`, `Mobile_no`, `Password`) VALUES ('$myfullname','$myusername','$mymobileno','$password')";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    echo "data not inserted";
                }
                else{
                    header('location:../components/login.php');
                }   
            }
            else {
                header('location:../components/signup.php');
                $_SESSION['password-not-match'] = "Your password doesn't match with above password";
            }
        }
    }
}
?>