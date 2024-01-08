<?php
session_start();



// Use a more secure hashing algorithm than md5, such as password_hash
// See: https://www.php.net/manual/en/function.password-hash.php
$hashing_algorithm = PASSWORD_DEFAULT;
$username = "";
$email = "";
$password = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'library');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['form-box register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    $user_check_query = "SELECT * FROM users WHERE username ='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user["username"] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user["email"] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    if (count($errors) == 0) {
        // Use password_hash() to securely hash passwords
        $password_hash = password_hash($password, $hashing_algorithm);
        $query = "INSERT INTO users (username, email, password) VALUES('$username','$email','$password_hash')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now registered and logged in";
        header('location: booklist.php');
        exit(); // Ensure script stops after redirection
    }
}

if (isset($_POST['form-box login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, 'Username is required');
    }
    if (empty($password)) {
        array_push($errors, 'Password is required');
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $query);

        if ($result && $user = mysqli_fetch_assoc($result)) {
            // Use password_verify() to securely verify hashed passwords
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = 'You are now logged in';
                header('location: booklist.php');
                exit(); // Ensure script stops after redirection
            } else {
                array_push($errors, 'Wrong password');
            }
        } else {
            array_push($errors, 'Wrong username');
        }
    }
}
?>