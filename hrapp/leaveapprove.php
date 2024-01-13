<?php
include("db.php"); // Include your database connection code

// Get the sno and bioid parameters from the URL or provide default values as null
$sno = $_GET["sno"] ?? null;
$bioid = $_GET["bioid"] ?? null;

// Check if sno and bioid parameters are not null
if ($sno !== null && $bioid !== null) {
    // Retrieve the leave request data from the 'applyleave' table based on sno and bioid
    $sql_select = "SELECT * FROM applyleave WHERE sno = ? AND bioid = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("ss", $sno, $bioid);

    if ($stmt_select->execute()) {
        $result_select = $stmt_select->get_result();
        $leave_request = $result_select->fetch_assoc();

        // Check if leave request data is found
        if ($leave_request) {
            // Calculate the number of days between startdate and enddate
            $start_date = new DateTime($leave_request["startdate"]);
            $end_date = new DateTime($leave_request["enddate"]);
            $interval = $start_date->diff($end_date);
            $no_of_days = $interval->days + 1; // Including the end date

            // Insert the leave request data into the 'approvedleave' table
            $sql_insert = "INSERT INTO approvedleave (bioid, title, startdate, enddate, leavetype, phonenumber, reason, no_of_days)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sssssssi", $leave_request["bioid"], $leave_request["title"], $leave_request["startdate"], $leave_request["enddate"], $leave_request["leavetype"], $leave_request["phonenumber"], $leave_request["reason"], $no_of_days);

            // Execute the prepared statement
            $stmt_insert->execute();

            // Check for success
            if ($stmt_insert->affected_rows > 0) {
                // Leave request successfully inserted

                // Delete the row from the 'applyleave' table
                $sql_delete = "DELETE FROM applyleave WHERE sno = ?";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bind_param("s", $sno);

                // Execute the prepared statement
                if ($stmt_delete->execute()) {
                    // Select the leave count from 'approvedleave' for the specific bioid and leavetype
                    $sql_leave_count = "SELECT SUM(no_of_days) as count FROM approvedleave WHERE bioid = ? AND leavetype = ?";
                    $stmt_leave_count = $conn->prepare($sql_leave_count);
                    $stmt_leave_count->bind_param("ss", $bioid, $leave_request["leavetype"]);

                    // Execute the prepared statement
                    if ($stmt_leave_count->execute()) {
                        $result_leave_count = $stmt_leave_count->get_result();
                        $leave_count = $result_leave_count->fetch_assoc()["count"];

                        // Continue with the rest of your code...
// Assuming $leave_count is available here

// Insert the leave count into the 'total_leave_count' table
$sql_insert_total_leave_count = "INSERT INTO total_leave_count (bioid, leavetype, count) VALUES (?, ?, ?)";
$stmt_insert_total_leave_count = $conn->prepare($sql_insert_total_leave_count);
$stmt_insert_total_leave_count->bind_param("ssi", $bioid, $leave_request["leavetype"], $leave_count);

// Execute the prepared statement
if ($stmt_insert_total_leave_count->execute()) {
    // Retrieve the row with the highest count for the specified bioid and leavetype
    $sql_select_adjusted = "SELECT * FROM `total_leave_count` WHERE `bioid` = ? AND `leavetype` = ? ORDER BY `count` DESC LIMIT 1";
    $stmt_select_adjusted = $conn->prepare($sql_select_adjusted);
    $stmt_select_adjusted->bind_param("ss", $bioid, $leave_request["leavetype"]);
    $stmt_select_adjusted->execute();
    $result_adjusted = $stmt_select_adjusted->get_result();

    if ($result_adjusted->num_rows > 0) {
        $row_adjusted = $result_adjusted->fetch_assoc();

        // Adjust count based on leavetype
        switch ($row_adjusted["leavetype"]) {
            case "Casual Leave":
                $adjustedCount = 12 - $row_adjusted["count"];
                break;
            case "Sick Leave":
                $adjustedCount = 12 - $row_adjusted["count"];
                break;
            case "Comp-off":
                $adjustedCount = 5 - $row_adjusted["count"];
                break;
             case "Maternity Leave":
                $adjustedCount = 10 - $row_adjusted["count"];
                break;
            case "Vacation Leave":
                $adjustedCount = 10 - $row_adjusted["count"];
                break;
            case "Special Casual Leave":
                $adjustedCount = 6 - $row_adjusted["count"];
                break;    
            default:
                $adjustedCount = $row_adjusted["count"];
        }

        // Insert adjustedCount into another table (assuming the table name is 'adjusted_leave_count')
        $sql_insert_adjusted_count = "INSERT INTO adjusted_leave_count (bioid, leavetype, adjusted_count) VALUES (?, ?, ?)";
        $stmt_insert_adjusted_count = $conn->prepare($sql_insert_adjusted_count);
        $stmt_insert_adjusted_count->bind_param("ssi", $row_adjusted["bioid"], $row_adjusted["leavetype"], $adjustedCount);

        // Execute the prepared statement
        if ($stmt_insert_adjusted_count->execute()) {
            header("Location: approveleave.php");
            exit();
        } else {
            echo "Error storing adjusted count: " . $stmt_insert_adjusted_count->error;
        }
    } else {
        echo "No rows found for adjusted count.";

        // Handle the case where no rows are found
        // Insert a row for Adjusted Count if it doesn't exist
        $sql_insert_adjusted = "INSERT INTO total_leave_count (bioid, leavetype, count) VALUES (?, ?, ?)";
        $stmt_insert_adjusted = $conn->prepare($sql_insert_adjusted);
        $stmt_insert_adjusted->bind_param("ssi", $bioid, $leave_request["leavetype"], $adjustedCount);

        // Execute the prepared statement
        if ($stmt_insert_adjusted->execute()) {
            echo "Row for Adjusted Count created in the 'total_leave_count' table.";
        } else {
            echo "Error creating row for Adjusted Count: " . $stmt_insert_adjusted->error;
        }
    }

    // Close the prepared statement
    $stmt_select_adjusted->close();
} else {
    // Handle the case where inserting into 'total_leave_count' fails
    echo "Error inserting into total_leave_count: " . $stmt_insert_total_leave_count->error;
}

// Close the prepared statement
$stmt_insert_total_leave_count->close();
$stmt_leave_count->close();
} else {
    // Handle the case where selecting leave count fails
    echo "Error selecting leave count: " . $stmt_leave_count->error;
}
} else {
// Handle the case where the deletion from 'applyleave' fails
echo "Error deleting leave request: " . $stmt_delete->error;
}
} else {
// Handle the case where the insertion into 'approvedleave' fails
echo "Error approving leave request: " . $stmt_insert->error;
}
} else {
// Handle the case where leave request data is not found
echo "Leave request data not found.";
}
} else {
// Handle the case where the selection from 'applyleave' fails
echo "Error selecting leave request: " . $stmt_select->error;
}
} else {
// Handle the case where sno or bioid is not provided in the URL or is null
echo "Invalid sno or bioid parameters.";
}

// Close the database connection
$conn->close();
?>