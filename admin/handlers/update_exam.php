<?php
session_start();

// Include necessary functions and validations
require_once("../../core/functions.php");
require_once("../../core/validations.php");

// Initialize an array to store error messages
$errors = [];

// Check if the request method is POST
if (check_request_method("POST")) {
    // Retrieve the exam ID from the GET request and other form data from the POST request
    $exam_id = $_GET["id"];
    $date = $_POST["date"];
    $start_time = $_POST["start-time"];
    $end_time = $_POST["end-time"];
    $exam_link = $_POST["exam-link"];
    $exam_name = $_POST["exam_name"];

    // Validate each input field
    if (required_val($date)) {
        $errors[] = "Date Is Required";
    } 

    if (required_val($start_time)) {
        $errors[] = "Start Time Is Required";
    } 

    if (required_val($end_time)) {
        $errors[] = "End Time Is Required";
    } 

    if (required_val($exam_link)) {
        $errors[] = "Exam Link Is Required";
    } 

    if (required_val($exam_name)) {
        $errors[] = "Exam Name Is Required";
    } 

    // If there are no errors, proceed with database update
    if (empty($errors)) {
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "edumanage");

        // Prepare SQL query to update exam information
        $sql = "UPDATE `exams` SET `exam_name` = '$exam_name', 
                                    `exam_date` = '$date',
                                    `start_time` = '$start_time', 
                                    `end_time` = '$end_time', 
                                    `exam_link` = '$exam_link'
                            WHERE exam_id = '$exam_id'";

        // Execute the SQL query
        mysqli_query($conn, $sql);

        // Check if any rows were affected by the update
        if (mysqli_affected_rows($conn)) {
            // Set success message and redirect to view exam page
            $_SESSION["success"] = "Data updated successfully";
            redirect("../view_exam.php");
        } else {
            // Redirect to view exam page if no rows were affected
            redirect("../view_exam.php");
        }
    } else {
        // Store errors in session and redirect to edit exam page
        $_SESSION["errors"] = $errors;
        redirect("../edit_exam.php");
    }
} else {
    // Handle case where the request method is not POST
    echo "No method";
}
?>
