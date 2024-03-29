<?php
// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$BOLOType = $dbController->sanitizeInput($_REQUEST['BOLOType']);
$LastSeen = $dbController->sanitizeInput($_REQUEST['LastSeen']);
$BOLODescription = $dbController->sanitizeInput($_REQUEST['BOLODescription']);
$BOLOReason = $dbController->sanitizeInput($_REQUEST['BOLOReason']);

// Attempt insert query execution
$sql = "INSERT INTO bolos (type, description, reason, last_seen) VALUES ('$BOLOType', '$LastSeen', '$BOLODescription', '$BOLOReason')";
if ($dbController->runQuery($sql)) {
    // Redirect to the leo.php page after successful insertion
    header("Location: ../leo.php");
} else {
    // Error occurred while executing the query
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Note: You can remove the line below as the connection will be automatically closed when the script ends.
$dbController->closeDB();
?>
