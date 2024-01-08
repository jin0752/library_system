
<!DOCTYPE HTML>
<html lang="en">
<head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="icon" href="img/logo.png" type="image/icon type">
        
    </head>
    <body>
        <nav class="sidebar close">
            <div class="header"> 
                <div class="image-text">
                    <span class="image">
                        <img class="logo" src="img/logo.png" alt="logo">
                    </span>

                    <div class="text header-text">
                        <span class="name">Cvsu Imus</span>
                        <span class="sec">Library System</span>
                    </div>
                </div>
                <span class="arrow"><ion-icon name="chevron-forward-outline"></ion-icon></span>
                
            </div>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menlinks">

                    <li class="navlink">
                            <a href="dashb.php">
                                <span class="icon"><ion-icon name="clipboard-outline"></ion-icon></span>
                                <span class="navtext text">Dashboard</span>
                            </a>
                        </li>
                        
                        <li class="navlink">
                            <a href="studentlog.php">
                                <span class="icon"><ion-icon name="body-outline"></ion-icon></span>
                                <span class="navtext text">Student log</span>
                            </a>
                        </li>

                        <li class="navlink">
                            <a href="booklist.php">
                                <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                                <span class="navtext text">Book list</span>
                            </a>
                        </li>

                        <li class="navlink">
                            <a href="editing.php">
                                <span class="icon"><ion-icon name="create-outline"></ion-icon></span>
                                <span class="navtext text">Edit UI</span>
                            </a>
                        </li>
                    </ul>
               
                    <li class="navlink">
                        <a href="logout.php">
                            <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                            <span class="navtext text">Log out</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        
        <script src="js/dashscript.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>