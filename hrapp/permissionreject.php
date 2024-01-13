<?php
include("db.php"); // Include your database connection code

// Check if the bioid parameter is set in the URL
if (isset($_GET["bioid"])) {
    $bioid = $_GET["bioid"];

    // Construct and execute the SQL DELETE query
    $sql = "DELETE FROM applypermission WHERE bioid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $bioid);

    if ($stmt->execute()) {
        // Redirect back to the permissions listing page (review.php) after successful deletion
        header("Location: approvepermission.php");
        exit();
    } else {
        // Handle the case where the deletion query fails
        echo "Error deleting permission: " . $stmt->error;
    }
} else {
    // Handle the case where bioid is not provided in the URL
    echo "Bioid not provided in the URL.";
}

// Close the database connection
$conn->close();
?>
