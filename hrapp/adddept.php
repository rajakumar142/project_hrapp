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
                <h2>Add Department</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>Admin</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
        <form action="adddept1.php" method="POST">
            <h1 class="main--title">Add profile</h1><br>
            <div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px; margin-bottom: 20px;">

    <br><input type="text" required name="department" placeholder="Department" 
    style="width: 45%;
        padding: 10px;
        border: 1px solid #ccc;
        margin-left: 25%;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; 
        background-color: aliceblue;"><br><br>
    
    
    <input type="submit" value="submit" 
    style="background-color: #007bff; 
    color: #fff; 
    padding: 10px 20px;
    margin-left: 40%;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;"><br>
</div>
        </form>

        </div>
    </div>
</body>
</html>
