<?php
session_start();
include("db.php");

if (!isset($_SESSION["bioid"])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

$bioid = $_SESSION["bioid"];

// Query to fetch user profile information for 'Comp-off' leave type
$sql_comp_off = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Comp-off' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_comp_off = $conn->query($sql_comp_off);

$adjustedCount_comp_off = $result_comp_off->num_rows > 0 ? $result_comp_off->fetch_assoc()["adjusted_count"] : 10;

// Repeat the same structure for other leave types, removing the echo statements

// Query to fetch user profile information for 'Sick Leave' leave type
$sql_sick_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Sick Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_sick_leave = $conn->query($sql_sick_leave);

$adjustedCount_sick_leave = $result_sick_leave->num_rows > 0 ? $result_sick_leave->fetch_assoc()["adjusted_count"] : 36;

// Query to fetch user profile information for 'Casual Leave' leave type
$sql_casual_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Casual Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_casual_leave = $conn->query($sql_casual_leave);

$adjustedCount_casual_leave = $result_casual_leave->num_rows > 0 ? $result_casual_leave->fetch_assoc()["adjusted_count"] : 24;

// Query to fetch user profile information for 'Maternity Leave' leave type
$sql_maternity_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Maternity Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_maternity_leave = $conn->query($sql_maternity_leave);

$adjustedCount_maternity_leave = $result_maternity_leave->num_rows > 0 ? $result_maternity_leave->fetch_assoc()["adjusted_count"] : 60;

// Query to fetch user profile information for 'Vacation Leave' leave type
$sql_vacation_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Vacation Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_vacation_leave = $conn->query($sql_vacation_leave);

$adjustedCount_vacation_leave = $result_vacation_leave->num_rows > 0 ? $result_vacation_leave->fetch_assoc()["adjusted_count"] : 30;

// Query to fetch user profile information for 'Special Casual Leave' leave type
$sql_special_casual_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Special Casual Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_special_casual_leave = $conn->query($sql_special_casual_leave);

$adjustedCount_Special_Casual_leave = $result_special_casual_leave->num_rows > 0 ? $result_special_casual_leave->fetch_assoc()["adjusted_count"] : 12;

// Calculate the total
$total_count = $adjustedCount_comp_off + $adjustedCount_sick_leave + $adjustedCount_casual_leave + $adjustedCount_maternity_leave + $adjustedCount_vacation_leave + $adjustedCount_Special_Casual_leave;

// Close the database connection
$conn->close();
?>