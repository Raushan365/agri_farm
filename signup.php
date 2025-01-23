<?php
// signup.php

// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['cnfpassword'];

    // Validate that the passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "This email is already registered!";
        exit();
    }

    // Prepare an SQL statement to insert user data
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $password);

    // Execute the statement and check if the data was inserted successfully
    if ($stmt->execute()) {
        // Registration successful, redirect to welcome.php
        header("Location: index.html");
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
