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

// Initialize the response array
$response = [];

// Check if the 'image' key is set in the $_FILES array
if (isset($_FILES['image'])) {
    // Handle the case when the image is sent as a file
    $uploadedFile = $_FILES['image'];
    $uploadDirectory = '../uploads/';

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $filename = uniqid('profile_') . '.png';
    $filePath = $uploadDirectory . $filename;

    if (move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
        $image_file_path = 'uploads/' . $filename;

        // Insert data into the 'addprofile' table
        $sql_addprofile = "INSERT INTO addprofile (bioid, name, email, DOB, phoneNumber, JobType, Designation, Department, experience, password, shift, image)
        VALUES ('$bioid', '$name', '$email', '$DOB', '$phoneNumber', '$JobType', '$Designation', '$Department', '$experience', '$password', '$shift','$image_file_path')";

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
    } else {
        $response["error_upload"] = "Error saving image.";
    }
} else {
    // Handle the case when 'image' is not set in $_FILES
    $response["error_image"] = "Image not provided in the POST data.";
}

// Close the database connection
$conn->close();

// Send JSON response
echo json_encode($response);
?>
