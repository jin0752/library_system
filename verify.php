<?php
    require("database.php");

    if(isset($_GET['email']) && isset($_GET['v_code'])){
        $query = "SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
        $result=mysqli_query($connection,$query);
        if($result){
            if(mysqli_num_rows($result)==2){
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==0){
                    $update= "UPDATE `users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
                    if(mysqli_query($connection,$update)){
                        echo "<script> alert('Email verification successful');
                        window.location.href='index.php';
                        </script>";
                    }
                }else{
                    echo "<script> alert('Email already registered');
                    window.location.href='index.php';
                    </script>";
                }
            }
        }else{
            echo "<script> alert('Cannot run query');
        window.location.href='index.php';
        </script>";
        }
    }
?>