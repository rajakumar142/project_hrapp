<?php
session_start();

include('db.php'); // Change 'db.php' to the actual file name where you have your database connection code

// Fetch departments from the database
$sqlDepartments = "SELECT DISTINCT department FROM department"; // Replace 'your_department_table' with your actual table name
$resultDepartments = $conn->query($sqlDepartments);

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
                    <h2>Add Profile</h2>
                </div>
                <div class="user--info">
                    <div class="search--box">
                    <p>Admin</p>
                        
                    </div>
                
                    <img src="getstart.jpg" alt=""/>
                </div>
            </div>
            <div class="card--container">
            <h1 class="main--title">Add profile</h1><br>
            <form action="addprofile1.php" method="POST" enctype="multipart/form-data">
            
            <div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px; margin-bottom: 20px;">

            <img src="image\default.png" alt="default" style = "width: 100px; height: 100px; border-radius: 25px; margin-left: 45%;"><br><br>

        <!-- New input for profile picture -->
        <label for="profilepic" 
        style="font-weight: bold;
        color: #333; 
        margin-right: 10px;margin-left: 35%;">Upload Photo:</label>
        <input type="file" name="profilepic" style="margin-bottom: 10px;"><br>
                
        <input type="text" required name="bioid" placeholder="Bioid" 
        style="width: 45%;
            padding: 10px;
            margin-left: 25%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
            transition: border-color 0.3s ease-in-out;
            border-color: #007bff; background-color: aliceblue;"><br>
        
        <input type="text" required name="name" placeholder="Name" 
        style="width: 45%;
        padding: 10px;
        margin-left: 25%;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; background-color: aliceblue;"><br>
        
        
        <label for="DOB"  style="font-weight: bold;
        color: #333;
        margin-left: 25%;
        margin-right: 10px;">D.O.B:</label>
        
        <input type="date" id="DOB" name="DOB" 
        style=" padding: 5px;
        
        border: 1px solid #ccc; 
        border-radius: 5px; 
        width: 130px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; 
        background-color: aliceblue;">

    
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="PhoneNumber" 
                style="width: 30%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                margin-bottom: 10px;
                transition: border-color 0.3s ease-in-out;
                border-color: #007bff; 
                background-color: aliceblue;" required><br>

<input type= "text" required name="email" placeholder="Email" 
        style="width: 45%;
        padding: 10px;
        margin-left: 25%;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; 
        background-color: aliceblue;"><br>

<input type="text" required name="experience" placeholder="Experience" 
    style="width: 45%;
        padding: 10px;
        margin-left: 25%;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; background-color: aliceblue;"><br>

    <input type="password" required name="password" placeholder="Enter Password" 
    style="width: 45%;
        padding: 10px;
        margin-left: 25%;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; background-color: aliceblue;"><br>
    
    <label for="JobType" 
        style="font-weight: bold;
        margin-left: 25%;
        color: #333; 
        margin-right: 10px;">JobType:</label>
            
            <select id="JobType" name="JobType" 
                style="width: 38%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 16px;
                    margin-bottom: 10px;
                    transition: border-color 0.3s ease-in-out;
                    border-color: #007bff; 
                    background-color: aliceblue;" required>
                    <option value="select">-----Select Job type-----</option>
                    <option value="permanent">permanent</option>
                    <option value="intern">intern</option>
                    <option value="parttime">part time</option>
                    <option value="other">other</option>
                </select><br>
                <label for="Designation" 
        style="font-weight: bold;
        color: #333; 
        margin-left: 25%;
        margin-right: 10px;">Designation:</label>
            
            <select id="Designation" name="Designation" 
                style="width: 36.7%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 16px;
                    margin-bottom: 10px;
                    transition: border-color 0.3s ease-in-out;
                    border-color: #007bff; 
                    background-color: aliceblue;" required>
                    <option value="select">-----Select Designation-----</option>
                    <option value="permanent">Team lead</option>
                    <option value="intern">Project manager</option>
                    <option value="parttime">Project lead</option>
                    <option value="intern">Developer</option>
                    <option value="parttime">Designer</option>
                    <option value="other">other</option>
                </select><br>

                <!-- <input type="text" required name="Designation" placeholder="Designation" 
                style="width: 45%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 16px;
                    margin-bottom: 10px;
                    transition: border-color 0.3s ease-in-out;
                    border-color: #007bff; 
                    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);"> -->
            
            <label for="Department" 
        style="font-weight: bold;
        color: #333; 
        margin-left: 25%;
        margin-right: 10px;">Department:</label>
            
            <select id="Department" name="Department" style="width: 36.6%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; margin-bottom: 10px; transition: border-color 0.3s ease-in-out; border-color: #007bff;background-color: aliceblue;" required>
                <option value="select">-----Select Department-----</option>

                <?php
                if ($resultDepartments) {
                    while ($rowDepartment = $resultDepartments->fetch_assoc()) {
                        echo '<option value="' . $rowDepartment["department"] . '">' . $rowDepartment["department"] . '</option>';
                    }
                } else {
                    die("Error: " . $conn->error);
                }
                ?>
                
                </select><br>
                
                <!-- <input type="text" required name="Department" placeholder="Department" 
        style="width: 45%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
            transition: border-color 0.3s ease-in-out;
            border-color: #007bff; 
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);"> -->

    <label for="shift" 
    style="font-weight: bold;
    color: #333;
    margin-left: 25%;
    margin-right: 10px;">Shift:</label>

    <select id="shift" name="shift" 
    style="width: 40.9%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 10px;
    transition: border-color 0.3s ease-in-out;
    border-color: #007bff; 
    background-color: aliceblue;"required>
        <option value="select">-----Select Shift-----</option>
        <option value="shift1">shift1</option>
        <option value="shift2">shift2</option>
        <option value="shift3">shift3</option>
    
    </select><br>


    <label for="usertype" 
    style="font-weight: bold;
    color: #333;
    margin-left: 25%;
    margin-right: 10px;">usertype:</label>

    <select id="usertype" name="usertype" 
    style="width: 38.8%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 10px;
    transition: border-color 0.3s ease-in-out;
    border-color: #007bff; 
    background-color: aliceblue;"required>
        <option value="select">-----Select usertype-----</option>
        <option value="1">admin</option>
        <option value="2">user</option>
        <option value="3">reviewer</option>
    
    </select><br><br>

        <input type="submit" value="submit" 
        style="background-color: #007bff; 
        color: #fff; 
        margin-left: 40%;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;">

</div>

            </form>

            </div>
        </div>
    </body>
    </html>
