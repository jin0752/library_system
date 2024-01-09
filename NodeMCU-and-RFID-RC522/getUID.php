<?php
//For READ_TAG_ID
	$UIDresult=$_POST["UIDresult"];
	$Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<?php
// For STUDENT_LOGS
// Check if UID is received
if (isset($_POST['UIDresult'])) {
    // Get UID from POST data
    $UIDresult = $_POST['UIDresult'];

    // Include the database connection
    include 'database.php';

    // Check if the RFID card ID exists in the "table_the_iot_projects" database
    $pdo = Database::connect();
    
    // Getting the data from the database
    $sql = "SELECT id, name FROM table_the_iot_projects WHERE id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$UIDresult]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Inserting the data into the database
        $sql = "INSERT INTO student_logs (id, name, date) VALUES (?, ?, NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$result['id'], $result['name']]);
        
        // Send a response back to Arduino
        echo "Data successfully inserted into the database.";
    } else {
        echo "UID not found in the database.";
    }

    // Disconnect from the database
    Database::disconnect();
} else {
    echo "No UID data received.";
}
?>