<?php
session_start(); // Start the session
require_once '../src/config.php'; // Include configuration file
require_once ROOT_PATH . "core/functions.php"; // Include functions file
require_once ROOT_PATH . "core/validations.php"; // Include validation functions file

$errors = []; // Array to store validation errors

// Check if the request method is POST
if (check_request_method("POST")) {
    $email = sanitize_input($_POST["email"]); // Sanitize the email input
    $password = sanitize_input($_POST["password"]); // Sanitize the password input

    // Validate email input
    if (required_val($email)) {
        $errors[] = "Email Is Required"; // Add error if email is not provided
    } elseif (email_val($email)) {
        $errors[] = "Please Type A Valid Email"; // Add error if email is not valid
    }

    // Validate password input
    if (required_val($password)) {
        $errors[] = "Password Is Required"; // Add error if password is not provided
    } elseif (min_val($password, 3)) {
        $errors[] = "Password Must Be Greater Than 3 Chars"; // Add error if password is too short
    } elseif (max_val($password, 20)) {
        $errors[] = "Password Must Be Smaller Than 20 Chars"; // Add error if password is too long
    }

    if (empty($errors)) {
        $conn = mysqli_connect("localhost", "root", "", "edumanage"); // Connect to the database

        // Check database connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error()); // Terminate script if connection fails
        }

        // Check student credentials
        $sql = "SELECT * FROM `students` WHERE email = '$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["insert"] = "good"; // Set session variable for successful login
            $_SESSION["student_id"] = $row["student_id"]; // Store student ID in session
            redirect(url("home")); // Redirect to the home page
        } else {
            // Check professor credentials
            $sql = "SELECT * FROM `professor` WHERE email = '$email' AND `password` = '$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["insert"] = "good"; // Set session variable for successful login
                $_SESSION["admin_id"] = $row["professor_id"]; // Store professor ID in session
                redirect("../admin/index.php"); // Redirect to the admin dashboard
            } else {
                $errors[] = "Email or password is incorrect."; // Add error if credentials are incorrect
                $_SESSION["errors"] = $errors; // Store errors in session
                redirect("../login.php"); // Redirect back to the login page
            }
        }
        mysqli_close($conn); // Close the database connection
    } else {
        $_SESSION["errors"] = $errors; // Store errors in session
        redirect("../login.php"); // Redirect back to the login page
    }
} else {
    echo "No valid method"; // Print message if the request method is not POST
}
?>
