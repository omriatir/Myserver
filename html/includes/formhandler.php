<?php

$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "test_schema";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$user_name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$user_message = mysqli_real_escape_string($conn, $_POST["message"]);

$sql = "INSERT INTO user_info (name, email, message) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);


if (mysqli_stmt_prepare($stmt, $sql)) {
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sss", $user_name, $email, $user_message);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error executing query: " . mysqli_stmt_error($stmt);
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing query: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?> 
