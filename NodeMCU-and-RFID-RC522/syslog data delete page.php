<?php
    require 'database.php';
    $date = 0;
     
    if ( !empty($_GET['date'])) {
        $date = $_GET['date'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $date = $_POST['date'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM student_logs  WHERE date = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($date));
        Database::disconnect();
        header("Location: syslog.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<title>Delete : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
</head>
 
<body>
	<h2 align="center">NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</h2>

    <div class="container">
     
		<div class="span10 offset1">
			<div class="row">
				<h3 align="center">Delete User</h3>
			</div>

			<form class="form-horizontal" action="syslog data delete page.php" method="post">
				<input type="hidden" name="date" value="<?php echo $date;?>"/>
				<p class="alert alert-error">Are you sure to delete ?</p>
				<div class="form-actions">
					<button type="submit" class="btn btn-danger">Yes</button>
					<a class="btn" href="syslog.php">No</a>
				</div>
			</form>
		</div>
                 
    </div> <!-- /container -->
  </body>
</html>