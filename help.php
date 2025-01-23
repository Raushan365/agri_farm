<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "9955500819";
$dbname = "agri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$name = $_POST['uname'];
$mob = $_POST['mob'];
$query = $_POST['query'];

// Prepare an UPDATE SQL statement
$sql = "INSERT INTO help (name,mob,query) VALUES ('$name','$mob','$query')";

// Initialize a statement
$stmt = $conn->prepare($sql);

// Execute the statement
if ($stmt->execute()) {
    echo "Password updated successfully.";
    header("Location: help.html");
} else {
    echo "Error updating password: " . $conn->error;
    header("Location: help.html");
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
