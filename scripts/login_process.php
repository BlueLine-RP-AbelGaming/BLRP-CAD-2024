<?php
include_once "../dbcontroller.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize input data
    $dbController = new DBController();
    $username = $dbController->sanitizeInput($username);
    $password = $dbController->sanitizeInput($password);

    // Check if user exists in the database
    $query = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'";
    $result = $dbController->runQuery($query);

    if ($result->num_rows == 1) {
        // Set the session as logged in
        session_start();
        $_SESSION['loggedin'] = true;

        // Fetch and store the username and other information in the session
        $userData = $result->fetch_assoc();
        $_SESSION['username'] = $userData['Username'];
        $_SESSION['status'] = $userData['Status'];
        $_SESSION['unit'] = $userData['UnitNumber'];
        $_SESSION['isApproved'] = ($userData['Approved'] === 'true'); // Convert string to boolean
        $_SESSION['isAdmin'] = ($userData['Admin'] === 'true'); // Convert string to boolean
        $_SESSION['isDispatch'] = ($userData['Dispatch'] === 'true'); // Convert string to boolean

        // User exists, redirect to dashboard or home page
        header("Location: ../index.php");
    } else {
        // User does not exist or incorrect credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $dbController->closeDB();
}
?>
