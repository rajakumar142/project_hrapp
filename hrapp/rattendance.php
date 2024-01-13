<?php
session_start();

if (!isset($_SESSION["bioid"])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

$bioid = $_SESSION["bioid"];

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
</head>
<body>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 4px;
        }
        th {
            border: 1px;
            text-align: center;
            padding: 4px;
        }
      

        td,th {
            height: 70px;
        }
        th{
            background-color: #3488fe;
        }

        .today {
            background-color: #007bff;
            color: #fff;
        }

        .status-absent {

            /* background-color: #FF5733; Red for absent */
            color: #FF5733;
            /* text-shadow: 0 0 3px #FF5733, 0 0 5px #FF5733; */
        }

        .status-present {
            /* background-color: #4CAF50; Green for present */
            color: #4CAF50;
            /* text-shadow: 0 0 3px #4CAF50, 0 0 5px #4CAF50; */
        }

        .status-late {
            /* background-color: yellow; Yellow for late */
            color: #FFA500;
            /* text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF; */
        }
    </style>
<?php include('includes/sidebar2.php'); ?>


    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>View Attendance</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">View Attendance</h3>
            <span  style="color: #4CAF50;">Present</span></span>&nbsp&nbsp<span>/&nbsp&nbsp</span>
            <span  style="color:  #FFA500;">Late</span>&nbsp&nbsp<span>/&nbsp&nbsp</span>
            <span  style="color: #FF5733;">Absent</span>
            <div class="tabular-container">
                <table>
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    // Include your database connection code here
    include("db.php");

    // Get the current date
    $currentDate = date("j");
    // Get the total number of days in the month
    $totalDays = date("t");

    echo "<h1>" . date("F Y") . "</h1><br>";

    echo "<table>";
   

    for ($day = 1; $day <= $totalDays; $day++) {
        if ($day == 1) {
            echo "<tr>";
            // Fill in empty cells for the days before the first day of the month
            for ($i = 0; $i < date("w", strtotime(date("Y-m-01"))); $i++) {
                echo "<td></td>";
            }
        }

        // Fetch the status from your database based on the current date
        $date = date("Y-m-d", strtotime(date("Y-m-$day")));
        //$bioid = 123; // Replace with the actual bioid
        $sql = "SELECT status FROM attendance WHERE date = '$date' AND bioid = '$bioid'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $status = $row['status'];
            
            switch ($status) {
                case "absent":
                    $class = "status-absent";
                    break;
                case "present":
                    $class = "status-present";
                    break;
                case "late":
                    $class = "status-late";
                    break;
                default:
                    $class = "";
            }
        } else {
            $class = "";
        }

        $class .= ($day == $currentDate) ? " today" : "";

        echo "<td class='$class'>$day</td>";

        if (date("w", strtotime(date("Y-m-$day"))) == 6) {
            echo "</tr>";
        }
    }

    echo "</table>";
    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>