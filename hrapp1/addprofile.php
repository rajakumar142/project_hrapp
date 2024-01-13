<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "hrapp";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Retrieve data from the HTML form
$bioid = $_POST["bioid"];
$name = $_POST["name"];
$email = $_POST["email"];
$DOB = $_POST["DOB"];
$phoneNumber = $_POST["phonenumber"];
$JobType = $_POST["jobtype"];
$Designation = $_POST["designation"];
$Department = $_POST["department"];
$experience = $_POST["experience"];
$password = $_POST["password"];
$shift = $_POST["shift"];
$usertype = $_POST["usertype"];

// Check if the 'profilepic' key is set in the $_FILES array
if (isset($_FILES['profilepic'])) {
    $image = $_FILES['profilepic']['tmp_name'];

    $uploadDirectory = '../uploads/';
    $uploadURL = 'uploads/';
    $image_file_path = "";

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $file_name = $_FILES["profilepic"]["name"];
    $file_tmp = $_FILES["profilepic"]["tmp_name"];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif', 'PNG', 'jfif'])) {
        $newFileName = uniqid('profile') . "." . $ext; // Make sure to include file extension
        $uploadPath = $uploadDirectory . $newFileName;

        if (move_uploaded_file($file_tmp, $uploadPath)) {
            $image_file_path = $uploadURL . $newFileName;
        }
    }

    // Check if image_file_path is empty and set the default image path
    if (empty($image_file_path)) {
        $image_file_path = 'uploads/profile_default.png';
    }
} else {
    // Handle the case when 'profilepic' is not set in $_FILES
    $image_file_path = 'uploads/profile_default.png';
}

// Initialize the response array
$response = [];


// Insert data into the 'addprofile' table
$sql_addprofile = "INSERT INTO addprofile (bioid, name, email, DOB, phoneNumber, JobType, Designation, Department, experience, password, shift, image)
VALUES ('$bioid', '$name', '$email', '$DOB', '$phoneNumber', '$JobType', '$Designation', '$Department', '$experience', '$password', '$shift','$image_file_path')";

// echo $sql_addprofile;
// exit;
 
if ($conn->query($sql_addprofile) === TRUE) {
    $response["message"] = "User details inserted and image uploaded successfully.";
} else {
    $response["error_addprofile"] = "Error inserting data into 'addprofile': " . $conn->error;
}

// Insert data into the 'usertable' table
$sql_usertable = "INSERT INTO usertable (name, bioid, password, usertype) VALUES ('$name','$bioid', '$password','$usertype')";

if ($conn->query($sql_usertable) === TRUE) {
    $response["message"] = "User details inserted and image uploaded successfully.";
} else {
    $response["error_usertable"] = "Error inserting data into 'usertable': " . $conn->error;
}

// Close the database connection
$conn->close();

// Send JSON response
echo json_encode($response);
?>
