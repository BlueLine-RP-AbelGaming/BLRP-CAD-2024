<?php
require_once("../dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM calls WHERE call_number='" . $_GET["call"] . "'");
?>

<html lang="en">
<head>
    <script data-ad-client="ca-pub-7177891057187396" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="UTF-8">
    <title>BLRP MDT | Edit Call</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/af48d48999.js" crossorigin="anonymous"></script>
    <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>
    <center><h3>Edit Call</h3></center>
    <form action="scripts/update-call.php" method="post" enctype="multipart/form-data">
    <p>
    <div class="form-group">
        <label for="call_number">Call Number (<font color="red">DO NOT CHANGE</font>):</label>
        <input type="text" name="call_number" id="call_number" value="<?php echo $result[0]["call_number"]; ?>">

        <label for="call_name">Call Name:</label>
        <input type="text" name="call_name" id="call_name" value="<?php echo $result[0]["call_name"]; ?>">

        <label for="call_location">Call Location:</label>
        <input type="text" name="call_location" id="call_location" value="<?php echo $result[0]["call_location"]; ?>">

        <label for="call_description">Call Description:</label>
        <input type="text" name="call_description" id="call_description" value="<?php echo $result[0]["call_description"]; ?>">

        <input type="submit" class="btn btn-primary" value="Save Changes">
    </div>
    </p>
    </form>
</body>
</html>