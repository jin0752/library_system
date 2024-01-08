<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="css/stylee.css">
        <title>Log in page </title>
        <link rel="icon" href="img/logo.png" type="image/icon type">   
        
    </head>
    <body>
        <header> 
            <img class="logo" src="img/logo.png" alt="CvSU IMUS">
        </header>
    <!-- Log in -->
        <div class="box">
            <div class="form-box login">
                <h2>kahit ano</h2>
                <form action="conn/dbconn.php" method="post">
                    <div class="input">
                    <input type="text" name="username" required>
                        <label>USERNAME</label><br>
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        
                    </div>
                    <div class="input">
                    <input type="password" name="password" required>
                        <label>PASSWORD</label><br>
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        
                    </div>
                    
                   <button type="submit" class="btn" name="login">Login</button>
                    <div class="add">
                        <p>Add Admin? <a href="#" class="regislink">Create account</a></p>
                    </div>
                </form>
            </div>

<!-- Registration -->
            <div class="form-box register">
                <h2>Sign Up</h2>
                <form action="conn/dbconn.php" method="post">
                    <div class="input">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <label>USERNAME</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="input">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
                        <label>Email</label>
                        <input type="text" name="email" required>
                    </div>
                    <div class="input">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" name="password" required>
                        <label>PASSWORD</label>
                       
                    </div>
                    <button type="submit" class="btn" name="register">Login</button>
                    <div class="add">
                        <p>Already have an account? <a href="#" class="loglink">Sign in</a></p>
                    </div>
                </form>
            </div>

        </div>
        
<?php
if(isset($_POST['login']))
{$u=$_POST['username'];
 $p=$_POST['password'];
 

 $sql="SELECT * from 'users' where username='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['password'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['username']=$u;

   header('location:admin/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect Username or Password')</script>";
}
   

}

?>


        <script src="js/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>