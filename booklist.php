<?php
include_once ('database.php');
session_start();

$sql = "SELECT * FROM books";
$book = $connection->query($sql) or die($connection->error);
$result = $book->fetch_assoc();

if (isset($_POST['add'])){
    $cabnum = $_POST['cabnum'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $bookver = $_POST['bookver'];
    $booknum = $_POST['booknum'];

    $sql = "INSERT INTO `books` (`cabnum`,`title`,`author`,`year`,`bookver`,`booknum`)VALUES ('$cabnum','$title','$author','$year','$bookver','$booknum')";
    $book = $connection->query($sql) or die($connection->error);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/booklistt.css">
    <title>Book Lists</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
</head>
<body>
    
    <header> 
        
    </header>
    <div class="bar"><?php require "sidebar.php"?></div>  
   

    
    <div class="container"> 
        <h1>Book  List</h1>
    <button type="submit" class="button">Add book</button>
    
    <div class ="modal-cont">
        <div class="modal-conte"> 
        <label>Book Details</label>
        <div class="close">+</div>
            <form method="post">
                
                <input type="text" name="title" placeholder="Book Title"><br>
                <input type="text" name="author" placeholder="Author"><br>
                <input type="text" name="year" placeholder="Year"><br>
                <input type="text" name="bookver" placeholder="Book Version"><br>
                <input type="text" name="booknum" placeholder="Book Number"><br>
                <input type="submit" name="add" value="Add">
            </form>
        </div>
    </div>


    <div class="search-box">
        <input type="text" placeholder="Search...">
        <span class="search">
        <span class="search-icon"><ion-icon name="search-outline"></ion-icon></span>
        </span>
    </div>
        <div class="bk">
       
            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2><p><?php echo $result['title'];?></p></h2>
                <p><?php echo $result['author'];?></p>
                <p><?php echo $result['year'];?></p>
                <p><?php echo $result['bookver'];?></p>
                <p><?php echo $result['booknum']?></p>
            </div>
        </div>

        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2>Basic Statistics 5th Edition</h2>
                <p>Charles Henry Brase, Corrine Pellillo Brase</p>
                <p>2012</p>
                <p>QA 276.12 B12 2012 copy 3</p>
                <p>5635</p>
                
                
            </div>
        </div>

        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2> Trigonometry Ninth Edition</h2>
                <p>John Hornsby, David Schneider</p>
                <p>2009</p>
                <p>QA 531 L52 2009 copy 3</p>
                <p>ISBN 9780385547345</p>

            </div>
        </div>

        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2> An Introduction to Computer Science Using C</h2>
                <p>Roger Eggen, Maurice Eggen</p>
                <p>1994</p>
                <p>QA 76 C65 E33 1994 copy 1</p>
                <p>001093</p>
               
            </div>
        </div>

        
        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2> Artificial Intelligence (Structures and Strategies for Complex Problem Solving)</h2>
                <p>George F. Luger</p>
                <p>2003</p>
                <p>Q 335 L48 2003</p>
                <p>005601</p>
                
            </div>
        </div>

        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2> New trends in school science equipment</h2>
                <p>United Nations Educational, Scientific and Cultural Organization</p>
                <p>1983</p>
                <p>Q 183 N48 1983</p>
                <p>000454</p>
               
            </div>
        </div>

        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2> The Physical Sciences</h2>
                <p>Dr. Franklin G. Fisk, Dr. Milo K. Blecha</p>
                <p>1974</p>
                <p>Q 158.5 F57 1974</p>
                <p>000221</p>
                
            </div>
        </div>

        <div class="bk">

            <div class="icon">
                <img src="img/book.png" alt="" />
            </div>
            <div class="content">
                <h2> Remarkable Relatives</h2>
                <p>John Train</p>
                <p>1981</p>
                <p>PN 6231 T72 1981</p>
                <p>001875</p>
               
            </div>
        </div>

</div>

    <script src="js/bl.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>