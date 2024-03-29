<?php
// Initialize the session
session_start();

// Include the DBController class
require_once("../../dbcontroller.php");

// Create an instance of DBController
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{ 
            font: 14px sans-serif;
            background-color: white;
            color: black;
        }

        .dark-mode {
            background-color: black;
            color: gray;
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
            text-align: left;
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
            background-color: #04AA6D;
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
    </style>
</head>

<body>
    <table id="customers">
        <tr>
            <th>Note</th>
            <th>Delete</th>
        </tr>
        <?php
	        $product_array = $db_handle->runQuery("SELECT * FROM call_notes WHERE call_number='" . $_GET["call"] . "'");
	        if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){
	    ?>
        <tr>
            <td><center><?php echo $product_array[$key]["note"]; ?></center></td>
            <td><center><a href="scripts/delete-note.php?note=<?php echo $product_array[$key]["id"]; ?>"><img src="https://github.com/Abel-Web-Designs/photos/blob/main/delete.png?raw=true"></center></a></td>
        </tr>
	    <?php
		    }
	        }
	    ?>
    </table>
</body>
</html>
