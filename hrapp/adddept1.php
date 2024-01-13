<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection (replace with your database credentials)
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

    // Get department name from the form
    $department = $_POST["department"];

    // Prepare and execute an SQL statement to insert the department into the database
    $sql = "INSERT INTO department (department) VALUES ('$department')";

    if ($conn->query($sql) === TRUE) {
        header("Location: managedept.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
