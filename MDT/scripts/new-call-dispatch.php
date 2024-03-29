<?php
// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$callNumber = $dbController->sanitizeInput($_REQUEST['call_number']);
$callName = $dbController->sanitizeInput($_REQUEST['call_name']);
$callLocation = $dbController->sanitizeInput($_REQUEST['call_location']);
$callDescription = $dbController->sanitizeInput($_REQUEST['call_description']);

// Attempt insert query execution
$sql = "INSERT INTO calls (call_number, call_name, call_location, call_description, call_status) VALUES ('$callNumber', '$callName', '$callLocation', '$callDescription', 'ACTIVE')";
if ($dbController->runQuery($sql)) {
    // Redirect to the dispatch.php page after successful insertion
    header("Location: ../dispatch.php");
} else {
    // Error occurred while executing the query
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Note: You can remove the line below as the connection will be automatically closed when the script ends.
$dbController->closeDB();
?>
