<?php
session_start();

$servername = 'localhost' ;
$username = 'root';
$password = '';
$dbname = 'librarysystem';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$user = $_POST['username'];
$pass = $_POST['password'];

// Hash the entered password for comparison with the stored hash
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Query the database
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        // Password is correct, set session variables, and redirect to a dashboard
        $_SESSION['username'] = $user;
        header("Location: dashb.php");
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

// Close the connection
$conn->close();
?>