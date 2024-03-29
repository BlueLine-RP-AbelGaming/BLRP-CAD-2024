<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueLine RP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Video background -->
    <video id="video-background" autoplay loop muted>
        <source src="police_lights_video.mp4" type="video/mp4">
        <!-- Add additional source elements for other video formats -->
        Your browser does not support the video tag.
    </video>

    <nav class="navbar">
        <a href="#" class="navbar-brand">BlueLine RP</a>
        <div class="navbar-buttons">
            <?php
                if (isset($_SESSION['isApproved']) && $_SESSION['isApproved'] === true) {?>
                    <a href="MDT/leo.php" class="button">MDT Panel</a>
            <?php } ?>
            
            <?php
                if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {?>
                    <a href="#" class="button">Admin Panel</a>
            <?php } ?>

            <?php
                if (isset($_SESSION['isApproved']) && $_SESSION['isApproved'] === true) {?>
                    <a href="" class="button">Civilian Panel</a>
            <?php } ?>
            
            <?php
                if (isset($_SESSION['isDispatch']) && $_SESSION['isDispatch'] === true) {?>
                    <a href="" class="button">Dispatch Panel</a>
            <?php } ?>

            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {?>
                    <a href="" class="button">My Account</a>
                    <a href="scripts/logout.php" class="button">Logout</a>
            <?php } else {?>
                    <a href="login.php" class="button">Login</a>
                    <a href="register.php" class="button">Regiser</a>
            <?php }?>
        </div>

        <button id="dark-mode-toggle" class="navbar-toggle-dark-mode">Dark Mode</button>
    </nav>

    <div class="container">
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo "<center><h1>Welcome back to BlueLine RP, " . $_SESSION['username'] . "!</h1></center>";
            } else {
                echo "<h1>Welcome to BlueLine RP!</h1> <p>You are not logged in. Please <a href='login.php' style='text-decoration: none;'>login</a> to access site content!</p>";
            }
        ?>
    </div>

    <script>
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
