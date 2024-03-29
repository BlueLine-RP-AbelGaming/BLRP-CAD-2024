<?php
include_once "../../dbcontroller.php";

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$callNumber = $dbController->sanitizeInput($_REQUEST['call']);
$callNote = $dbController->sanitizeInput($_REQUEST['note']);

// Attempt insert query execution
$sql = "INSERT INTO call_notes (call_number, note) VALUES ('$callNumber', '$callNote')";
if ($dbController->runQuery($sql)) {
    header("Location: ../call-details.php?call=$callNumber");
} else {
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Close connection (Note: You can remove this line as the connection will be automatically closed when the script ends)
$dbController->closeDB();
?>
