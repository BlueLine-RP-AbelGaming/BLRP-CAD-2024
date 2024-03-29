<?php
// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$username = $dbController->sanitizeInput($_GET['user']);
$status = $dbController->sanitizeInput($_GET['status']);

// Attempt update query execution
$sql = "UPDATE users SET status='$status' WHERE username='$username'";

if($dbController->runQuery($sql)){
    if($status == "10-42"){
        header("Location: ../leo.php");
    } else {
        header("Location: ../leo.php");
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Close connection (optional if you want to close it explicitly)
$dbController->closeDB();
?>
