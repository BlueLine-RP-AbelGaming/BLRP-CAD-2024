<?php
session_start(); // Start the session to access session variables
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLRP - Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Additional styles for register page */
        form {
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand">BlueLine RP</a>
        <button id="dark-mode-toggle" class="navbar-toggle-dark-mode">Dark Mode</button>
    </nav>
    <div class="container">
        <h1>Register</h1>
        <!-- Your registration form -->
        <form action="scripts/register_process.php" method="post">
            <!-- Input fields for username, password, email, etc. -->
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <!-- Add more fields as needed -->
            <button type="submit" class="button">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script>
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
