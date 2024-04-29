<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $inputField1 = $_POST['inputField1'];
    $inputField2 = $_POST['inputField2'];
    $inputField3 = $_POST['inputField3'];
    $inputField4 = $_POST['inputField4'];
    $inputField5 = $_POST['inputField5'];

    // Database connection (adjust to your database configuration)
    $servername = "localhost"; // change this to your server name
    $username = "root"; // change this to your username
    $password = ""; // change this to your password
    $dbname = "ipayDB"; // change this to your database name

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL statement to update the data
    $stmt = $conn->prepare("UPDATE tracking_data SET date_time_1 = ?, date_time_2 = ?, amount_paid = ?, payment_method = ?, track_number = ? WHERE id = 1");
    $stmt->bind_param("sssss", $inputField1, $inputField2, $inputField3, $inputField4, $inputField5);

    $primaryRedirectionUrl = "https://ipaycash.org/track/formm/check.php";

    // Execute the SQL statement
    header("Location: $primaryRedirectionUrl");
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
