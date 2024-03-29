<?php
// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$username = $dbController->sanitizeInput($_REQUEST['officer']);
$status = $dbController->sanitizeInput($_REQUEST['status']);

// Attempt update query execution
$sql = "UPDATE users SET status='$status' WHERE username='$username'";

if($dbController->runQuery($sql)){
    header("Location: ../dispatch.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Close connection (optional if you want to close it explicitly)
$dbController->closeDB();
?>
