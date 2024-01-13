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
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];
$leavetype = $_POST["leavetype"];
$phonenumber = $_POST["phonenumber"];
$reason = $_POST["reason"];

// Insert data into the 'applyleave' table
$sql_applyleave = "INSERT INTO applyleave (bioid, title, startdate, enddate, leavetype, phonenumber, reason)
VALUES ('$bioid', '$title', '$startdate', '$enddate', '$leavetype', '$phonenumber', '$reason')";

if ($conn->query($sql_applyleave) === TRUE) {
    header("Location: udash.php");
} else {
    echo "Error submitting leave request: " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
