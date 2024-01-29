<?php
include_once("database.php");


$rowCounter = 0;

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
    $connection->query($sql) or die($connection->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="css/nbooklist.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/icon type">
</head>
<body>
    <header>

    </header>
    <div class="bar"><?php require "sidebar.php"?></div> 
<div class="content">
            <div class="overview">
                <div class="title">
                    <span class="text">Book List</span>
                </div>
                <form method="POST" action="search.php">
                <input type="text" placeholder="Search...." name="searchbar">
                <input type="submit" name="search" value="Search">
                <button><a href="#bulaga">Add Book</a></button>
                </form>
                
    <div class="table">
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>  
            <th>Book Version</th>
            <th>Book Number</th>
        </tr>
        </thead>
        <tbody>
        <?php do{?>
        <?php if($rowCounter >= 0){?>                             <!--para makita ung ID kahit itapat lang ung cursor sa view na text--> 
        <tr class = "table">
            <td><?php echo $result['title']; ?></td>
            <td><?php echo $result['author']; ?></td>
            <td><?php echo $result['year']; ?></td>
            <td><?php echo $result['bookver']; ?></td>
            <td><?php echo $result['booknum']; ?></td>
            
        </tr>
        <?php } ?>
        <?php $rowCounter++; ?>
        <!--PARA MADISPLAY LAHAT NG DATA SA DATABASE DI LANG ISA-->
        <?php }while($result = $book->fetch_assoc()) ?>
        </tbody>
    </table>
    </div>
            </div>
</div>
    <div id="bulaga" class="modal">
            <div class="kuntent">
                <h1 style="color: black; padding-bottom:15px;">Add Book</h1>
                <form method="POST" id="kuntent">
                    <label>Book Title:</label><br>
                    <input type="text" name="title"><br>
                    <label>Author:</label><br>
                    <input type="text" name="author"><br>
                    <label>Year:</label><br>
                    <input type="text" name="year"><br>
                    <label>Book Version:</label><br>
                    <input type="text" name="bookver"><br>
                    <label>Book Number:</label><br>
                    <input type="text" name="booknum"><br>
                    <input type="submit" name="add" value="Add">
                </form>
                <a href="#" class="box-close"> +</a>
            </div>
    </div>

</body>
</html>