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
                <h2>Apply Leave</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
        <form action="applyleave1.php" method="POST">
            <h1 class="main--title">Apply Leave</h1><br>
            <div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px; margin-bottom: 20px;">
            
   <br> <input type="text" required name="title" placeholder="title" 
    style="width: 45%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-left: 25%;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; 
        background-color: aliceblue;"><br>
   
    
    <label for="startdate"  style="font-weight: bold;
    color: #333;
    margin-left: 25%;
    margin-right: 10px;">startdate</label>
    
    <input type="date" id="startdate" name="startdate" 
    style=" padding: 5px;
    border: 1px solid #ccc; 
    border-radius: 5px; 
    width: 165px;
    transition: border-color 0.3s ease-in-out;
    border-color: #007bff; 
    background-color: aliceblue;">

<span style="padding-left: 100px;">
<label for="enddate"  style="font-weight: bold;
color: #333;
margin-right: 10px;">enddate</label>

<input type="date" id="enddate" name="enddate" 
style=" padding: 5px;
border: 1px solid #ccc; 
border-radius: 5px; 
width: 165px;
transition: border-color 0.3s ease-in-out;
border-color: #007bff; 
background-color: aliceblue;"><br><br>

<label for="leavetype" 
    style="font-weight: bold;
    color: #333; 
    margin-left: 25%;
    margin-right: 10px;">Leave type:</label>
           
           <select id="leavetype" name="leavetype" 
            style="width: 37.3%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                margin-bottom: 10px;
                transition: border-color 0.3s ease-in-out;
                border-color: #007bff; 
                background-color: aliceblue;" required>
                <option value="select">-----Select Leave type-----</option>
                <option value="Sick Leave">Sick Leave (<?php echo $adjustedCount_sick_leave; ?>) </option>
                <option value="Comp-off">Comp-off (<?php echo $adjustedCount_comp_off; ?>)</option>
                <option value="Casual Leave">Casual Leave (<?php echo $adjustedCount_casual_leave; ?>)</option>
                <option value="Maternity Leave">Maternity Leave (<?php echo $adjustedCount_maternity_leave; ?>)</option>
                <option value="Vacation Leave">Vacation Leave (<?php echo $adjustedCount_vacation_leave; ?>)</option>
                <option value="Special Casual Leave">Special Casual Leave (<?php echo $adjustedCount_Special_Casual_leave; ?>)</option>
            </select><br>
            <script src= "phonenumber.js"></script>
            <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phonenumber" 
            style="width: 45%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-left: 25%;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
            transition: border-color 0.3s ease-in-out;
            border-color: #007bff; 
            background-color: aliceblue;" required><br>
 
 

 <textarea id="reason" name="reason" rows="4" cols="50" placeholder="Reason" 
 style="width: 45%;
 padding: 10px;
 margin-left: 25%;
 border: 1px solid #ccc;
 border-radius: 5px;
 font-size: 16px;
 margin-bottom: 10px;
 transition: border-color 0.3s ease-in-out;
 border-color: #007bff;
 background-color: aliceblue;" required></textarea> <br>   




    <input type="submit" value="Request" 
    style="background-color: #007bff; 
    color: #fff; 
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    margin-left: 45%;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;">

</div>
        </form>

        </div>
    </div>
</body>
</html>
