<?php
// Include your database connection code here (e.g., db_conn.php)
require_once('db.php');

// Get the bioid from the request (replace 'stgp718' with the actual user ID)
$bioid = $_GET['bioid'];

// Prepare a DELETE statement for addprofile table
$stmt1 = $conn->prepare("DELETE FROM addprofile WHERE bioid = ?");
$stmt1->bind_param("s", $bioid);

// Prepare a DELETE statement for usertable table
$stmt2 = $conn->prepare("DELETE FROM usertable WHERE bioid = ?");
$stmt2->bind_param("s", $bioid);

// Execute the DELETE statement for addprofile table
if ($stmt1->execute()) {
    $stmt1->close();

    // Execute the DELETE statement for usertable table
    if ($stmt2->execute()) {
        $stmt2->close();

        // Close the database connection
        $conn->close();

        // Redirect to manageprofile.php
        header("Location: viewprofile.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        // Handle error if DELETE from usertable fails
        echo json_encode(array('message' => 'Error deleting from usertable.'));
    }
} else {
    // Handle error if DELETE from addprofile fails
    echo json_encode(array('message' => 'Error deleting from addprofile.'));
}
?>
