<?php 
session_start();
              if(isset($_SESSION['username'])){
                $_SESSION['msg']="You must log in first";
                header('location: editing.php');
              }
              if(isset($_SESSION['loggout'])){
                session_destroy();
                unset($_SESSION['username']);
                header("location: index.php");
              }
              ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="css/edit.css">
        <title>Library Management System </title>
        <link rel="icon" href="img/logo.png" type="image/icon type">
        
</head>
<header>

</header>
<div class="bar"><?php require "dashboard.php"?></div> 
<body>


</body>
</html>