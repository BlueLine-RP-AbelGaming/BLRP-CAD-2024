<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Return an error response if not logged in
    http_response_code(403); // Forbidden
    exit("User is not logged in.");
}

// Include database connection
include_once "../../dbcontroller.php";

// Check if status parameter is set
if (isset($_GET['status'])) {
    // Sanitize and get status from GET parameter
    $status = $_GET['status'];
    // You may want to further validate the status value here

    // Update user status in the database
    $dbController = new DBController();
    $username = $_SESSION['username']; // Assuming you have stored the username in the session
    $query = "UPDATE Users SET Status = '$status' WHERE Username = '$username'";
    $result = $dbController->runQuery($query);

    if ($result) {
        // Status updated successfully
        $_SESSION['status'] = $status; // Update status in session

        // Echo the updated status
        echo $status;
    } else {
        // Error updating status
        http_response_code(500); // Internal Server Error
        exit("Error updating status.");
    }
} else {
    // Return an error response if status parameter is not set
    http_response_code(400); // Bad Request
    exit("Status parameter is not set.");
}
?>
