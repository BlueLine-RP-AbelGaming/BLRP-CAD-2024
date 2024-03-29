<?php
// logout.php
session_start();
session_unset();
session_destroy();
// Redirect the user to the login page or any other appropriate page
header("Location: ../index.php");
exit;
?>