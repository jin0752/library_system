<?php
require_once 'database.php';
session_start();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>Book Title</label>
        <input type="text" name="title"><br>
        <label>Author</label>
        <input type="text" name="author"><br>
        <label>Year</label>
        <input type="text" name="year"><br>
        <label>Book Version</label>
        <input type="text" name="bookver"><br>
        <label>Book Number</label>
        <input type="text" name="booknum"><br>
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>