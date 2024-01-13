<?php
include("db.php"); // Include your database connection code

// Calculate total Casual Leave counts from approvedleave table
$sqlTotalCasualLeave = "SELECT SUM(casual_leave_count) AS total_casual_leave FROM approvedleave WHERE leavetype = 'Casual Leave'";
$resultTotalCasualLeave = $conn->query($sqlTotalCasualLeave);
$rowTotalCasualLeave = $resultTotalCasualLeave->fetch_assoc();
$totalCasualLeave = $rowTotalCasualLeave['total_casual_leave'];

// Calculate leave balance (assuming 3 Casual Leaves per month)
$monthlyCasualLeaveLimit = 3;
$leaveBalance = $monthlyCasualLeaveLimit - $totalCasualLeave;

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Balance</title>
</head>
<body>
    <h1>Leave Balance</h1>
    <p>Total Casual Leave Counts: <?php echo $totalCasualLeave; ?></p>
    <p>Leave Balance: <?php echo $leaveBalance; ?></p>
</body>
</html>
