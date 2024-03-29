<?php
include_once "../dbcontroller.php";

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$callNumber = $dbController->sanitizeInput($_REQUEST['call']);

// Delete all call notes for the specified call number
$sql2 = "DELETE FROM call_notes WHERE call_number='$callNumber'";
if ($dbController->runQuery($sql2)) {
    // Successfully deleted call notes
} else {
    // Error occurred while deleting call notes
}

// Attempt to delete the call entry
$sql = "DELETE FROM calls WHERE call_number='$callNumber'";
if ($dbController->runQuery($sql)) {
    // Redirect to the desired page after successful deletion
    header("Location: ../leo.php");
} else {
    // Error occurred while executing the query
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Close connection (Note: You can remove this line as the connection will be automatically closed when the script ends)
$dbController->closeDB();
?>
