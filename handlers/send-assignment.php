<?php
session_start(); // Start the session
require_once '../src/config.php'; // Include the configuration file

// Check if the student ID is set in the session
if (isset($_SESSION["student_id"])) {
    $lecture_id = $_GET["lecture_id"]; // Get the lecture ID from the URL parameter
    $student_id = $_SESSION["student_id"]; // Get the student ID from the session
    $conn = mysqli_connect("localhost", "root", "", "edumanage"); // Connect to the database

    // SQL query to get student and assignment data
    $sql = "SELECT s.student_id, s.course_id, s.first_name, s.last_name, a.task_link, a.lecture_id, a.student_id AS assignment_student_id
            FROM students s
            LEFT JOIN assignments a ON s.student_id = a.student_id AND a.lecture_id = '$lecture_id'
            WHERE s.student_id = '$student_id'";

    $result = mysqli_query($conn, $sql); // Execute the query
    $row = mysqli_fetch_assoc($result); // Fetch the result
    $course_id = $row["course_id"]; // Get the course ID
}

require_once ROOT_PATH . "core/functions.php"; // Include functions file
require_once ROOT_PATH . "core/validations.php"; // Include validation functions file

$errors = []; // Array to store validation errors

// Check if the request method is POST
if (check_request_method("POST")) {
    $task_link = sanitize_input($_POST["task_link"]); // Sanitize the task link input

    // Validate task link input
    if (required_val($task_link)) {
        $errors[] = "Task Link Is Required"; // Add error if task link is not provided
    }

    if (empty($errors)) {
        // Check if there is no existing assignment or if the assignment is from a different student or lecture
        if (!$row || ($row["assignment_student_id"] != $student_id && $row["lecture_id"] != $lecture_id)) {
            // Insert new assignment if no existing assignment found
            $sql = "INSERT INTO `assignments` (`student_id`, `course_id`, `lecture_id`, `task_link`)
                    VALUES ('$student_id', '$course_id', '$lecture_id', '$task_link')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION["success"] = "Data sent successfully"; // Set success message
            } else {
                $_SESSION["errors"] = "Error: " . mysqli_error($conn); // Set error message if query fails
            }
        } else {
            // Update existing assignment if found
            $sql = "UPDATE `assignments` SET `task_link` = '$task_link' WHERE `student_id` = '$student_id' AND `lecture_id` = '$lecture_id'";
            if (mysqli_query($conn, $sql)) {
                $_SESSION["success"] = "Data updated successfully"; // Set success message
            } else {
                $_SESSION["errors"] = "Error: " . mysqli_error($conn); // Set error message if query fails
            }
        }
        redirect(url("assignment")); // Redirect to the assignment page
    } else {
        $_SESSION["errors"] = implode(", ", $errors); // Store errors in session
        redirect(url("assignment")); // Redirect to the assignment page
    }
} else {
    echo "No method"; // Print message if the request method is not POST
}
?>
