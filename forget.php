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
$name = $_POST['name'];
$pass = $_POST['pass'];
$newPassword = $_POST['cnfpass'];

// Prepare an UPDATE SQL statement
$sql = "UPDATE users SET password = ? WHERE name = ?";

// Initialize a statement
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
$stmt->bind_param("ss", $newPassword, $name);

// Execute the statement
if ($stmt->execute()) {
    echo "Password updated successfully.";
    header("Location: index.html");
} else {
    echo "Error updating password: " . $conn->error;
    header("Location: forgot.html");
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
