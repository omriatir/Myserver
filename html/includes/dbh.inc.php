<?php

$dsn = "mysql:host=localhost;dbname=test_schema"; // Fixed typo in 'dbname'
$dbusername = "admin";
$dbpassword = "password";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword); // Corrected PDO constructor arguments
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Fixed typo in 'ERRMODE_EXCEPTION'
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Exit the script if connection fails
}