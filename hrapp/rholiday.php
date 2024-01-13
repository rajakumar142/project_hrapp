<?php
session_start();
include("db.php");

// Check if the user is logged in (you may need to adjust this condition)
if (!isset($_SESSION["bioid"])) {
    // Redirect to the login page or handle the case where the user is not logged in
    header("Location: login.html");
    exit();
}

// Include your database connection code here (e.g., create a $conn variable)

// Define the number of records to fetch at a time
$recordsPerPage = 8;

// Get the page number from the URL parameter or set it to 1 by default
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset based on the current page and records per page
$offset = ($page - 1) * $recordsPerPage;

// Fetch holiday information from the database with the specified offset and limit
$sql = "SELECT * FROM holidays LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);

// Initialize a counter for the row number
$rowNumber = ($page - 1) * $recordsPerPage + 1;

// Calculate the total number of pages
$sqlCount = "SELECT COUNT(*) AS total FROM holidays";
$resultCount = $conn->query($sqlCount);
$totalRecords = $resultCount->fetch_assoc()["total"];
$totalPages = ceil($totalRecords / $recordsPerPage);
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
            <h2>Holidays</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <p>User</p>

            </div>

            <img src="getstart.jpg" alt=""/>
        </div>
    </div>
    <div class="tabular--wrapper">
        <h3 class="main--title">2023 Holidays information</h3>
        <div class="tabular-container">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Holiday Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rowNumber . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["Day"] . "</td>";
                        echo "<td>" . $row["HolidayName"] . "</td>";
                        echo "</tr>";
                        $rowNumber++;
                    }
                } else {
                    echo "<tr><td colspan='4'>No holiday data available</td></tr>";
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
                    echo "<a href='rholiday.php?page=$i' style='background-color: #AFD3E2; color: #FFF; padding: 5px 10px; border-radius: 5px; margin: 0 5px;'>$i</a>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
