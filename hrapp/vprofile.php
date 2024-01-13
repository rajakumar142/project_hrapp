
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
            <li class="active">
                <a href="profile.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Profiles</span>
                </a>
            </li>
            <li>
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
                <h2>Profile</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search"/>
                    
                </div>
            
                <img src="1.jpeg" alt=""/>
            </div>
        </div>
        <div class="card--container">
            <h3 class="main--title">User information</h3>
            <main>
                <section class="profile" style="text-align: center;">
                    <img src="2.jpeg" alt="Employee Photo" style="width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    margin-bottom: 20px;">
                    <h2>2131</h2><!-- count value -->
                    <p>Name:</p><!-- count value -->
                    <p>Email:</p><!-- count value -->
                    <p>Phone:</p><!-- count value -->
                    <p>Address:</p><!-- count value -->
                    <p>JobType:</p><!-- count value -->
                    <p>Designation:</p><!-- count value -->
                    <p>Department:</p><!-- count value -->
                    <p>Experience:</p><!-- count value -->
                </section>
            </main>
        </div>
    </div>
</body>
</html>
