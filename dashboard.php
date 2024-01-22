<?php
include_once("database.php");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
</head>
<header>
    
</header>
    <div class="bar"><?php require "sidebar.php"?></div>
    <body>
        <main>
            <h1 class="title">Dashboard</h1>
            <div class="info-card">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Number of Students</h2>
                            <p><?php
                                $sql = "SELECT * from student_logs ";
                                $num_row = mysqli_query($connection, $sql);

                                if($num_row_total = mysqli_num_rows($num_row)){
                                    echo "<h1>".$num_row_total."</h1>";
                                }else{
                                    echo "<h2> No DATA </h2>";
                                }
                                ?>
                            </p>
                        </div>
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Number of Books</h2>
                            <p><?php
                                $sql = "SELECT * from books ";
                                $num_row = mysqli_query($connection, $sql);

                                if($num_row_total = mysqli_num_rows($num_row)){
                                    echo "<h1>".$num_row_total."</h1>";
                                }else{
                                    echo "<h2> No DATA </h2>";
                                }
                                ?></p>
                        </div>
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Working Computers</h2>
                            <p>20</p>
                        </div>
                        <ion-icon name="desktop-outline"></ion-icon>
                    </div>
                    
                </div>
            </div>
            <div class="data">
                <div class="content-data">
                    <div class="head">
                    <h3>Yearly Report</h3>
                    <div class="menu">
                    <div class="icon"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></div>
                        <ul class="menu-link">
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart">
                    <div id="chart"></div>
                </div>
            </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="js/dboard.js"></script>
    </body>
</html>