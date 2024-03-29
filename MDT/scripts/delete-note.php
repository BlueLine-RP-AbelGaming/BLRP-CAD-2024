<?php
// Initialize the session
session_start();

// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Get user info
$result = $dbController->runQuery("SELECT * FROM call_notes WHERE id='" . $_GET["note"] . "'");
$callNumber = $result["call_number"];

// Escape user inputs for security
$noteID = $dbController->sanitizeInput($_REQUEST['note']);

// Attempt to delete the note entry
$sql = "DELETE FROM call_notes WHERE id='$noteID'";
if ($dbController->runQuery($sql)) {
    // Redirect to the call details page after successful deletion
    header("Location: ../call-details.php?call=$callNumber");
} else {
    // Error occurred while executing the query
    echo "ERROR: Could not able to execute $sql. " . $dbController->conn->error;
}

// Note: You can remove the line below as the connection will be automatically closed when the script ends.
$dbController->closeDB();
?>
