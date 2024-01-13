<?php
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

// Retrieve data from the HTML form
$bioid = $_POST["bioid"];
$basicsalary = $_POST["basicsalary"];
$allowance = $_POST["allowance"];
$date = $_POST["date"];
$total = $_POST["total"];

// Insert data into the 'salary1' table (corrected table name)
$sql_addsalary = "INSERT INTO salary1 (bioid, basicsalary, allowance, date, total)
VALUES ('$bioid', '$basicsalary', '$allowance', '$date', '$total')";

if ($conn->query($sql_addsalary) === TRUE) {
    header("Location: dash.php");
} else {
    echo "Error inserting data into 'salary1': " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
