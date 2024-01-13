<?php
include("db.php"); // Include your database connection code

// Retrieve the row with the highest count for bioid "192011094" and leavetype "Annual"
$sql_select = "SELECT * FROM `total_leave_count` WHERE `bioid` = '192011094' AND `leavetype` = 'Annual' ORDER BY `count` DESC LIMIT 1";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Subtract count from 12 if leavetype is Annual
    if ($row["leavetype"] == "Annual") {
        $adjustedCount = 12 - $row["count"];
        echo "Adjusted Count: " . $adjustedCount;
    } else {
        echo "Count: " . $row["count"];
    }
} else {
    echo "No rows found.";
}

// Close the database connection
$conn->close();
?>
