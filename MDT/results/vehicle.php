<?php
    // Initialize the session
    session_start();

    //Get user info
    require_once("../../dbcontroller.php");
    $db_handle = new DBController();
    $result = $db_handle->runQuery("SELECT * FROM vehicles WHERE plate='" . $_POST['InputtedPlate'] . "'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>VEHICLE SEARCH</title>
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

        <div class="card-body">
            <h5 class="card-title">PLATE: <?php echo $result[0]["plate"]; ?></h5>
        </div>
            
        <ul class="list-group list-group-flush">
            <li class="text-left list-group-item">Plate: <b><?php echo $result[0]["plate"]; ?></b></li>
            <li class="text-left list-group-item">Model: <b><?php echo $result[0]["model"]; ?></b></li>
            <li class="text-left list-group-item">Color: <b><?php echo $result[0]["color"]; ?></b></li>
            <li class="text-left list-group-item">Registered Owner: <b><?php echo $result[0]["owner"]; ?></b></li>
            <li class="text-left list-group-item">Status: <b><?php echo $result[0]["status"]; ?></b></li>
        </ul>

        <div class="card-body">
            <form target="_blank" action="person.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $result[0]["owner"]; ?>" name="InputtedName" id="InputtedName" aria-describedby="NameHelp" readonly>
                </div>
                <button type="submit" class="btn btn-dark">Open Owner Card</button>
            </form>
        </div>

    </div>
</center>
</body>
</html>