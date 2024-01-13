<?php
session_start();
include("db.php");

// Check if the user is logged in (you may need to adjust this condition)
if (!isset($_SESSION["bioid"])) {
    // Redirect to the login page or handle the case where the user is not logged in
    header("Location: login.html");
    exit();
}

$bioid = $_SESSION["bioid"];

$sqlPresentCount = "SELECT COUNT(*) AS present_count FROM attendance WHERE bioid = '$bioid' AND status = 'present'";
$resultPresentCount = $conn->query($sqlPresentCount);

$presentCount = 0; // Default count value

if ($resultPresentCount) {
    $rowPresentCount = $resultPresentCount->fetch_assoc();
    $presentCount = $rowPresentCount["present_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing present count query: " . $conn->error;
}

$sqlAbsentCount = "SELECT COUNT(*) AS absent_count FROM attendance WHERE bioid = '$bioid' AND status = 'absent'";
$resultAbsentCount = $conn->query($sqlAbsentCount);

$absentCount = 0; // Default count value

if ($resultAbsentCount) {
    $rowAbsentCount = $resultAbsentCount->fetch_assoc();
    $absentCount = $rowAbsentCount["absent_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing absent count query: " . $conn->error;
}

$sqlLateCount = "SELECT COUNT(*) AS late_count FROM attendance WHERE bioid = '$bioid' AND status = 'late'";
$resultLateCount = $conn->query($sqlLateCount);

$lateCount = 0; // Default count value

if ($resultLateCount) {
    $rowLateCount = $resultLateCount->fetch_assoc();
    $lateCount = $rowLateCount["late_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing late count query: " . $conn->error;
}

$sqlPresenthrsCount = "SELECT SUM(workhrs) AS present_hrs_count FROM attendance WHERE bioid = '$bioid' AND status = 'present'";
$resultPresenthrsCount = $conn->query($sqlPresenthrsCount);

$presenthrsCount = 0; // Default count value

if ($resultPresenthrsCount) {
    $rowPresenthrsCount = $resultPresenthrsCount->fetch_assoc();
    $presenthrsCount = $rowPresenthrsCount["present_hrs_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing present count query: " . $conn->error;
}


$sqllatehrsCount = "SELECT SUM(workhrs) AS late_hrs_count FROM attendance WHERE bioid = '$bioid' AND status = 'late'";
$resultlatehrsCount = $conn->query($sqllatehrsCount);

$latehrsCount = 0; // Default count value

if ($resultlatehrsCount) {
    $rowlatehrsCount = $resultlatehrsCount->fetch_assoc();
    $latehrsCount = $rowlatehrsCount["late_hrs_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing present count query: " . $conn->error;
}


$sqlabsenthrsCount = "SELECT SUM(workhrs) AS absent_hrs_count FROM attendance WHERE bioid = '$bioid' AND status = 'absent'";
$resultabsenthrsCount = $conn->query($sqlabsenthrsCount);

$absenthrsCount = 0; // Default count value

if ($resultabsenthrsCount) {
    $rowabsenthrsCount = $resultabsenthrsCount->fetch_assoc();
    $absenthrsCount = $rowabsenthrsCount["absent_hrs_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing present count query: " . $conn->error;
}

$sqlnilhrsCount = "SELECT SUM(workhrs) AS nil_hrs_count FROM attendance WHERE bioid = '$bioid' AND status = 'nil'";
$resultnilhrsCount = $conn->query($sqlnilhrsCount);

$nilhrsCount = 0; // Default count value

if ($resultnilhrsCount) {
    $rownilhrsCount = $resultnilhrsCount->fetch_assoc();
    $nilhrsCount = $rownilhrsCount["nil_hrs_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing present count query: " . $conn->error;
}

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

<?php include('includes/sidebar2.php'); ?>
<div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Dashboad</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                   <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
            <h3 class="main--title">Control panel</h3>
            <div class="card--wrapper">
                <div class="card--a">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Present</span>
                            <span class="total"><?php echo $presentCount; ?></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="attendance.php" style="text-decoration: none;">
                    <span class="view">View More</span>
                    </a>
                </div>
                <div class="card--a light-red">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Absent</span>
                            <span class="total dark-red"><?php echo $absentCount; ?></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="attendance.php" style="text-decoration: none;">
                    <span class="view dark-red">View More</span>
                    </a>
                </div>
                <div class="card--a light-yellow">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Late</span>
                            <span class="total dark-yellow"><?php echo $lateCount; ?></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="attendance.php" style="text-decoration: none;">
                    <span class="view dark-yellow">View More</span>
                    </a>
                </div>
                <div class="card--a light-green">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Leavebalance</span>
                            <span class="total dark-green"><?php echo $total_count; ?></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="leavebalance.php" style="text-decoration: none;">
                    <span class="view dark-green">View More</span>
                    </a>
                </div>
                <span  style="color: #19A7CE;">Attendance Count</span><br>
                <span  style="color: #4CAF50;"><br>Present</span></span>&nbsp<span><br>/&nbsp</span>
            <span  style="color:  #f1c40f;"><br>Late</span>&nbsp<span><br>/&nbsp</span>
            <span  style="color: #FF5733;"><br>Absent</span>
                <canvas id="myDoughnutChart"></canvas>
                <span style="color: #19A7CE;">Time Count</span>
                <span  style="color: #2ecc71;"><br>Present hrs</span></span>&nbsp<span><br>/&nbsp</span>
            <span  style="color:  #f1c40f;"><br>Late hrs</span>&nbsp<span><br>/&nbsp</span>
            <span  style="color:  #FF5733;"><br>Absent hrs</span>&nbsp<span><br>/&nbsp</span>
            <span  style="color: #ff00ff;"><br>Balance hrs</span>
                <canvas id="myDoughnutChart2"></canvas>

            </div>
            
        </div>
    </div>
   
    <script>
	var data = {
		// labels: ["absent", "late", "present"],
		datasets: [{
			data: [<?php echo $absentCount; ?>, <?php echo $lateCount; ?>, <?php echo $presentCount; ?>],
			backgroundColor: ["#FF5733",  "#f1c40f", "#2ecc71"],
		}],
	};

	var ctx = document.getElementById('myDoughnutChart').getContext('2d');
	var myDoughnutChart = new Chart(ctx, {
		type: 'doughnut',
		data: data,
		options: {
			responsive: true,
			maintainAspectRatio: false,
            labels: {
                fontSize: 18, // Adjust the font size for the legend labels
            },
		},
	});
    var data2 = {
        // labels: ["present_hrs", "late_hrs", "absent_hrs", "reminding_hrs"],
        datasets: [{
            data: [
                <?php echo $presenthrsCount; ?>,
                <?php echo $latehrsCount; ?>,
                <?php echo $absenthrsCount; ?>,
                <?php echo $nilhrsCount; ?>,
            ],
            backgroundColor: ["#2ecc71", "#f1c40f", "#FF5733", "#ff00ff"],
        }],
    };

    var ctx2 = document.getElementById('myDoughnutChart2').getContext('2d');
    var myDoughnutChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: data2,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            labels: {
                fontSize: 18, // Adjust the font size for the legend labels
            },
        },
    });
</script>
</body>
</html>
