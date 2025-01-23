<?php
// db_connect.php

$servername = "localhost";
$username = "root";        // Replace with your MySQL username
$password = "9955500819";            // Replace with your MySQL password
$dbname = "agri";    // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
