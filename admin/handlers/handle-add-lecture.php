<?php

// Start the session
session_start();

// Include necessary functions and validations
require_once("../../core/functions.php");
require_once("../../core/validations.php");

// Initialize an array to store error messages
$errors = [];

// Check if the request method is POST
if (check_request_method("POST")) {
    // Retrieve form data from the POST request
    $course = $_POST['course'];
    $topic = $_POST['topic'];
    $drive_link = $_POST['drive_link'];

    // Validate the course field
    if (required_val($course)) {
        $errors[] = "Course Is Required";
    }

    // Validate the topic field
    if (required_val($topic)) {
        $errors[] = "Topic Is Required";
    }

    // Validate the drive_link field
    if (required_val($drive_link)) {
        $errors[] = "Drive_link Is Required";
    }

    // If there are no errors, proceed with data insertion
    if (empty($errors)) {
        // Establish database connection
        $conn = mysqli_connect("localhost", "root", "", "edumanage");

        // Prepare SQL query to insert lecture data into the database
        $sql = "INSERT INTO `lectures` (`course_id`, `topic`, `drive_link`)
                VALUES
                (
                    '$course',
                    '$topic',
                    '$drive_link'
                )";

        // Execute the SQL query
        mysqli_query($conn, $sql);

        // Check if the insertion was successful
        if (mysqli_affected_rows($conn)) {
            $_SESSION["success"] = "Data sent successfully";
            redirect("../add_lecture.php");
        } 
    } else {
        // Store errors in session and redirect back to the form
        $_SESSION["errors"] = $errors;
        redirect("../add_lecture.php");
    }
} else {
    // Handle case where the request method is not POST
    echo "No method";
}

?>
