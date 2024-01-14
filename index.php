<?php
require_once 'database.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code){
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'librarysystem00@gmail.com';                     //SMTP username
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('librarysystem00@gmail.com', 'ADMIN');
        $mail->addAddress($email);     //Add a recipient
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from ADMIN';
        $mail->Body    = "Thank you for registration!
        Please click the link to verify your email
        <a href='http://localhost/library_system/verify.php?email=$email&v_code=$v_code'>Verify</a>";
    
        $mail->send();
        return true;
    } catch (Exception $e) {
       return false;
    }
}
if (isset($_POST['register'])) {
    // Registration code with prepared statement and password_hash
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $hashed_cpassword = password_hash($cpassword, PASSWORD_BCRYPT);
    $v_code = bin2hex(random_bytes(16));

    $sql = $connection->prepare('INSERT INTO users (fname, mname, lname, email, password, cpassword, verification_code, is_verified) VALUES (?, ?, ?, ?, ?, ?, ?, 0)');
    
    // Check for errors in the prepared statement
    if ($sql === false) {
        die('Error in the registration prepared statement: ' . $connection->error);
    }


    $sql->bind_param('sssssss', $fname, $mname, $fname, $email, $hashed_password, $hashed_cpassword, $v_code);
    
    if ($sql->execute() && sendMail($_POST['email'], $v_code)){
        echo "<script> alert('Registration Successful');
        window.location.href='index.php';
        </script>";
    }else{
        echo "<script> alert('Server Down');
        window.location.href='index.php';
        </script>";
    }

    if ($password == $cpassword) {
        // Passwords match, you can proceed with further processing or store the password.
        echo "<script type='text/javascript'> alert('Password match'); </script>";
    } else {
        // Passwords do not match, display an error message.
        echo '<script id="registration-error-message"> alert("Password not match"); </script>';
        exit();
    }

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
        $result_fetch = mysqli_fetch_assoc($result);
        if($result_fetch['is_verified']==1){
            if (password_verify($password, $row->password)) {
                // Password is correct
                $_SESSION['user'] = $row;
                header('Location: dashboard.php');
                exit();
            } else {
                // Password is incorrect
                echo '<script id="login-error-message"> alert("Wrong password."); </script>';
            }
        }
            else{
                echo "<script> alert('Email not verified');
                window.location.href='index.php';
                </script>";
            }

        }
        
     else {
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
    <div class="squ">
            <div class="form-box login">
                <h2>Admin Log in</h2>
                    <!-- ... your login form ... -->
                    <form method="POST" action="index.php">
                <div class="input">
                    <input type="text" name="email" required>
                    <label>Email</label>
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                </div>
                <div class="input">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                </div>
               
                     <input type="submit" value="Login" class="button" name="login">
                    <div class="add">
                        <a href="#" class="regislink">Create account</a>
                    </div>
                    <div class="error-box" id="login-error-message"></div>
                </form>
            </div>

        <!-- Registration -->
            <div class="form-box register">
                <h2>Sign Up</h2>
                    <!-- ... your registration form ... -->
                    <form method="POST" action="index.php">
                <div class="input">
                <input type="text" name="fname" required>
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <label>First Name</label>
                    
                </div>
                <div class="input">
                <input type="text" name="mname" required>
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <label>Middle Name</label>
                    
                </div>
                <div class="input">
                <input type="text" name="lname" required>
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <label>Last Name</label>
                    
                </div>
                <div class="input">
                <input type="text" name="email" required>
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <label>Email</label>
                    
                </div>
                <div class="input">
                <input type="password" name="password" required>
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    
                    <label>Password</label>
                </div>
                <div class="input">
                <input type="password" name="cpassword" required>
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    
                    <label>Confirm Password</label>
                </div>
                    <input type="submit" value="Signup" class="button" name="register">
                    <div class="add">
                        <a href="#" class="loglink">Sign in</a>
                    </div>
                    <div class="error-box" id="registration-error-message"></div>
                </form>
            </div>
    </div>

    

    <!-- ... your other scripts ... -->
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
