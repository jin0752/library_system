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

    // Getting the data from the database, including the 'status' column
    $sql = "SELECT id, name, status FROM table_the_iot_projects WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$UIDresult]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Check the latest entry for the student
        $latestEntry = $pdo->prepare("SELECT * FROM student_logs WHERE id = ? ORDER BY date DESC LIMIT 1");
        $latestEntry->execute([$result['id']]);
        $latestData = $latestEntry->fetch(PDO::FETCH_ASSOC);

        // Determine the new status based on the latest entry
        $newStatus = (!empty($latestData['status']) && $latestData['status'] == 'Check-in') ? 'Check-out' : 'Check-in';

        $existingEntry = $pdo->prepare("SELECT * FROM student_logs WHERE id = ? AND DATE(date) = CURDATE()");
        $existingEntry->execute([$result['id']]);
        $existingData = $existingEntry->fetch(PDO::FETCH_ASSOC);

        if ($existingData) {
            // If there is an entry, update the status to represent check-in or check-out
            $sql = "UPDATE table_the_iot_projects SET status = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$newStatus, $result['id']]);

            // Inserting a new entry with the current status and timestamp
            $sql = "INSERT INTO student_logs (id, name, date, status) VALUES (?, ?, NOW(), ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$result['id'], $result['name'], $newStatus]);

            // Update the status in the student_logs table
            // $sql = "UPDATE student_logs SET status = ? WHERE id = ? AND DATE(date) = CURDATE()";
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute([$newStatus, $result['id']]);

            // Send a response back to Arduino
            echo "Data successfully updated in the database.";
        } else {
            // If there is no existing entry, insert a new entry with the current status and timestamp
            $sql = "INSERT INTO student_logs (id, name, date, status) VALUES (?, ?, NOW(), ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$result['id'], $result['name'], $newStatus]);

            $sql = "UPDATE table_the_iot_projects SET status = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$newStatus, $result['id']]);

            // Send a response back to Arduino
            echo "Data successfully inserted into the database.";
        }

        // Disconnect from the database
        Database::disconnect();
    } else {
        echo "UID not found in the database.";
    }
} else {
    echo "No UID data received.";
}
