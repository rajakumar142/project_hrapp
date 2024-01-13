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

$adjustedCount_comp_off = $result_comp_off->num_rows > 0 ? $result_comp_off->fetch_assoc()["adjusted_count"] : 5;

// Repeat the same structure for other leave types, removing the echo statements

// Query to fetch user profile information for 'Sick Leave' leave type
$sql_sick_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Sick Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_sick_leave = $conn->query($sql_sick_leave);

$adjustedCount_sick_leave = $result_sick_leave->num_rows > 0 ? $result_sick_leave->fetch_assoc()["adjusted_count"] : 12;

// Query to fetch user profile information for 'Casual Leave' leave type
$sql_casual_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Casual Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_casual_leave = $conn->query($sql_casual_leave);

$adjustedCount_casual_leave = $result_casual_leave->num_rows > 0 ? $result_casual_leave->fetch_assoc()["adjusted_count"] : 12;

// Query to fetch user profile information for 'Maternity Leave' leave type
$sql_maternity_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Maternity Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_maternity_leave = $conn->query($sql_maternity_leave);

$adjustedCount_maternity_leave = $result_maternity_leave->num_rows > 0 ? $result_maternity_leave->fetch_assoc()["adjusted_count"] : 10;

// Query to fetch user profile information for 'Vacation Leave' leave type
$sql_vacation_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Vacation Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_vacation_leave = $conn->query($sql_vacation_leave);

$adjustedCount_vacation_leave = $result_vacation_leave->num_rows > 0 ? $result_vacation_leave->fetch_assoc()["adjusted_count"] : 10;

// Query to fetch user profile information for 'Special Casual Leave' leave type
$sql_special_casual_leave = "SELECT * FROM `adjusted_leave_count` WHERE `leavetype` = 'Special Casual Leave' AND `bioid` = '$bioid' ORDER BY `adjusted_count` ASC LIMIT 1";
$result_special_casual_leave = $conn->query($sql_special_casual_leave);

$adjustedCount_Special_Casual_leave = $result_special_casual_leave->num_rows > 0 ? $result_special_casual_leave->fetch_assoc()["adjusted_count"] : 6;

// Calculate the total
$total_count = $adjustedCount_comp_off + $adjustedCount_sick_leave + $adjustedCount_casual_leave + $adjustedCount_maternity_leave + $adjustedCount_vacation_leave + $adjustedCount_Special_Casual_leave;

// Close the database connection
$conn->close();
?>

<html>
<head>
    <title>HR APPLICATION</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="website icon" type="jpg" href="C:\Users\Raja kumar\Pictures\getstart.jpg">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>   
    <link rel="stylesheet" href="style.css"/> 

    <style>
    canvas {
        width: 100% !important;
        height: 300px !important;
        object-fit: contain;
    }
    </style>    
</head>
<body>

<?php include('includes/sidebar1.php'); ?>

<div class="main--contant">
    <div class="header--wrapper">
        <div class="header--title">
            <span>Primary</span>
            <h2>Leavebalance</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <p>User</p>
            </div>
            <img src="getstart.jpg" alt=""/>
        </div>
    </div>
    <div class="card--container">
        <h3 class="main--title">Profile</h3>
        <main>
            <section class="profile" style="text-align: center;">
                <table>
                    <thead>
                        <tr>
                            <th>Leavetype</th>
                            <th>Leavebalance</th>
                            <th>Total leave</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sick Leave</td>
                            <td><?php echo $adjustedCount_sick_leave; ?></td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>Comp-off</td>
                            <td><?php echo $adjustedCount_comp_off; ?></td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Casual Leave</td>
                            <td><?php echo $adjustedCount_casual_leave; ?></td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>Maternity Leave</td>
                            <td><?php echo $adjustedCount_maternity_leave; ?></td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Vacation Leave</td>
                            <td><?php echo $adjustedCount_vacation_leave; ?></td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Special Casual Leave</td>
                            <td><?php echo $adjustedCount_Special_Casual_leave; ?></td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?php echo $total_count; ?></td>
                            <td><!-- Leave balance for total, if applicable --></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>
</body>
</html>
