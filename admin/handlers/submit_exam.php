<?php
session_start();

// Include necessary functions and validations
require_once("../../core/functions.php");
require_once("../../core/validations.php");

// Initialize an array to store error messages
$errors = [];

// Check if the request method is POST
if (check_request_method("POST")) {
    // Retrieve form data from the POST request
    $course_name = $_POST["course_name"];
    $conn = mysqli_connect("localhost", "root", "", "edumanage");
    
    // Check database connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve additional fields from the POST request
    $exam_name = $_POST["exam_name"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $total_marks = $_POST["total_marks"];
    $passing_marks = $_POST["passing_marks"];
    $exam_link = $_POST["exam_link"];
    $course_id = $_POST["course_id"]; // Retrieve course_id from hidden input field

    // Validate required fields
    if (required_val($exam_name)) {
        $errors[] = "Exam Name Is Required";
    }

    if (required_val($course_id)) { // Validate course_id
        $errors[] = "Course ID Is Required or Invalid";
    }

    if (required_val($start_time)) {
        $errors[] = "Start Time Is Required";
    }

    if (required_val($end_time)) {
        $errors[] = "End Time Is Required";
    }

    if (required_val($total_marks)) {
        $errors[] = "Total Marks Is Required";
    }

    if (required_val($passing_marks)) {
        $errors[] = "Passing Marks Is Required";
    }

    // If there are no errors, proceed with data insertion
    if (empty($errors)) {
        // Sanitize user input to prevent SQL injection
        $exam_name = mysqli_real_escape_string($conn, $exam_name);
        $start_time = mysqli_real_escape_string($conn, $start_time);
        $end_time = mysqli_real_escape_string($conn, $end_time);
        $total_marks = mysqli_real_escape_string($conn, $total_marks);
        $passing_marks = mysqli_real_escape_string($conn, $passing_marks);
        $exam_link = mysqli_real_escape_string($conn, $exam_link); // Sanitize exam_link
        $course_id = mysqli_real_escape_string($conn, $course_id); // Sanitize course_id

        // Prepare SQL query to insert exam data into the database
        $sql = "INSERT INTO `exams` (`exam_name`, `course_id`, `start_time`, `end_time`, `total_marks`, `passing_marks`, `exam_link`)
                VALUES
                (
                '$exam_name',
                '$course_id',
                '$start_time',
                '$end_time',
                '$total_marks',
                '$passing_marks',
                '$exam_link'
                )";

        // Execute the SQL query
        $result = mysqli_query($conn, $sql);

        // Check if the insertion was successful
        if ($result && mysqli_affected_rows($conn) > 0) {
            $_SESSION["success"] = "Data submitted successfully";
            redirect("../add_exam.php");
        } else {
            $errors[] = "Failed to submit data.";
        }
    }

    // Store errors in session and redirect back to the form
    $_SESSION["errors"] = $errors;
    redirect("../add_exam.php");

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle case where the request method is not POST
    echo "Invalid request method.";
}
?>
