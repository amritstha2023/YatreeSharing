<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME PAGE</title>
</head>
<body>
<link rel="stylesheet" href="../css/welcome.css">

  <?php
    session_start();
    if($_SESSION['isLoggedIn']){
      include("../common/header.php");
      include("./body.php");
    }
    else {
      header('location:login.php');
    }
  ?>
  <?php

  ?>
</body>