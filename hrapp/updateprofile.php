<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bioid = $_POST["bioid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $jobType = $_POST["jobType"];
    $designation = $_POST["designation"];
    $department = $_POST["department"];
    $experience = $_POST["experience"];

    // Update the user profile in the database
    $sql = "UPDATE addprofile SET 
            name = '$name', 
            email = '$email', 
            phonenumber = '$phoneNumber', 
            jobtype = '$jobType', 
            designation = '$designation', 
            department = '$department', 
            experience = '$experience'
            WHERE bioid = '$bioid'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the view profile page after a successful update
        header("Location: viewprofile.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
