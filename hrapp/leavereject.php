<?php
include("db.php"); // Include your database connection code

// Check if the sno parameter is set in the URL
if (isset($_GET["sno"])) {
    $sno = $_GET["sno"];

    // Retrieve the leave request data from the 'applyleave' table
    $sql_select = "SELECT * FROM applyleave WHERE sno = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("s", $sno);

    if ($stmt_select->execute()) {
        $result_select = $stmt_select->get_result();
        $leave_request = $result_select->fetch_assoc();

        // Insert the leave request data into the 'rejectedleave' table
        $sql_insert = "INSERT INTO rejectedleave (sno, bioid, title, startdate, enddate, leavetype, phonenumber, reason)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssss", $leave_request["sno"], $leave_request["bioid"], $leave_request["title"], $leave_request["startdate"], $leave_request["enddate"], $leave_request["leavetype"], $leave_request["phonenumber"], $leave_request["reason"]);

        if ($stmt_insert->execute()) {
            // Delete the row from the 'applyleave' table
            $sql_delete = "DELETE FROM applyleave WHERE sno = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("s", $sno);

            if ($stmt_delete->execute()) {
                // Redirect back to the leave requests listing page (review.php) after successful operations
                header("Location: approveleave.php");
                exit();
            } else {
                // Handle the case where the deletion from 'applyleave' fails
                echo "Error deleting leave request: " . $stmt_delete->error;
            }
        } else {
            // Handle the case where the insertion into 'rejectedleave' fails
            echo "Error rejecting leave request: " . $stmt_insert->error;
        }
    } else {
        // Handle the case where the selection from 'applyleave' fails
        echo "Error selecting leave request: " . $stmt_select->error;
    }
} else {
    // Handle the case where sno is not provided in the URL
    echo "Sno not provided in the URL.";
}

// Close the database connection
$conn->close();
?>
