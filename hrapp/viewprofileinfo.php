<?php
session_start();
include("db.php");

// Check if bioid is provided in the URL
if (isset($_GET['bioid'])) {
    $bioid = $_GET['bioid'];

    // Fetch the user profile information based on the bioid
    $sql = "SELECT * FROM addprofile WHERE bioid = '$bioid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $phoneNumber = $row["phonenumber"];
        $jobType = $row["jobtype"];
        $designation = $row["designation"];
        $department = $row["department"];
        $experience = $row["experience"];
        $image = $row["image"];

        // Display the form for editing
        ?>
        <html>
        <head>
            <title>View Profile</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="style.css"/>
        </head>
        <body>

        <?php include('includes/sidebar.php'); ?>

        <div class="main--contant">
            <div class="header--wrapper">
                <div class="header--title">
                    <span>Primary</span>
                    <h2>View Profile</h2>
                </div>
                <div class="user--info">
                    <div class="search--box">
                        <p>Admin</p>
                    </div>
                    <img src="getstart.jpg" alt=""/>
                </div>
            </div>
            <div class="card--container">
                <h3 class="main--title">View Profile</h3>
                <main>
                    <section class="profile" style="text-align: center;">
                        <!-- ... (your existing HTML code) ... -->

<form method="post" action="updateprofile.php" enctype="multipart/form-data">

<div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px; margin-bottom: 20px;">
    <!-- Display existing profile picture if available -->
    <?php if (!empty($row["image"])): ?>
    <img src="<?php echo $row["image"]; ?>" style="width: 100px; height: 100px; border-radius: 25px;" /><br>
<?php endif; ?>

   

    <!-- File input for updating the profile picture -->
    <!-- <input type="file" name="profilepic"  value="" style="margin-top: 10px;"><br> -->

    <label for="bioid" style="margin-top: 10px;font-weight: bold; color: #333;"><?php echo $bioid; ?></label><br>
    <input type="hidden" name="bioid" value="<?php echo $bioid; ?>" style="margin-top: 10px;">

    <div style="padding: 5px; border-radius: 5px;">
    <label for="name" style="margin-top: 10px;">Name:<?php echo $name; ?></label>
    <input type="hidden" name="name" value="<?php echo $name; ?>" style="margin-top: 5px; width: 20%; border: 1px solid #ccc; padding: 8px;border-color: #007bff; background-color: aliceblue; border-radius: 3px;">
</div>

<div style="padding: 5px; border-radius: 5px;">

    <label for="email" style="margin-top: 10px;">Email:<?php echo $email; ?></label>
    <input type="hidden" name="email" value="<?php echo $email; ?>" style="margin-top: 5px; width: 20%; border: 1px solid #ccc; padding: 8px; border-color: #007bff; background-color: aliceblue; border-radius: 3px;"><br>
    </div>

    <div style="padding: 5px; border-radius: 5px;">
    <label for="phoneNumber" style="margin-top: 10px;">Phone Number:<?php echo $phoneNumber; ?></label>
    <input type="hidden" name="phoneNumber" value="<?php echo $phoneNumber; ?>" style="margin-top: 5px; width: 20%; border: 1px solid #ccc; padding: 8px; border-color: #007bff; background-color: aliceblue; border-radius: 3px;"><br>
    </div>


    <div style="padding: 5px; border-radius: 5px;">
    <label for="jobType" style="margin-top: 10px;">Job Type:<?php echo $jobType; ?></label>
    <input type="hidden" name="jobType" value="<?php echo $jobType; ?>" style="margin-top: 5px; width: 20%; border: 1px solid #ccc; padding: 8px; border-color: #007bff; background-color: aliceblue; border-radius: 3px;"><br>
    </div>


    <div style="padding: 5px; border-radius: 5px;">
    <label for="designation" style="margin-top: 10px;">Designation:<?php echo $designation; ?></label>
    <input type="hidden" name="designation" value="<?php echo $designation; ?>" style="margin-top: 5px; width: 20%; border: 1px solid #ccc; border-color: #007bff; background-color: aliceblue; padding: 8px; border-radius: 3px;"><br>
    </div>


    <div style="padding: 5px; border-radius: 5px;">
    <label for="department" style="margin-top: 10px;">Department:<?php echo $department; ?></label>
    <input type="hidden" name="department" value="<?php echo $department; ?>" style="margin-top: 5px; width: 20%; border-color: #007bff; background-color: aliceblue; border: 1px solid #ccc; padding: 8px; border-radius: 3px;"><br>
    </div>


    <div style="padding: 5px; border-radius: 5px;">
    <label for="experience" style="margin-top: 10px;">Experience:<?php echo $experience; ?></label>
    <input type="hidden" name="experience" value="<?php echo $experience; ?>" style="margin-top: 5px; width: 20%; border-color: #007bff; background-color: aliceblue; border: 1px solid #ccc; padding: 8px; border-radius: 3px;"><br><br>
    </div>

    </div>

</form>



                    </section>
                </main>
            </div>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "Bioid not provided.";
}
?>
