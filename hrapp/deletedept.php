<?php
session_start();
include("db.php");

if (!isset($_GET["sno"])) {
    // Handle the case where 'sno' (department serial number) is not provided.
    // You might want to redirect the user to an error page.
    header("Location: error.php");
    exit();
}

$sno = $_GET["sno"];

// Delete the department from the 'department' table
$sql = "DELETE FROM department WHERE sno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $sno);

if ($stmt->execute()) {
    // Redirect back to the department management page after successful deletion
    header("Location: managedept.php");
    exit();
} else {
    // Handle the case where the delete query fails
    echo "Error deleting department: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
