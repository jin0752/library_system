<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/dboard.css">
    <title>Dashboard</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
</head>
<header>
    
</header>
    <div class="bar"><?php require "dashboard.php"?></div>
    <body>
        <main>
            <h1 class="title">Dashboard</h1>
            <div class="info-card">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Number of Students</h2>
                            <p>30</p>
                        </div>
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                    <span class="progress" data-value="30%"></span>
                    <span class="label">30%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Number of Books</h2>
                            <p>30</p>
                        </div>
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                    <span class="progress" data-value="70%"></span>
                    <span class="label">70%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Working Computers</h2>
                            <p>20</p>
                        </div>
                        <ion-icon name="desktop-outline"></ion-icon>
                    </div>
                    <span class="progress" data-value="100%"></span>
                    <span class="label">100%</span>
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