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

// Attempt update query execution
$sql = "UPDATE calls SET call_name='$callName', call_location='$callLocation', call_description='$callDescription' WHERE call_number='$callNumber'";

if($dbController->runQuery($sql)){
    header("Location: ../leo.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Close connection (optional if you want to close it explicitly)
$dbController->closeDB();
?>
