<?php
include_once ('database.php');
$rowCounter = 0;

if(isset($_POST['search'])){
    $search = $_POST['searchbar'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search%' || author LIKE '%$search%' || year LIKE '%$search%' || bookver LIKE '%$search%' || booknum LIKE '%$search%'";
    $result = $connection->query($sql) or die ($connection->error);
    $output = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="css/nbooklistt.css" rel="stylesheet">
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
                <button><a href="nbooklist.php">Back</a></button>
                </form>
    <div class="table">
        <?php if(mysqli_num_rows($result)>0){?>
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
            <td><?php echo $output['title']; ?></td>
            <td><?php echo $output['author']; ?></td>
            <td><?php echo $output['year']; ?></td>
            <td><?php echo $output['bookver']; ?></td>
            <td><?php echo $output['booknum']; ?></td>
            
        </tr>
        <?php } ?>
        <?php $rowCounter++; ?>
        <!--PARA MADISPLAY LAHAT NG DATA SA DATABASE DI LANG ISA-->
        <?php }while($output = $result->fetch_assoc()) ?>
        </tbody>
    </table>
            <?php }else{?>
                <p>No Data Found</p>
                <?php }?>
    </div>
            </div>
</div>


</body>
</html>