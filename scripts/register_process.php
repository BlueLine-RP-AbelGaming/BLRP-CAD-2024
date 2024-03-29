<?php
include_once "../dbcontroller.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from registration form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Sanitize input data
    $dbController = new DBController();
    $username = $dbController->sanitizeInput($username);
    $password = $dbController->sanitizeInput($password);
    $email = $dbController->sanitizeInput($email);

    // Check if username already exists
    $query = "SELECT * FROM Users WHERE Username = '$username'";
    $result = $dbController->runQuery($query);

    if ($result->num_rows > 0) {
        // Username already exists
        echo "Username already exists. Please choose a different username.";
    } else {
        // Insert new user into the database
        $query = "INSERT INTO Users (Username, Password, Email) VALUES ('$username', '$password', '$email')";
        if ($dbController->runQuery($query)) {
            header("Location: ../login.php");
        } else {
            echo "Error: Registration failed.";
        }
    }

    // Close the database connection
    $dbController->closeDB();
}
?>
