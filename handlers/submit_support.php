<?php
session_start(); // Start the session
require_once '../src/config.php'; // Include the configuration file

// Check if the student ID is set in the session
if (isset($_SESSION["student_id"])) {
    $student_id = $_SESSION["student_id"]; // Get the student ID from the session
    $conn = mysqli_connect("localhost", "root", "", "edumanage"); // Connect to the database

    // Check if the database connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); // Print connection error and stop execution
    }

    // SQL query to get the course ID for the student
    $sql = "SELECT course_id FROM `students` WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $sql); // Execute the query

    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result); // Fetch the result
        $course_id = $row['course_id']; // Get the course ID

        // You can now use $course_id in your further logic
    } else {
        echo "Error retrieving course_id: " . mysqli_error($conn); // Print error if query fails
    }
}

require_once ROOT_PATH . "core/functions.php"; // Include functions file
require_once ROOT_PATH . "core/validations.php"; // Include validation functions file

$errors = []; // Array to store validation errors

// Check if the request method is POST
if (check_request_method("POST")) {
    $message = $_POST["message"]; // Get the message from the POST request

    // Validate message input
    if (required_val($message)) {
        $errors[] = "Message Is Required"; // Add error if message is not provided
    }

    // Proceed if there are no validation errors
    if (empty($errors)) {
        // SQL query to insert a new support request
        $sql = "INSERT INTO `support` (`student_id`, `course_id`, `message`)
                VALUES ('$student_id', '$course_id', '$message')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["success"] = "Data sent successfully"; // Set success message
            redirect(url("support")); // Redirect to the support page
        } else {
            $_SESSION["errors"] = "Error: " . mysqli_error($conn); // Set error message if query fails
        }
    } else {
        $_SESSION["errors"] = $errors; // Store errors in session
        redirect(url("support")); // Redirect to the support page
    }
} else {
    echo "No method"; // Print message if the request method is not POST
}
?>
