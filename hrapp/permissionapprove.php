<?php
include("db.php"); // Include your database connection code

// Check if the bioid parameter is set in the URL
if (isset($_GET["bioid"])) {
    $bioid = $_GET["bioid"];

    // Retrieve the permission request data from the 'applypermission' table
    $sql_select = "SELECT * FROM applypermission WHERE bioid = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("s", $bioid);

    if ($stmt_select->execute()) {
        $result_select = $stmt_select->get_result();
        $permission_request = $result_select->fetch_assoc();

        // Insert the permission request data into the 'approvedpermission' table
        $sql_insert = "INSERT INTO approvedpermission (bioid, title, date, starttime, endtime, phonenumber, reason)
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssssss", $permission_request["bioid"], $permission_request["title"], $permission_request["date"], $permission_request["starttime"], $permission_request["endtime"], $permission_request["phonenumber"], $permission_request["reason"]);

        if ($stmt_insert->execute()) {
            // Delete the row from the 'applypermission' table
            $sql_delete = "DELETE FROM applypermission WHERE bioid = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("s", $bioid);

            if ($stmt_delete->execute()) {
                // Redirect back to the permission requests listing page (review.php) after successful operations
                header("Location: approvepermission.php");
                exit();
            } else {
                // Handle the case where the deletion from 'applypermission' fails
                echo "Error deleting permission request: " . $stmt_delete->error;
            }
        } else {
            // Handle the case where the insertion into 'approvedpermission' fails
            echo "Error approving permission request: " . $stmt_insert->error;
        }
    } else {
        // Handle the case where the selection from 'applypermission' fails
        echo "Error selecting permission request: " . $stmt_select->error;
    }
} else {
    // Handle the case where bioid is not provided in the URL
    echo "Bioid not provided in the URL.";
}

// Close the database connection
$conn->close();
?>
