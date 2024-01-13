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
                <h2>Manage department</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>Admin</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Manage department</h3>
            <button style="margin-top: 10px; padding: 10px 10px; margin-bottom:10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;" onclick="myFunction()">Add +</button>

    <p id="demo"></p>

    <form id="myForm" action="adddept1.php" method="POST">
        <input type="hidden" id="departmentInput" name="department" value="">
    </form>

    <script>
        function myFunction() {
            let text;
            let department = prompt("Please enter Department:", "Department");
            if (department == null || department == "") {
                text = "User cancelled the prompt.";
            } else {
                text = "Hello " + department + "! How are you today?";
                // Set the value of the hidden input field
                document.getElementById("departmentInput").value = department;
                // Submit the form
                document.getElementById("myForm").submit();
            }
            document.getElementById("demo").innerHTML = text;
        }
    </script>
            <div class="tabular-container">
                <table>
                    <thead>
                        <tr>
                            
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                        <?php
                include("db.php");
                $sql = "SELECT sno, department FROM department";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                             
                                <td>" . $row["department"] . "</td>
                                <td><a href='deletedept.php?sno=" . $row["sno"] . "'><button> Delete </button></a></td>

                              </tr>";
                    }
                }
                ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
        
        </div>
    </div>
</body>
</html>
