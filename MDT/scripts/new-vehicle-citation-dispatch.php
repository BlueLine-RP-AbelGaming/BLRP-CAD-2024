<?php
// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of the DBController class
$dbController = new DBController();

// Escape user inputs for security
$citationID = $dbController->sanitizeInput($_REQUEST['citationID']);
$userID = $dbController->sanitizeInput($_REQUEST['userID']);
$name = $dbController->sanitizeInput($_REQUEST['name']);
$address = $dbController->sanitizeInput($_REQUEST['address']);
$plate = $dbController->sanitizeInput($_REQUEST['plate']);
$vehicleModel = $dbController->sanitizeInput($_REQUEST['vehiclemodel']);
$date = $dbController->sanitizeInput($_REQUEST['date']);
$time = $dbController->sanitizeInput($_REQUEST['time']);
$reason = $dbController->sanitizeInput($_REQUEST['reason']);
$location = $dbController->sanitizeInput($_REQUEST['location']);
$amount = $dbController->sanitizeInput($_REQUEST['amount']);

// Attempt insert query execution
$sql = "INSERT INTO vehiclecitations (citationID, userID, name, address, licenseplate, vehicle, date, time, reason, location, amount, isPoint) VALUES (
    '$citationID',
    '$userID', 
    '$name', 
    '$address',
    '$plate',
    '$vehicleModel',
    '$date',
    '$time',
    '$reason',
    '$location',
    '$amount',
    '0'
    )";

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
