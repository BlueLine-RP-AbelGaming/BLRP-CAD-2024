<?php

class DBController {
    private $host = "localhost"; // Change this to your MySQL host
    private $user = "root"; // Change this to your MySQL username
    private $password = ""; // Change this to your MySQL password
    private $database = "blrp-cad"; // Change this to your MySQL database name
    private $conn;

    // Constructor
    public function __construct() {
        $this->conn = $this->connectDB();
    }

    // Function to connect to the database
    public function connectDB() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Function to execute a query
    public function runQuery($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    // Function to sanitize input
    public function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Function to close the database connection
    public function closeDB() {
        $this->conn->close();
    }
}

?>
