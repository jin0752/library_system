<?php 
session_start();
              if(isset($_SESSION['username'])){
                $_SESSION['msg']="You must log in first";
                header('location: index.php');
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
        <link rel="stylesheet" href="css/studentlog.css">
        <title>Library Management System </title>
        <link rel="icon" href="img/logo.png" type="image/icon type">
        
</head>
<header>

</header>
<div class="bar"><?php require "dashboard.php"?></div> 
<body>
<table bgcolor="black">
    <tr bgcolor="#379c44">
        <th width = "200">Student ID</th>
        <th width = "200">Last Name</th>
        <th width = "200">First Name</th>
        <th width = "100">M.I</th>
        <th width = "150">Course</th>
        <th width="75">In</th>
        <th width = "75">Out</th>
    </tr>
    <tr bgcolor = "gray">
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>

    </tr>
</table>

</body>
</html>