<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["bioid"])) {
    $bioid = $_GET["bioid"];

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM addprofile WHERE bioid = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Handle the case where the prepared statement fails
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $bioid);

    if ($stmt->execute()) {
        // Record deleted successfully
        echo "Record with bioid = $bioid deleted successfully.";
    } else {
        // Handle the case where the delete query fails
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Redirect to an error page or handle the case where 'bioid' is not provided
    header("Location: error.php");
    exit();
}

// Close the database connection
$conn->close();
?>
