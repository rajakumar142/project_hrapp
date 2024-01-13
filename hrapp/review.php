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
                <a href="rdash.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboad</span>
                </a>
            </li>
            <li>
                <a href="rprofile.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Profiles</span>
                </a>
            </li>
            <li>
                <a href="rleave.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Leave</span>
                </a>
            </li>
            <li  class="active">
                <a href="review.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Review</span>
                </a>
            </li>
            <li>
                <a href="rsalary.php">
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
                <h2>Review</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>User</p>
                    
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
                            <span class="title">Accept Leave</span>
                            <span class="total"></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="approveleave.php" style="text-decoration: none;">
                    <span class="view">Approve</span>
                    </a>
                </div>
                <div class="card--a light-red">
                    <div class="card--header">
                        <div class="card--t">   
                            <span class="title">Accept Permission</span>
                            <span class="total dark-red"></span>  <!-- count value -->
                        </div>
                            <i></i>
                    </div>
                    <a href="approvepermission.php" style="text-decoration: none;">
                    <span class="view dark-red">Approve</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
