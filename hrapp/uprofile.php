
<?php
session_start();
include("db.php");

if (!isset($_SESSION["bioid"])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

$bioid = $_SESSION["bioid"];

// Query to fetch user profile information based on bioid
$sql = "SELECT * FROM addprofile WHERE bioid = '$bioid'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $phoneNumber = $row["phonenumber"];
    
        $jobType = $row["jobtype"];
        $designation = $row["designation"];
        $department = $row["department"];
        $experience = $row["experience"];
    } else {
        // Profile not found, you can handle this case as needed
        // For example, you can display an error message or redirect to a different page
        echo "Profile not found.";
    }
} else {
    // Query execution failed, handle this error as needed
    
    echo "Error executing query: " . $conn->error;
}

// Close the database connection
$conn->close();
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

<?php include('includes/sidebar1.php'); ?>

    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Profile</h2>
            </div>
            <div class="user--info">
            <div class="search--box">
                    <p>User</p>
                    </div>
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
            <h3 class="main--title">Profile</h3>
            <main>
                <section class="profile" style="text-align: center;">
                <table>
                    <thead>
                <tr>
                            <th>#</th>
                            <th>Details</th>
                </tr>
                <tbody>
                             
                            <tr>
                              <td>Bio Id:</td>
                              <td><?php echo $bioid; ?></td>
                            </tr>
                            <tr>
                              <td>Name:</td>
                              <td><?php echo $name; ?></td>
                            </tr>
                            <td>Email:</td>
                              <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                              <td>Phone:</td>
                              <td><?php echo $phoneNumber; ?></td>
                            </tr>
                            <tr>
                              <td>JobType:</td>
                              <td><?php echo $jobType; ?></td>
                            </tr>
                            <tr>
                              <td>Designation:</td>
                              <td><?php echo $designation; ?></td>
                            </tr>
                            <td>Department:</td>
                              <td><?php echo $department; ?></td>
                            </tr>
                            <tr>
                              <td>Experience:</td>
                              <td><?php echo $experience; ?></td>
                            </tr>
                            </tbody>
                    </thead>
                </table>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
