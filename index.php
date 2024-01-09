<?php
require_once 'database.php';
session_start();

if (isset($_POST['register'])) {
    // Registration code with prepared statement and password_hash
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = $connection->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');

    // Check for errors in the prepared statement
    if ($sql === false) {
        die('Error in the registration prepared statement: ' . $connection->error);
    }

    $sql->bind_param('sss', $username, $email, $hashed_password);

    if ($sql->execute()) {
        echo "<script type='text/javascript'> alert('Registered successfully'); </script>";
    } else {
        echo '<script id="registration-error-message"> alert("Registration Failed"); </script>';
    }
}

if (isset($_POST['login'])) {
    // Login code with prepared statement and password_verify
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectQuery = $connection->prepare('SELECT * FROM users WHERE email = ?');

    // Check for errors in the prepared statement
    if ($selectQuery === false) {
        die('Error in the login prepared statement: ' . $connection->error);
    }

    $selectQuery->bind_param('s', $email);
    $selectQuery->execute();
    $result = $selectQuery->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        if (password_verify($password, $row->password)) {
            // Password is correct
            $_SESSION['user'] = $row;
            header('Location: Dashboard.php');
            exit();
        } else {
            // Password is incorrect
            echo '<script id="login-error-message"> alert("Wrong password."); </script>';
        }
    } else {
        // Email does not exist in the database
        echo '<script id="login-error-message"> alert("Email does not exist."); </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... your head content ... -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Log in page</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
</head>

<body>
    <header>
        <img class="logo" src="img/logo.png" alt="CvSU IMUS">
    </header>

    <!-- Log in -->
    <div class="box">
        <div class="login-box">
            <div class="form-box login">
                <h2>Admin Log in</h2>
                <form method="POST" action="index.php">
                    <!-- ... your login form ... -->
                    <form method="POST" action="index.php">
                <div class="input">
                    <input type="text" name="email" required>
                    <label>Email</label><br>
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                </div>
                <div class="input">
                    <input type="password" name="password" required>
                    <label>PASSWORD</label><br>
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                </div>
                    <input type="submit" value="Login" class="btn" name="login">
                    <div class="add">
                        <p>Add Admin? <a href="#" class="regislink">Create account</a></p>
                    </div>
                    <div class="error-box" id="login-error-message"></div>
                </form>
            </div>
        </div>

        <!-- Registration -->
        <div class="register-box">
            <div class="form-box register">
                <h2>Sign Up</h2>
                <form method="POST" action="index.php">
                    <!-- ... your registration form ... -->
                    <form method="POST" action="index.php">
                <div class="input">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <label>USERNAME</label>
                    <input type="text" name="username" required>
                </div>
                <div class="input">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <label>Email</label>
                    <input type="text" name="email" required>
                </div>
                <div class="input">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>PASSWORD</label>
                </div>
                    <input type="submit" value="Signup" class="btn" name="register">
                    <div class="add">
                        <p>Already have an account? <a href="#" class="loglink">Sign in</a></p>
                    </div>
                    <div class="error-box" id="registration-error-message"></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Display login error message
            var loginErrorMessage = document.getElementById("login-error-message");
            if (loginErrorMessage && loginErrorMessage.innerText.trim() !== "") {
                loginErrorMessage.style.display = "block";
            }

            // Display registration error message (if any)
            var registrationErrorMessage = document.getElementById("registration-error-message");
            if (registrationErrorMessage && registrationErrorMessage.innerText.trim() !== "") {
                registrationErrorMessage.style.display = "block";
            }
        });
    </script>

    <!-- ... your other scripts ... -->
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
