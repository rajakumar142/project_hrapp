<?php
session_start();
?>
<html>
   
<head>
    <title>HR APPLICATION</title>
    <link rel="website icon" type="jpg" href="C:\Users\Raja kumar\Pictures\getstart.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
<?php include('includes/sidebar.php'); ?>

    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>View Salary</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>Admin</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">View Salary</h3>
            <div class="tabular-container">
                <table>
                    <thead>
                        <tr>
                            <th>Bio id</th>
                            <th>Date</th>
                            <th>Basic salary</th>
                            <th>Allowance</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("db.php");
                            $sql = "SELECT bioid, date, basicsalary, allowance, total FROM salary1";
                            $result = $conn->query($sql);

                            if ($result === false) {
                                echo "Error executing SQL query: " . $conn->error;
                            } else {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row["bioid"] . "</td>
                                                <td>" . $row["date"] . "</td>
                                                <td>" . $row["basicsalary"] . "</td>
                                                <td>" . $row["allowance"] . "</td>
                                                <td>" . $row["total"] . "</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "No records found.";
                                }
                            }
                            $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
