<?php
// Initialize the session
session_start();

// Include the DBController class
require_once("dbcontroller.php");

// Create an instance of DBController
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/51aee4347e.js" crossorigin="anonymous"></script>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Style the header */
    .header {
        width: auto;
	    height: 200px;
	    padding: 10px;
        background-image: url(../backend/img/promo.png);
        text-align: center;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }

    /* Style the side navigation */
    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        /*background-color: gray;*/
        top: 25;
        left: 0;
        overflow-x: hidden;
    }


    /* Side navigation links */
    .sidenav a {
        color: blue;
        padding: 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color on hover */
    .sidenav a:hover {
        background-color: gray;
        color: black;
    }

    /* Style the content */
    .content {
        margin-left: 200px;
        padding-left: 20px;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</head>

<body>
    <center>
        <h2>Active BOLO's</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">BOLO ID</th>
                    <th scope="col">BOLO Type</th>
                    <th scope="col">BOLO Reason</th>
                    <th scope="col">BOLO Description</th>
                    <th scope="col">Last Seen</th>
                </tr>
            </thead>
            <tbody>
                <?php
	                $product_array = $db_handle->runQuery("SELECT * FROM bolos");
	                if (!empty($product_array)) { 
		            foreach($product_array as $key=>$value){
	            ?>
                <tr>
                    <td><center><?php echo $product_array[$key]["id"]; ?></center></td>
                    <td><center><?php echo $product_array[$key]["type"]; ?></center></td>
                    <td><center><?php echo $product_array[$key]["reason"]; ?></center></td>
                    <td><center><?php echo $product_array[$key]["description"]; ?></center></td>
                    <td><center><?php echo $product_array[$key]["last_seen"]; ?></center></td>
                </tr>
	            <?php
		            }
	                }
	            ?>
            </tbody>
        </table>
    </center>
</body>
</html>
