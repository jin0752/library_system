<?php
include_once("database.php");


$rowCounter = 0;

$sql = "SELECT * FROM books";
$book = $connection->query($sql) or die($connection->error);
$result = $book->fetch_assoc();


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
    

</body>
</html>