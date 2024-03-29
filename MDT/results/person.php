<?php
    // Initialize the session
    session_start();

    //Get user info
    require_once("../../dbcontroller.php");
    $db_handle = new DBController();
    $result = $db_handle->runQuery("SELECT * FROM civilians WHERE full_name='" . $_POST['InputtedName'] . "'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $result[0]["full_name"]; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    <br><br>

    <div class="card" style="width: 18rem;">

        <!-- MALE MUGSHOT -->
        <?php
            if($result[0]["gender"] == "MALE"){
        ?>
            <img src="http://i.imgur.com/VJqlwXt.jpg" class="card-img-top" alt="...">
        <?php
            } else {
        ?>
            <img src="https://prod.hosted.cloud.rockstargames.com/ugc/gta5photo/hm5beDkm90uOtctyPcW1kQ_0_0.jpg" class="card-img-top" alt="...">
        <?php
            }
        ?>
        
            
        <div class="card-body">
            <!--<h5 class="card-title"><?php echo $result[0]["first_name"]; ?> <?php echo $result[0]["last_name"]; ?></h5>-->
            <h5 class="card-title"><?php echo $result[0]["full_name"]; ?></h5>
        </div>
            
        <ul class="list-group list-group-flush">
            <li class="text-left list-group-item">Full Name: <b><?php echo $result[0]["full_name"]; ?></b></li>
            <li class="text-left list-group-item">Age: <b><?php echo $result[0]["age"]; ?></b></li>
            <li class="text-left list-group-item">Address: <b><?php echo $result[0]["address"]; ?></b></li>
            <li class="text-left list-group-item">License Status: <b><?php echo $result[0]["license_status"]; ?></b></li>
            <li class="text-left list-group-item">Gender: <b><?php echo $result[0]["gender"]; ?></b></li>
            <li class="text-left list-group-item">Hair Color: <b><?php echo $result[0]["hair_color"]; ?></b></li>
            <li class="text-left list-group-item">Race: <b><?php echo $result[0]["race"]; ?></b></li>
            <li class="text-left list-group-item">Weight: <b><?php echo $result[0]["weight"]; ?> LBS</b></li>
        </ul>

    </div>
</center>
</body>
</html>