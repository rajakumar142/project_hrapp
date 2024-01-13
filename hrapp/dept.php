<?php
session_start();
?>
<html>
    <head>
        <title>HR APPLICATION</title>
        <link rel="website icon" type="jpg" href="C:\Users\Raja kumar\Pictures\getstart.jpg">      
        <link rel="stylesheet" href="style.css"/> 
    </head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="dash.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboad</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Profiles</span>
                </a>
            </li>
            <li class="active">
                <a href="dept.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Department</span>
                </a>
            </li>
            <li>
                <a href="salary.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Salary</span>
                </a>
            </li>
            <li class="Logout">
                <a href="login.html">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Department</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                   <p>Admin</p>
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
            <h3 class="main--title">Control panel</h3>
            <div class="card--wrapper">
                <div class="card--a">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Manage Department</span>
                            <span class="total"></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="managedept.php" style="text-decoration: none;">
                    <span class="view">View</span>
                    </a>
                </div>
                <div class="card--a light-red">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Add Department</span>
                            <span class="total dark-red"></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="adddept.php" style="text-decoration: none;">
                    <span class="view dark-red">Add +</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
