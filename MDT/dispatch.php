<?php
    // Initialize the session
    session_start();

    //Get user info
    require_once("../dbcontroller.php");
    $db_handle = new DBController();
    $result = $db_handle->runQuery("SELECT * FROM users WHERE username='" . $_SESSION["username"] . "'");
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../login/login.php");
        exit;
    }

    // Check if the user is dispatch approved
    if($result[0]["dispatch_approved"] == "true"){
        //DO NOTHING
    } else{
        header("location: mdt.php");
    } 

    // Reload Page
    //header("Refresh:60");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script data-ad-client="ca-pub-7177891057187396" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="UTF-8">
    <title>BLRP | Dispatch</title>

    <!-- BASIC BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Nanum+Gothic:wght@800&display=swap" rel="stylesheet">
    
    <!-- BUTTONS -->
    <script src="https://kit.fontawesome.com/af48d48999.js" crossorigin="anonymous"></script>

    <!-- DATABASE RELOAD -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            setInterval(function() {
                $("#officers").load("elements/dispatchOfficers.php");
                refresh();
            }, 100);
        });

        $(document).ready(function()
        {
            setInterval(function() {
                $("#calls").load("elements/callsDispatch.php");
                refresh();
            }, 1000);
        });
    </script>

    <!-- STYLING -->
    <style>
        body{ 
            background-color: white;
            color: black;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 15px;
        }

        button{
            width: 100%;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 30px;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 15px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        #customers {
            font-family: 'Nanum Gothic', sans-serif;
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-family: 'Nanum Gothic', sans-serif;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
            font-family: 'Nanum Gothic', sans-serif;
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
            font-size: 15px;
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

        input[type=reset] {
            width: 100%;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- SIDE NAV -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../index.php">Home</a>
        <a href="mdt.php">MDT</a>
        <?php
            if($result[0]["dispatch_approved"] == "true"){
                ?>
                <a href="dispatch.php">Dispatch Panel</a>
                <?php
            }
        ?>
        <a href="../login/edit-account.php?user=<?php echo $result[0]["username"]; ?>">Edit Account</a>
        <a href="../login/scripts/logout.php">Log Out</a>
        <?php
            if($result[0]["admin"] == "true"){
                ?>
                <a href="../admin/dashboard.php">Admin Dashboard</a>
                <?php
            }
        ?>
    </div>

    <!-- SIDE NAV ITEM -->
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <!-- Header Info -->
    <center>
    <h2 class="my-5">Hello, <strong><?php echo $result[0]["displayName"]; ?></strong></h2>
    <h3>Dispatch MDT Panel</h3>
    </center>

    <hr>

    <!-- STATUS AND OFFICER AREA -->
    <div id="main" class="row">
        
        <!-- ALL OFFICERS -->
        <div class="column">
            <br>
            <h4>Officers</h4>
            <div id="officers"></div>
        </div>

        <!-- EDIT OFFICER STATUS -->
        <div class="column">
            <br>
            <h4>Edit Officer Status</h4>
            <form action="scripts/update-status-dispatch.php" method="post" enctype="multipart/form-data">
                <p>
                    <div class="form-group">
                        
                        <select width="15" name="officer">
                        <option value="">Select Officer</option>
            <?php
	            $product_array = $db_handle->runQuery("SELECT * FROM users ORDER BY id ASC");
	            if (!empty($product_array)) { 
		            foreach($product_array as $key=>$value){
	        ?>
                <!-- EDIT OFFICER CODE HERE -->
                            <option value="<?php echo $product_array[$key]["username"]; ?>"><?php echo $product_array[$key]["callsign"]; ?></option>
	        <?php
		        }
	            }
	        ?>
                        </select>
                        <select width="15" name="status">
                            <option value="">Select Status</option>
                            <option value="10-8">10-8 (Available)</option>
                            <option value="10-7">10-7 (Unavailable)</option>
                            <option value="">----------</option>
                            <option value="10-6">10-6 (Short Break)</option>
                            <option value="10-11">10-11 (Traffic Stop)</option>
                            <option value="10-23">10-23 (On Scene)</option>
                            <option value="10-97">10-97 (Enroute)</option>
                            <option value="">----------</option>
                            <option value="10-42">10-42 (Off Duty/Out of Game)</option>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Update Status">
                    </div>
                </p>
            </form>
        </div>
    </div>

    <hr>

    <!-- CALL AREA -->
    <div id="main" class="row">
        
        <!-- ACTIVE CALLS -->
        <div class="column">
            <?php
                if($result[0]["approved"] == "true"){
                ?>
                    <div id="calls"></div>
                <?php
            }
            ?>     
        </div>

        <!-- CREATE CALL -->
        <div class="column">
            <center>
                <h2>Create New Call</h2>
                <button id="GenerateCallNumber" class="btn btn-dark" onclick="getElementById('call_number').value=Math.floor(Math.random()*100000)">Generate Call Number</button>
                <form action="scripts/new-call-dispatch.php" method="post">
                    <p>
                        <div class="form-group">
                            <label for="call_number">Call Number:</label>
                            <input type="text" name="call_number" id="call_number">

                            <label for="call_name">Call Name:</label>
                            <input type="text" name="call_name" id="call_name">

                            <label for="call_location">Call Location:</label>
                            <input type="text" name="call_location" id="call_location">

                            <label for="call_description">Call Description:</label>
                            <input type="text" name="call_description" id="call_description">

                            <?php
                                if($result[0]["approved"] == "true"){
                            ?>
                            <input type="submit" onclick="NewCallNotification()" class="btn btn-primary" value="Create New Call">
                            <input type="reset" class="btn btn-warning" value="Reset Fields"><br><br>
                            <?php
                            } else{
                            //DO NOTHING IF NOT APPROVED
                            }
                            ?>
                        </div>
                    </p>
                </form>
            </center>
        </div>

    </div>

    <hr>

    <!-- FIVEPD AREA -->
    <div id="tutorial" class="row">
        
        <!-- New Vehicle Citation -->                    
        <div class="column">
            <center><h2>Create Vehicle Citation</h2></center>
            <!-- Trigger/Open The Modal -->
            <button id="myBtn" class="btn btn-dark">User ID's</button>
            <!-- User ID Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <br>
                    <table id="customers">
                        <tr>
                            <th>Name</th>
                            <th>Unit Numebr</th>
                            <th>FivePD User ID</th>
                        </tr>
                        <tr>
                            <td>Director Dobbs</td>
                            <td>1Z-114</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Abel Gaming</td>
                            <td>1K-49</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Bobby</td>
                            <td>1K-94</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Demon Gaming</td>
                            <td>1K-66</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Kyle T</td>
                            <td>1K-39</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>T. Brien</td>
                            <td>1D-52</td>
                            <td>39</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br><br>
            <button id="GenerateCitationNumber" class="btn btn-dark" onclick="getElementById('citationID').value=Math.floor(Math.random()*100000)">Generate Citation ID</button>
            <form action="scripts/new-vehicle-citation-dispatch.php" method="post">
                <p>
                    <div class="form-group">
                        <label for="citationID">Citation ID:</label>
                        <input type="text" name="citationID" id="citationID">

                        <label for="userID">User ID:</label>
                        <input type="text" name="userID" id="userID">

                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name">

                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address">

                        <label for="plate">License Plate:</label>
                        <input type="text" name="plate" id="plate">

                        <label for="vehiclemodel">Vehicle Model:</label>
                        <input type="text" name="vehiclemodel" id="vehiclemodel">

                        <label for="date">Date:</label>
                        <input type="text" name="date" id="date">

                        <label for="time">Time:</label>
                        <input type="text" name="time" id="time">

                        <label for="reason">Reason:</label>
                        <input type="text" name="reason" id="reason">

                        <label for="location">Location:</label>
                        <input type="text" name="location" id="location">

                        <label for="amount">Amount:</label>
                        <input type="text" name="amount" id="amount">

                        <input type="submit" onclick="" class="btn btn-primary" value="Create Vehicle Citation">
                        <input type="reset" class="btn btn-warning" value="Reset Fields"><br><br>
                    </div>
                </p>
            </form>
        </div>
                            
    </div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }

    function NewCallNotification() {
      const request = new XMLHttpRequest();
      request.open("POST", "https://discord.com/api/webhooks/1013151549310115870/LbmE9WcIkTrgR-40OFIJWfXbUGGUKkYp8NLNGLyWJu6YheXc3DHijMrqfSLwy8P2oHB6");

      request.setRequestHeader('Content-type', 'application/json');

      const params = {
        username: "DISPATCH",
        avatar_url: "http://blrp.abelwebdesigns.com/logo/logo-2022.png",
        content: "A new call has been created via MDT by a dispatcher"
      }

      request.send(JSON.stringify(params));
    }

    function NewVehicleCitation() {
      const request = new XMLHttpRequest();
      request.open("POST", "https://discord.com/api/webhooks/1013151549310115870/LbmE9WcIkTrgR-40OFIJWfXbUGGUKkYp8NLNGLyWJu6YheXc3DHijMrqfSLwy8P2oHB6");

      request.setRequestHeader('Content-type', 'application/json');

      const params = {
        username: "DISPATCH",
        avatar_url: "http://blrp.abelwebdesigns.com/logo/logo-2022.png",
        content: "A new vehicle citation has been created via MDT by a dispatcher"
      }

      request.send(JSON.stringify(params));
    }
</script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>