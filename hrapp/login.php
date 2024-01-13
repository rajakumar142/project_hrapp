<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["bioid"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM usertable WHERE bioid = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $bioid = $row["bioid"];
        $name = $row["name"];
        $_SESSION["bioid"] = $bioid;
        $_SESSION["name"] = $name;
        $usertype = $row["usertype"];

        // Verify password using password_verify function
        if ($usertype == "1") {
            header("Location: dash.php");
            exit();
        } elseif ($usertype == "2") {
            header("Location: udash.php");
            exit();
        } elseif ($usertype == "3") {
            header("Location: rdash.php");
            exit();
        } else {
            echo "Unknown role: $role";
        }
    } else {
        // Display JavaScript alert for wrong credentials and redirect
        echo "<script>
            alert('Login failed. Please check your bio ID and password.');
            window.location.href = 'login.html';
        </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
