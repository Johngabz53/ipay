


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
    <?php

$config = require 'config.php'; 

$servername = $config['servername'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];
 // Create a new connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check for connection errors
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 // Retrieve the tracking data
 $sql = "SELECT date_time_1, date_time_2, amount_paid, payment_method, track_number FROM tracking_data WHERE id = 1";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
 }
    ?>
</head>
<body>
    <h2>Edit Data</h2>
    <form action="server/server.php" method="post">
        <input type = "hidden" value="">
        <label for="inputField1">Date and time 1:</label><br>
        <input type="text" id="inputField1" name="inputField1" value="<?php echo $row["date_time_1"]; ?>"><br><br>
        <label for="inputField2">Date and time 2:</label><br>
        <input type="text" id="inputField2" name="inputField2" value="<?php echo $row["date_time_2"]; ?>"><br><br>
        <label for="inputField3">Amount paid:</label><br>
        <input type="text" id="inputField3" name="inputField3" value="<?php echo $row["amount_paid"]; ?>"><br><br>
        <label for="inputField4">Payment method used:</label><br>
        <input type="text" id="inputField4" name="inputField4" value="<?php echo $row["payment_method"]; ?>"><br><br>
        <label for="inputField5">Track number:</label><br>
        <input type="text" id="inputField5" name="inputField5" value="<?php echo $row["track_number"]; ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
