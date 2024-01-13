<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "hrapp";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the HTML form
$bioid = $_POST["bioid"];
$name = $_POST["name"];
$email = $_POST["email"];
$DOB = $_POST["DOB"];
$phoneNumber = $_POST["phoneNumber"];
$JobType = $_POST["JobType"];
$Designation = $_POST["Designation"];
$Department = $_POST["Department"];
$experience = $_POST["experience"];
$password = $_POST["password"];
$shift = $_POST["shift"];
$usertype =$_POST["usertype"];

$image = $_FILES['profilepic']['tmp_name'];

$uploadDirectory = 'uploads/';
$uploadURL       = 'uploads/';
$image_file_path = "";

if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

$file_name = $_FILES["profilepic"]["name"];
$file_tmp  = $_FILES["profilepic"]["tmp_name"];
$ext       = pathinfo($file_name, PATHINFO_EXTENSION);

if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif','PNG', 'jfif'])) {
    $newFileName = uniqid('profile') . $file_name;
    $uploadPath = $uploadDirectory . $newFileName;

    if (move_uploaded_file($file_tmp, $uploadPath)) {
        $image_file_path= $uploadURL . $newFileName;
    }
}


if (empty($image_file_path)) {
    // Set the default image path here
    $image_file_path = 'uploads/profile655b9adf1945ddefault.png';
}

// Insert data into the 'addprofile' table
$sql_addprofile = "INSERT INTO addprofile (bioid, name, email, DOB, phoneNumber, JobType, Designation, Department, experience, password, shift, image)
VALUES ('$bioid', '$name', '$email', '$DOB', '$phoneNumber', '$JobType', '$Designation', '$Department', '$experience', '$password', '$shift','$image_file_path')";


if ($conn->query($sql_addprofile) === TRUE) {
    header("Location: viewprofile.php");
} else {
    echo "Error inserting data into 'addprofile': " . $conn->error . "<br>";
}

// Insert data into the 'usertable' table
$sql_usertable = "INSERT INTO usertable (name,bioid, password,usertype) VALUES ('$name','$bioid', '$password','$usertype')";

if ($conn->query($sql_usertable) === TRUE) {
    header("Location: viewprofile.php");
} else {
    echo "Error inserting data into 'usertable': " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
