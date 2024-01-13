<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "hrapp";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bioid = $_SESSION["bioid"];

// Retrieve data from the HTML form
$title = $_POST["title"];
$date = $_POST["date"];
$starttime = $_POST["starttime"];
$endtime = $_POST["endtime"];
$phonenumber = $_POST["phonenumber"];
$reason = $_POST["reason"];

// Insert data into the 'applypermission' table
$sql_applypermission = "INSERT INTO applypermission (bioid, title, date, starttime, endtime, phonenumber, reason)
VALUES ('$bioid', '$title', '$date', '$starttime', '$endtime', '$phonenumber', '$reason')";

if ($conn->query($sql_applypermission) === TRUE) {
    header("Location: rdash.php");
} else {
    echo "Error submitting permission request: " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
