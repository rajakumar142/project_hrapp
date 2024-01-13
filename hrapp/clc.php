<?php
include("db.php"); // Include your database connection code

// Calculate total Casual Leave counts for each bioid
$sqlTotalCasualLeave = "SELECT bioid, SUM(casual_leave_count) AS total_casual_leave FROM approvedleave WHERE leavetype = 'Casual Leave' GROUP BY bioid";
$resultTotalCasualLeave = $conn->query($sqlTotalCasualLeave);

// Store total Casual Leave counts in another table (assuming the new table is named 'total_casual_leave')
if ($resultTotalCasualLeave->num_rows > 0) {
    while($row = $resultTotalCasualLeave->fetch_assoc()) {
        $bioid = $row['bioid'];
        $totalCasualLeave = $row['total_casual_leave'];

        // Insert the bioid and total Casual Leave count into the 'total_casual_leave' table
        $sqlInsertCount = "INSERT INTO total_casual_leave (bioid, total_casual_leave_count) VALUES ('$bioid', '$totalCasualLeave')";
        if ($conn->query($sqlInsertCount) === TRUE) {
            echo "Total Casual Leave count for bioid $bioid stored successfully.";
        } else {
            echo "Error storing Total Casual Leave count: " . $conn->error;
        }
    }
} else {
    echo "No Casual Leave counts found.";
}

// Close the database connection
$conn->close();
?>
