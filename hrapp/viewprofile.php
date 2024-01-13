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
            <h2>Profile</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <p>Admin</p>
            </div>

            <img src="getstart.jpg" alt=""/>
        </div>
    </div>
    <div class="tabular--wrapper">
        <h3 class="main--title">Profiles information</h3>
        <a href='addprofile.php'>
        <button style="margin-top: 10px; padding: 10px 10px; margin-bottom:10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Add Profile</button>
</a>
        <div class="tabular-container">
            <table>
                <thead>
                <tr>
                    <th>Bioid</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>PhoneNumber</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include("db.php");
                $sql = "SELECT bioid, name, email, DOB, phonenumber, jobtype, designation, department, experience, shift, image FROM addprofile";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["bioid"] . "</td>
                                <td>" . '<img src="'.$row["image"].'"/ style = "width: 100px; height: 100px; border-radius: 25px; ">' . "</td>

                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["DOB"] . "</td>
                                <td>" . $row["phonenumber"] . "</td>
                                <td><a href='viewprofileinfo.php?bioid=" . $row["bioid"] . "'> <button>View Profile</button></a></td>
                                <td><a href='editprofileinfo.php?bioid=" . $row["bioid"] . "'> <button>Edit</button></a></td>
                                <td><a href='deleteprofile1.php?bioid=" . $row["bioid"] . "'><button> Delete </button></a></td>
                              </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
