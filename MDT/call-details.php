<?php
// Initialize the session
session_start();

//Get user info
require_once("../dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM calls WHERE call_number='" . $_GET["call"] . "'");
$row = $result->fetch_assoc(); // Fetch the data from the mysqli_result object

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script data-ad-client="ca-pub-7177891057187396" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="UTF-8">
    <title>BLRP | MDT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/af48d48999.js" crossorigin="anonymous"></script>
    <style>
        body{ 
            font: 25px sans-serif;
            font-family: 'Oswald', sans-serif;
            background-color: white;
            color: black;
        }

        .dark-mode {
            background-color: black;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 30px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=textarea], select {
            width: 100%;
            padding: 12px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        * {
            box-sizing: border-box;
        }

        /* Style the header */
        .header {
            grid-area: header;
            padding: 30px;
            text-align: center;
            font-size: 35px;
        }

        /* The grid container */
        .grid-container {
            display: grid;
            grid-template-areas: 
            'header header header header header header' 
            'left left middle middle right right' 
            'footer footer footer footer footer footer';
            /* grid-column-gap: 10px; - if you want gap between the columns */
        } 

        .left,
        .middle,
        .right {
            padding: 10px;
            border: 1px solid #000000;
            font: 18px;
            font-family: 'Oswald';
        }

        /* Style the left column */
        .left {
            grid-area: left;
            border: 1px solid #000000;
            font: 18px;
            font-family: 'Oswald';
        }

        /* Style the middle column */
        .middle {
            grid-area: middle;
            border: 1px solid #000000;
            font: 18px;
            font-family: 'Oswald';
        }

        /* Style the right column */
        .right {
            grid-area: right;
            border: 1px solid #000000;
            font: 18px;
            font-family: 'Oswald';
        }

        /* Style the footer */
        .footer {
            grid-area: footer;
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media (max-width: 600px) {
        .grid-container  {
            grid-template-areas: 
            'header header header header header header' 
            'left left left left left left' 
            'middle middle middle middle middle middle' 
            'right right right right right right' 
            'footer footer footer footer footer footer';
        }
        }
    </style>
</head>
<body>
    <!-- SIDE NAV -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../index.php">Home</a>
        <a href="mdt.php">MDT</a>
        <a href="../login/scripts/logout.php">Log Out</a>
    </div>

    <!-- SIDE NAV ITEM -->
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <!-- MDT -->
    <div class="grid-container">
    
        <div class="header">
        <h2>Call Details: <?php echo $row["call_name"]; ?> (#<?php echo $row["call_number"]; ?>) <td><center><a href="edit-call.php?call=<?php echo $row["call_number"]; ?>"><img src="https://github.com/Abel-Web-Designs/photos/blob/main/editing.png?raw=true"></center></a></td></h2>
        </div>
  
  
        <div class="left">
            <center>
                <h3>Call Location</h3>
                <br>
                <p><?php echo $row["call_location"]; ?>
            </center>
        </div>
        
        <div class="middle">
            <center>
                <h3>Call Description</h3>
                <br>
                <p><?php echo $row["call_description"]; ?>
            </center>
        </div>  
        
        <div class="right">
            <center>
                <h3>Call Notes</h3>
                <br>
                <table id="customers">
                    <tr>
                        <th>Note</th>
                        <th>Delete</th>
                    </tr>
                    <?php
        $product_array_notes = $db_handle->runQuery("SELECT * FROM call_notes WHERE call_number='" . $_GET["call"] . "'");
        if (!empty($product_array_notes)) {
            while ($row_notes = $product_array_notes->fetch_assoc()) { // Fetch the data from the mysqli_result object
                ?>
                <tr>
                    <td><center><?php echo $row_notes["note"]; ?></center></td>
                    <td><center><a href="scripts/delete-note.php?note=<?php echo $row_notes["id"]; ?>"><img src="https://github.com/Abel-Web-Designs/photos/blob/main/delete.png?raw=true"></center></a></td>
                </tr>
            <?php
            }
        }
        ?>
                </table>
            </center>
        </div>
    </div>

    <br><hr><br>

    <center>
    <div class="grid-container">
    
        <div class="left">
            <center>
                <h2>Call Status: <?php echo $row["call_status"]; ?></h2>
                <form action="scripts/update-call-status.php?call=<?php echo $row["call_number"]; ?>" method="post" enctype="multipart/form-data">
                    <p>
                        <div class="form-group">
                            <h4>Status:</h4>
                            <select width="15" name="status">
                                <option value="">Select Status</option>
                                <option value="ACTIVE">On-Going</option>
                                <option value="CODE 4">Code 4</option>
                                <option value="ENROUTE">Enroute</option>
                            </select>
                            <input type="submit" class="btn btn-primary" value="Update Status">
                        </div>
                    </p>
                </form>
            </center>
        </div>

        <div class="middle">
            <center>
                
            </center>
        </div>

        <div class="right">
            <center>
                <h3>Add Call Notes</h3>
                <br>
                <form action="scripts/add-call-note.php?call=<?php echo $row["call_number"]; ?>" method="post" enctype="multipart/form-data">
                    <p>
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <input type="text" name="note" id="note">

                            <input type="submit" class="btn btn-primary" value="Add Note">
                        </div>
                    </p>
                </form>
            </center>
        </div>
    </div>
    </center>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }

    function toggleDarkMode() {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }

    function autoRefresh() {
        window.location = window.location.href;
    }
    setInterval('autoRefresh()', 60000);
</script>
</body>
</html>