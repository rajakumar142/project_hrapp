<?php
session_start();
include("db.php");

// Check if the user is logged in (you may need to adjust this condition)
if (!isset($_SESSION["bioid"])) {
    // Redirect to the login page or handle the case where the user is not logged in
    header("Location: login.html");
    exit();
}

// Execute SQL query to count rows in the 'addprofile' table
$sqlProfileCount = "SELECT COUNT(*) AS profile_count FROM addprofile";
$resultProfileCount = $conn->query($sqlProfileCount);

if ($resultProfileCount) {
    $rowProfileCount = $resultProfileCount->fetch_assoc();
    $profileCount = $rowProfileCount["profile_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing profile count query: " . $conn->error;
}

// Execute SQL query to count rows in the 'department' table
$sqlDepartmentCount = "SELECT COUNT(*) AS department_count FROM department";
$resultDepartmentCount = $conn->query($sqlDepartmentCount);

if ($resultDepartmentCount) {
    $rowDepartmentCount = $resultDepartmentCount->fetch_assoc();
    $departmentCount = $rowDepartmentCount["department_count"];
} else {
    // Handle the case where the query fails
    echo "Error executing department count query: " . $conn->error;
}

// Execute SQL query to calculate the sum of the 'total' column in the 'salary' table
$sqlTotalSalary = "SELECT SUM(total) AS total_salary FROM salary";
$resultTotalSalary = $conn->query($sqlTotalSalary);

if ($resultTotalSalary) {
    $rowTotalSalary = $resultTotalSalary->fetch_assoc();
    $totalSalary = $rowTotalSalary["total_salary"];
} else {
    // Handle the case where the query fails
    echo "Error executing total salary query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<html>
<head>
    <title>HR APPLICATION</title>
    <link rel="website icon" type="jpg" href="C:\Users\Raja kumar\Pictures\getstart.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
<?php include('includes/sidebar.php'); ?>

<div class="main--contant">
    <div class="header--wrapper">
        <div class="header--title">
            <span>Primary</span>
            <h2>Dashboad</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <p>Admin</p>
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
                        <span class="title">Profiles</span>
                        <span class="total"><?php echo $profileCount; ?></span>  <!-- count value -->
                    </div>
                    <i></i>
                </div>
                <a href="viewprofile.php" style="text-decoration: none;">
                    <span class="view">View Details</span>
                </a>
            </div>
            <div class="card--a light-red">
                <div class="card--header">
                    <div class="card--t">
                        <span class="title">Department</span>
                        <span class="total dark-red"><?php echo $departmentCount; ?></span>  <!-- count value -->
                    </div>
                    <i></i>
                </div>
                <a href="managedept.php" style="text-decoration: none;">
                    <span class="view dark-red">View Details</span>
                </a>
            </div>
           
        </div>
    </div>
</div>
</body>
</html>
