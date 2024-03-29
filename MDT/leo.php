<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDT - Officer Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- BASIC BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/51aee4347e.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/af48d48999.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            setInterval(function() {
                $("#calls").load("elements/calls.php");
                refresh();
            }, 1000);
        });

        $(document).ready(function()
            {
                setInterval(function() {
                    $("#officers").load("elements/officers.php");
                    refresh();
                }, 100);
        });

        $(document).ready(function()
            {
                setInterval(function() {
                    $("#activebolos").load("elements/bolos.php");
                    refresh();
                }, 1000);
        });
    </script>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    a {
        text-decoration: none;
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
        padding-left: 10px;
        overflow-x: hidden;
        text-decoration: none;
    }

    /* Style the content */
    .content {
        margin-left: 200px;
        padding-left: 20px;
        padding-top: 25px;
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

    .close3 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close3:hover,
    .close3:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close2 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close2:hover,
    .close2:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close4 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close4:hover,
    .close4:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close5 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close5:hover,
    .close5:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close6 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close6:hover,
    .close6:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close7 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close7:hover,
    .close7:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close8 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close8:hover,
    .close8:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close9 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }       

    .close9:hover,
    .close9:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">Mobile Data Terminal</a>
        <a>Current Unit: <b><font color="yellow"><?php echo $_SESSION['unit']; ?></font></b></a> | <a>Current Status: <b><font color="yellow"><?php echo $_SESSION['status']; ?></font></b></a>
        <div class="navbar-buttons">
            <button class="status-button" data-status="10-8" style="background-color: #007bff; color: #fff;">10-8</button>
            <button class="status-button" data-status="10-7" style="background-color: #007bff; color: #fff;">10-7</button>
            <button class="status-button" data-status="10-6" style="background-color: #007bff; color: #fff;">10-6</button>
            <button class="status-button" data-status="10-11" style="background-color: #007bff; color: #fff;">10-11</button>
            <button class="status-button" data-status="10-23" style="background-color: #007bff; color: #fff;">10-23</button>
            <button class="status-button" data-status="10-97" style="background-color: #007bff; color: #fff;">10-97</button>
            <button class="status-button" data-status="10-15" style="background-color: #007bff; color: #fff;">10-15</button>
            <button class="status-button" data-status="10-41" style="background-color: #007bff; color: #fff;">10-41</button>
            <button class="status-button" data-status="10-42" style="background-color: #007bff; color: #fff;">10-42</button>
            <button id="dark-mode-toggle" class="navbar-toggle-dark-mode">Dark Mode</button>
        </div>
    </nav>

    <!-- SIDEBAR BUTTONS -->
    <div class="sidenav">
        <center>
            <br>
            <button class="btn btn-dark btn-block" id="OpenNameSearch"><b>Name Database</b></button>
            <button class="btn btn-dark btn-block" id="OpenPlateSearch"><b>Plate Database</b></button>
            <button class="btn btn-dark btn-block" id="OpenShowCodes"><b>Signal Codes</b></button>
            <button class="btn btn-dark btn-block" id="OpenShowCalls"><b>Active Calls</b></button>
            <button class="btn btn-dark btn-block" id="OpenShowOfficers"><b>Active Officers</b></button>
            <button class="btn btn-dark btn-block" id="OpenCreateBOLO"><b>Create BOLO</b></button>
            <button class="btn btn-dark btn-block" id="OpenShowBOLOS"><b>View BOLOS</b></button>
            <button class="btn btn-dark btn-block" id="OpenCreateCall"><b>Create Call</b></button>
            <button class="btn btn-dark btn-block" id="OpenCreateVehCitation"><b>Vehicle Citation</b></button>
            <button class="btn btn-dark btn-block" disabled><b>Incident Report</b></button>
            <button class="btn btn-dark btn-block" disabled><b>Arrest Report</b></button>
            <hr>
            <form action="https://docs.google.com/spreadsheets/d/1-EpFnLwpg3yYlrnuZXcLA6yqFVz2wJUSSW1F45OSfi4/edit?usp=sharing" target="_blank">
                <div class="form-group">
                    <button class="btn btn-dark btn-block"><b>Penal Code</b></button>
                </div>
            </form>
            <form action="../index.php">
                <div class="form-group">
                    <button class="btn btn-dark btn-block"><b>Return Home</b></button>
                </div>
            </form>
        </center>
    </div>

    <!-- MODALS -->

        <!-- NAME SEARCH MODAL -->
        <div id="NameSearch" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <center><h3>PERSON SEARCH</h3></center>
                <form target="_blank" action="results/person.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputtedName" id="InputtedName" aria-describedby="NameHelp">
                        <small id="NameHelp" class="form-text text-muted">Please enter the name as it appears on the ID card.</small>
                    </div>
                    <button type="submit" class="btn btn-dark">SEARCH</button>
                </form>
            </div>
        </div>
        <!-- END OF NAME SEARCH MODAL -->

        <!-- PLATE SEARCH MODAL -->
        <div id="PlateSearch" class="modal">
            <div class="modal-content">
                <span class="close2">&times;</span>
                <center><h3>VEHICLE SEARCH</h3></center>
                <form target="_blank" action="results/vehicle.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputtedPlate" id="InputtedPlate" aria-describedby="PlateHelp">
                        <small id="PlateHelp" class="form-text text-muted">Please enter the plate as it appears on the vehicle.</small>
                    </div>

                    <button type="submit" class="btn btn-dark">SEARCH</button>
                </form>
            </div>
        </div>
        <!-- END OF PLATE SEARCH MODAL -->

        <!-- CREATE CALL MODAL -->
        <div id="CreateCall" class="modal">
            <div class="modal-content">
                <span class="close3">&times;</span>
                <center><h3>Create Call</h3></center>
                <button id="GenerateCallNumber" class="btn btn-dark" onclick="getElementById('CallNumber').value=Math.floor(Math.random()*100000)">Generate Call Number</button><br>
                <form action="scripts/new-call.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="CallNumber" id="CallNumber"  placeholder="Call Number">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="CallName" id="CallName"  placeholder="Call Name">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="CallLocation" id="CallLocation"  placeholder="Call Location">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="CallDescription" id="CallDescription" placeholder="Call Description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark">Create Call</button>
                    <input class="btn btn-dark" type="reset" value="Reset">
                </form>
            </div>
        </div>
        <!-- END OF CREATE CALL MODAL -->

        <!-- SHOW CALLS MODAL -->
        <div id="ShowCalls" class="modal">
            <div class="modal-content">
                <span class="close4">&times;</span>
                <div id="calls"></div>
            </div>
        </div>
        <!-- END OF SHOW CALLS MODAL -->

        <!-- SHOW OFFICERS MODAL -->
        <div id="ShowOfficers" class="modal">
            <div class="modal-content">
                <span class="close6">&times;</span>
                <div id="officers"></div>
            </div>
        </div>
        <!-- END OF SHOW CALLS MODAL -->

        <!-- SHOW 10 CODES MODAL -->
        <div id="ShowCodes" class="modal">
            <div class="modal-content">
                <span class="close5">&times;</span>
                <center><h3>Signal Codes</h3></center>
                <img src="elements/codes.jpg" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <!-- END OF SHOW 10 CODES MODAL -->

        <!-- SHOW BOLOS MODAL -->
        <div id="ShowBOLOS" class="modal">
            <div class="modal-content">
                <span class="close7">&times;</span>
                <div id="activebolos"></div>
            </div>
        </div>
        <!-- END OF SHOW BOLOS MODAL -->

        <!-- CREATE BOLO MODAL -->
        <div id="CreateBOLO" class="modal">
            <div class="modal-content">
                <span class="close8">&times;</span>
                <center><h3>Create BOLO</h3></center>
                <form action="scripts/new-bolo.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="BOLOType">BOLO Type</label>
                        <select name="BOLOType" class="form-control" id="BOLOType">
                            <option value="PERSON">PERSON</option>
                            <option value="VEHICLE">VEHICLE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="LastSeen" id="LastSeen"  placeholder="Last Seen">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="BOLODescription" id="BOLODescription" placeholder="BOLO Description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="BOLOReason" id="BOLOReason" placeholder="BOLO Reason" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark">Create BOLO</button>
                    <input class="btn btn-dark" type="reset" value="Reset">
                </form>
            </div>
        </div>
        <!-- END OF CREATE BOLO MODAL -->

        <!-- CREATE VEH CITATION MODAL -->
        <div id="CreateVehCitation" class="modal">
            <div class="modal-content">
                <span class="close9">&times;</span>
                <center><h3>Create Vehicle Citation</h3></center>
                <button id="GenerateCitationNumber" class="btn btn-dark" onclick="getElementById('citationID').value=Math.floor(Math.random()*100000)">Generate Citation ID</button>
                <form action="scripts/new-vehicle-citation.php" method="post">
                    
                    <div class="form-group">
                        <label for="OfficerID">Officer</label>
                        <select name="OfficerID" class="form-control" id="OfficerID">
                            <option value="2">1K-49</option>
                            <option value="1">1Z-114</option>
                            <option value="3">1K-94</option>
                            <option value="10">1K-66</option>
                            <option value="40">1K-39</option>
                            <option value="39">1D-52</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="citationID">Citation ID:</label>
                        <input class="form-control" type="text" name="citationID" id="citationID">
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input class="form-control" type="text" name="address" id="address">
                    </div>

                    <div class="form-group">
                        <label for="plate">License Plate:</label>
                        <input class="form-control" type="text" name="plate" id="plate">
                    </div>

                    <div class="form-group">
                        <label for="vehiclemodel">Vehicle Model:</label>
                        <input class="form-control" type="text" name="vehiclemodel" id="vehiclemodel">
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input class="form-control" type="text" name="date" id="date">
                    </div>

                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input class="form-control" type="text" name="time" id="time">
                    </div>

                    <div class="form-group">
                        <label for="reason">Reason:</label>
                        <input class="form-control" type="text" name="reason" id="reason">
                    </div>

                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input class="form-control" type="text" name="location" id="location">
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input class="form-control" type="text" name="amount" id="amount">
                    </div>

                    <div class="form-group">
                        <input type="submit" onclick="" class="btn btn-primary" value="Create Vehicle Citation">
                        <input type="reset" class="btn btn-warning" value="Reset Fields"><br><br>
                    </div>
                </p>
            </form>
            </div>
        </div>
        <!-- END OF CREATE BOLO MODAL -->

    <!-- END OF MODALS -->

    <!-- MODALS SCRIPTS -->
        <script>
            var modal = document.getElementById("NameSearch");
            var btn = document.getElementById("OpenNameSearch");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <script>
            var modal2 = document.getElementById("PlateSearch");
            var btn2 = document.getElementById("OpenPlateSearch");
            var span = document.getElementsByClassName("close2")[0];
            btn2.onclick = function() {
                modal2.style.display = "block";
            }
            span.onclick = function() {
                modal2.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }
        </script>
        <script>
            var modal3 = document.getElementById("CreateCall");
            var btn3 = document.getElementById("OpenCreateCall");
            var span = document.getElementsByClassName("close3")[0];
            btn3.onclick = function() {
                modal3.style.display = "block";
            }
            span.onclick = function() {
                modal3.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal3) {
                    modal3.style.display = "none";
                }
            }
        </script>
        <script>
            var modal4 = document.getElementById("ShowCalls");
            var btn4 = document.getElementById("OpenShowCalls");
            var span = document.getElementsByClassName("close4")[0];
            btn4.onclick = function() {
                modal4.style.display = "block";
            }
            span.onclick = function() {
                modal4.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal4) {
                    modal4.style.display = "none";
                }
            }
        </script>
        <script>
            var modal5 = document.getElementById("ShowCodes");
            var btn5 = document.getElementById("OpenShowCodes");
            var span = document.getElementsByClassName("close5")[0];
            btn5.onclick = function() {
                modal5.style.display = "block";
            }
            span.onclick = function() {
                modal5.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal5) {
                    modal5.style.display = "none";
                }
            }
        </script>
        <script>
            var modal6 = document.getElementById("ShowOfficers");
            var btn6 = document.getElementById("OpenShowOfficers");
            var span = document.getElementsByClassName("close6")[0];
            btn6.onclick = function() {
                modal6.style.display = "block";
            }
            span.onclick = function() {
                modal6.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal6) {
                    modal6.style.display = "none";
                }
            }
        </script>
        <script>
            var modal7 = document.getElementById("ShowBOLOS");
            var btn7 = document.getElementById("OpenShowBOLOS");
            var span = document.getElementsByClassName("close7")[0];
            btn7.onclick = function() {
                modal7.style.display = "block";
            }
            span.onclick = function() {
                modal7.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal7) {
                    modal7.style.display = "none";
                }
            }
        </script>
        <script>
            var modal8 = document.getElementById("CreateBOLO");
            var btn8 = document.getElementById("OpenCreateBOLO");
            var span = document.getElementsByClassName("close8")[0];
            btn8.onclick = function() {
                modal8.style.display = "block";
            }
            span.onclick = function() {
                modal8.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal8) {
                    modal8.style.display = "none";
                }
            }
        </script>
        <script>
            var modal9 = document.getElementById("CreateVehCitation");
            var btn9 = document.getElementById("OpenCreateVehCitation");
            var span = document.getElementsByClassName("close9")[0];
            btn9.onclick = function() {
                modal9.style.display = "block";
            }
            span.onclick = function() {
                modal9.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal9) {
                    modal9.style.display = "none";
                }
            }
    </script>
    <!-- END OF MODAL SCRIPTS -->

    <!-- JavaScript for handling dark mode toggle -->
    <script>
        // Dark mode toggle
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
    
    <!-- Script to handle updating status -->
    <script>
        $(document).ready(function() {
            // Add click event listener to status buttons
            $('.status-button').click(function() {
                var status = $(this).data('status');
                // Send AJAX request to change-status.php
                $.ajax({
                    type: 'GET',
                    url: 'scripts/change-status.php',
                    data: { status: status },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        // Update the current status displayed on the page
                        $('#current-status').text(response);
                        //Reload
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                        alert('Error updating status.');
                    }
                });
            });
        });
    </script>

    <!-- Script to check for status updates -->
    <script>
        // Function to check for updates
        function checkForUpdates() {
            $.ajax({
                type: 'GET',
                url: 'scripts/change-status.php', // Path to a script that retrieves the latest status from the server
                success: function(response) {
                    // Update the status on the page
                    $('#current-status').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error if needed
                }
            });
        }

        // Call the function initially when the page loads
        $(document).ready(function() {
            checkForUpdates();

            // Set up a timer to call the function every 5 seconds
            setInterval(checkForUpdates, 5000); // Adjust the interval as needed
        });
    </script>
</body>
</html>
