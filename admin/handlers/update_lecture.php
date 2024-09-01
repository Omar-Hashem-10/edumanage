<?php
session_start();

// Include necessary functions and validations
require_once("../../core/functions.php");
require_once("../../core/validations.php");

// Initialize an array to store error messages
$errors = [];

// Check if the request method is POST
if (check_request_method("POST")) {
    // Retrieve form data from POST request
    $lecture_id = $_POST["lecture_id"];
    $topic = $_POST["topic"];
    $drive_link = $_POST["drive_link"];

    // Validate topic
    if (required_val($topic)) {
        $errors[] = "Topic Is Required";
    }

    // Validate lecture link
    if (required_val($drive_link)) {
        $errors[] = "Lecture link Is Required";
    }

    // If there are no errors, proceed with database update
    if (empty($errors)) {
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "edumanage");

        // Prepare SQL query to update lecture information
        $sql = "UPDATE `lectures` SET `topic` = '$topic', `drive_link` = '$drive_link' WHERE lecture_id = '$lecture_id'";

        // Execute the SQL query
        mysqli_query($conn, $sql);

        // Check if any rows were affected by the update
        if (mysqli_affected_rows($conn)) {
            // Set success message and redirect to view lecture page
            $_SESSION["success"] = "Data updated successfully";
            redirect("../view_lecture.php");
        } else {
            // Redirect to view lecture page if no rows were affected
            redirect("../view_lecture.php");
        }
    } else {
        // Store errors in session and redirect to edit lecture page
        $_SESSION["errors"] = $errors;
        redirect("../edit_lecture.php");
    }
} else {
    // Handle case where the request method is not POST
    echo "No method";
}
?>
