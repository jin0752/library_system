<?php
require("database.php");

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
    $stmt = mysqli_prepare($connection, $query);

    // Check for errors in the prepared statement
    if (!$stmt) {
        die('Error in the SELECT prepared statement: ' . mysqli_error($connection));
    }

    
    mysqli_stmt_execute($stmt);

    // Check for errors in the execution
    if (mysqli_stmt_error($stmt)) {
        die('Error in the SELECT execution: ' . mysqli_stmt_error($stmt));
    }

    $result = mysqli_stmt_get_result($stmt);

    // Check if any rows were returned
    if ($result && mysqli_num_rows($result) == 1) {
        $result_fetch = mysqli_fetch_assoc($result);

        // Check if the email is not already verified
        if ($result_fetch['is_verified'] == 0) {
            $update = "UPDATE `users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
            $stmt_update = mysqli_prepare($connection, $update);

            // Check for errors in the prepared statement
            if (!$stmt_update) {
                die('Error in the UPDATE prepared statement: ' . mysqli_error($connection));
            }

            mysqli_stmt_bind_param($stmt_update, 's', $result_fetch['email']);
            mysqli_stmt_execute($stmt_update);

            // Check for errors in the execution
            if (mysqli_stmt_error($stmt_update)) {
                die('Error in the UPDATE execution: ' . mysqli_stmt_error($stmt_update));
            }

            echo "<script> alert('Email verification successful');
                  window.location.href='index.php';
                  </script>";
        } else {
            echo "<script> alert('Email already registered');
                  window.location.href='index.php';
                  </script>";
        }
    } else {
        echo "<script> alert('Cannot run query');
              window.location.href='index.php';
              </script>";
    }
    
    // Close the statements
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_update);
}
?>