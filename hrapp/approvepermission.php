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
                <h2>Approve Permission</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                  <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Approve Permission</h3>
            <div class="tabular-container">
            <table>
                    <thead>
                        <tr>
                            <th>bioid</th>
                            <th>Title</th>
                            <th>date</th>
                            <th>starttime</th>
                            <th>endtime</th>
                            <th>phoneNumber</th>
                            <th>reason</th>
                            <th>reject</th>
                            <th>approve</th>
                        </tr>
                        <tbody>
                        <?php
                            include("db.php");
                            $sql = "SELECT sno, bioid, title, date, starttime, endtime, phonenumber, reason FROM applypermission";
                            $result = $conn->query($sql);

                            if ($result === false) {
                                echo "Error executing SQL query: " . $conn->error;
                            } else {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row["bioid"] . "</td>
                                                <td>" . $row["title"] . "</td>
                                                <td>" . $row["date"] . "</td>
                                                <td>" . $row["starttime"] . "</td>
                                                <td>" . $row["endtime"] . "</td>
                                                <td>" . $row["phonenumber"] . "</td>
                                                <td>" . $row["reason"] . "</td>
                                                <td><a href='permissionreject.php?bioid=" . $row["bioid"] . "'><button style='color:red;'> reject </button></a></td>
                                                <td><a href='permissionapprove.php?bioid=" . $row["bioid"] . "'><button style='color:green;'> approve </button></a></td>
                                              </tr>";
                                    }
                                } else {
                                    echo "No records found.";
                                }
                            }
                            $conn->close();
                        ?>
                        </tbody>
                    </thead>
                            </div>
        </div>
        
        </div>
    </div>
</body>
</html>
