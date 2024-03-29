<?php
// This file is responsible for fetching user preferences from the database

// Include database connection
include_once "../dbcontroller.php";

// Start session if not already started
session_start();

// Check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Fetch user preferences from the database
    $dbController = new DBController();

    // Assuming you have a Users table with a column for dark_mode
    $username = $_SESSION['username'];
    $query = "SELECT dark_mode_enabled FROM Users WHERE Username = '$username'";
    $result = $dbController->runQuery($query);

    if ($result->num_rows == 1) {
        // Retrieve user data
        $userData = $result->fetch_assoc();

        // Check if 'dark_mode' column exists in the database
        if (isset($userData['dark_mode'])) {
            // If 'dark_mode' column exists, store the dark mode preference in session
            $_SESSION['dark_mode'] = $userData['dark_mode'];
        } else {
            // If 'dark_mode' column doesn't exist, handle as needed (e.g., set default value)
            $_SESSION['dark_mode'] = false; // Set default value (assuming false means light mode)
        }
    } else {
        // Handle case where user data is not found
        // Set default dark mode preference or handle as needed
        $_SESSION['dark_mode'] = false; // Set default value (assuming false means light mode)
    }

    // Close the database connection
    $dbController->closeDB();
} else {
    // User is not logged in, handle appropriately (e.g., redirect to login page)
    header("Location: login.php");
    exit; // Ensure script execution stops after redirect
}
?>
