<?php
session_start();
include("db.php");

// Check if the user is logged in and has a valid bioid in the session
if (!isset($_SESSION["bioid"])) {
    // Redirect to the login page or handle the case where the user is not logged in
    header("Location: login.html");
    exit();
}

// Include your database connection code here (e.g., create a $conn variable)
$recordsPerPage = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $recordsPerPage;

// Get the bioid from the session
$bioid = $_SESSION["bioid"];

// Fetch all the dates with status 'absent' from the "attendance" table
$sql = "SELECT date FROM attendance WHERE bioid = '$bioid' AND status = 'absent'LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);

$rowNumber = ($page - 1) * $recordsPerPage + 1;
$sqlCount = "SELECT COUNT(*) AS total FROM attendance WHERE status = 'absent' ";
$resultCount = $conn->query($sqlCount);
$totalRecords = $resultCount->fetch_assoc()["total"];
$totalPages = ceil($totalRecords / $recordsPerPage);
// Create an array to store the absent dates
$absentDates = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $absentDates[] = $row["date"];
    }
}

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
            <h2>Leave History</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <p>User</p>
            </div>

            <img src="getstart.jpg" alt=""/>
        </div>
    </div>
    <div class="tabular--wrapper">
        <h3 class="main--title">Absent Dates</h3>
        <div class="tabular-container">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 1;
                foreach ($absentDates as $absentDate) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . $absentDate . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <?php
            // Display pagination links
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo "<span class='current-page' style='background-color: #007BFF; color: #FFF; padding: 5px 10px; border-radius: 5px; margin: 0 5px;'>$i</span>";
                } else {
                    echo "<a href='uleavehistory.php?page=$i' style='background-color: #AFD3E2; color: #FFF; padding: 5px 10px; border-radius: 5px; margin: 0 5px;'>$i</a>";
                }
            }
            ?>
    </div>
</div>
</body>
</html>
