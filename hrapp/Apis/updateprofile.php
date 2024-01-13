<?php

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you're receiving JSON data in the request body
    $requestData = json_decode(file_get_contents('php://input'), true);

    // Check if the required fields are present in the JSON data
    if (
        isset($requestData['bioid'], $requestData['name'], $requestData['email'], $requestData['phoneNumber'],
        $requestData['jobType'], $requestData['designation'], $requestData['department'], $requestData['experience'])
    ) {
        // Extract data from the JSON request
        $bioid = $requestData['bioid'];
        $name = $requestData['name'];
        $email = $requestData['email'];
        $phoneNumber = $requestData['phoneNumber'];
        $jobType = $requestData['jobType'];
        $designation = $requestData['designation'];
        $department = $requestData['department'];
        $experience = $requestData['experience'];

        // Your database connection parameters
        $servername= "localhost";
        $username= "root";
        $password = "";
        $db_name = "hrapp";
        $conn = new mysqli($servername, $username, $password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL update statement
        $sql = "UPDATE addprofile SET 
            name = '$name', 
            email = '$email', 
            phonenumber = '$phoneNumber', 
            jobtype = '$jobType', 
            designation = '$designation', 
            department = '$department', 
            experience = '$experience'
            WHERE bioid = '$bioid'";

        if ($conn->query($sql) === TRUE) {
            // Update successful
            $response = array('status' => 'success', 'message' => 'Profile updated successfully');
        } else {
            // Update failed
            $response = array('status' => 'error', 'message' => 'Error updating profile: ' . $conn->error);
        }

        // Close the database connection
        $conn->close();
    } else {
        // Required fields missing in the JSON data
        $response = array('status' => 'error', 'message' => 'Missing required fields in the request');
    }
} else {
    // Not a POST request
    $response = array('status' => 'error', 'message' => 'Invalid request method');
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);

?>
