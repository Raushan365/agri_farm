<?php
    // Include the database connection file
    include 'db_connect.php';

    // Start the session to manage user login
    session_start();

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the submitted username and password from the form
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Check if the fields are not empty
        if (empty($username) || empty($password)) {
            echo "Please fill in both fields.";
        } else {
            // Prepare the SQL query to check the username and password in the database
            $stmt = $conn->prepare("SELECT name, password FROM users WHERE name = ?");
            if (!$stmt) {
                echo "Error in query preparation: " . $conn->error;
                exit();
            }

            // Bind the parameters (username) and execute the query
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            // If a matching username is found
            if ($stmt->num_rows == 1) {
                // Bind the result to variables
                $stmt->bind_result($db_username, $db_password);
                $stmt->fetch();

                // Compare the plain text password from the form with the one in the database
                if ($password === $db_password) {
                    // Password is correct, set the session variable
                    $_SESSION['username'] = $db_username;
                    // Redirect to the welcome page
                    header("Location: service.html");
                    exit();
                } else {
                    // Invalid password
                    echo "Invalid password.";
                }
            } else {
                // No matching username found
                echo "Username not found.";
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Close the database connection
    $conn->close();
    ?>