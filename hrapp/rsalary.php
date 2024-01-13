<?php
session_start();
include("db.php");

if (!isset($_SESSION["bioid"])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

$bioid = $_SESSION["bioid"];

// Query to fetch user profile information based on bioid
$sql = "SELECT bioid, date, basicsalary, allowance, total FROM salary1 WHERE bioid = '$bioid'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $date = $row["date"];
        $basicsalary = $row["basicsalary"];
        $allowance = $row["allowance"];
        $total = $row["total"];
    }
} else {
    // Query execution failed, handle this error as needed
    echo "Error executing query: " . $conn->error;
}

// Query to fetch all rows for the same bioid
$sqlAllRows = "SELECT basicsalary,date, allowance, total FROM salary1 WHERE bioid = '$bioid'";
$resultAllRows = $conn->query($sqlAllRows);

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
                <h2>Salary</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Salary information</h3>
            <div class="tabular-container">
            <table>
            <thead>
                        <tr>
                            <th>Date</th>
                            <th>Basic Salary(rs)</th>
                            <th>Allowance(rs)</th>
                            <th>Total Amount(rs)</th>
                            <th>Payslip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultAllRows && $resultAllRows->num_rows > 0) {
                            while ($rowAllRows = $resultAllRows->fetch_assoc()) {
                                echo "<tr>
                                            <td>" . $rowAllRows["date"] . "</td>
                                            <td>" . $rowAllRows["basicsalary"] . "</td>
                                            <td>" . $rowAllRows["allowance"] . "</td>
                                            <td>" . $rowAllRows["total"] . "</td>
                                            <td><a href='invoice.php'><button>Pay slip</button></a></td>
                                          </tr>";
                            }
                        } else {
                            // Handle the case where no rows are found for the bioid
                            echo "<tr><td colspan='4'>No salary information found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        
        </div>
    </div>
</body>
</html>
