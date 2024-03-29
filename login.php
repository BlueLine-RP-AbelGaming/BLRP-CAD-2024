<?php
session_start(); // Start the session to access session variables
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLRP - Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Additional styles for login page */
        form {
            text-align: center;
        }
        input[type="text"],
        input[type="password"] {
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
        <h1>Login</h1>
        <form action="scripts/login_process.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="button">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

    <script>
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
