<?php
// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$call = $dbController->sanitizeInput($_REQUEST['call']);
$status = $dbController->sanitizeInput($_REQUEST['status']);

// Attempt insert query execution
$sql = "UPDATE calls SET call_status='$status' WHERE call_number='$call'";

if ($dbController->runQuery($sql)) {
    // Redirect to the call-details.php page after successful update
    header("Location: ../call-details.php?call=$call");
} else {
    // Error occurred while executing the query
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Note: You can remove the line below as the connection will be automatically closed when the script ends.
$dbController->closeDB();
?>
