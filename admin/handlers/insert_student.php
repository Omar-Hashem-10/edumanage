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
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $course_id = $_POST["course_id"];

    // Validate the first name
    if (required_val($first_name)) {
        $errors[] = "First Name Is Required";
    } elseif (min_val($first_name, 3)) {
        $errors[] = "First Name Must Be Greater Than 3 Chars";
    } elseif (max_val($first_name, 50)) {
        $errors[] = "First Name Must Be Smaller Than 50 Chars";
    }

    // Validate the last name
    if (required_val($last_name)) {
        $errors[] = "Last Name Is Required";
    } elseif (min_val($last_name, 3)) {
        $errors[] = "Last Name Must Be Greater Than 3 Chars";
    } elseif (max_val($last_name, 50)) {
        $errors[] = "Last Name Must Be Smaller Than 50 Chars";
    }

    // Validate the phone number
    if (required_val($phone_number)) {
        $errors[] = "Phone Number Is Required";
    } elseif (!phone_valid($phone_number)) {
        $errors[] = "Phone Number Is Not Valid";
    }

    // Validate the email
    if (required_val($email)) {
        $errors[] = "Email Is Required";
    }

    // Validate the password
    if (required_val($password)) {
        $errors[] = "Password Is Required";
    }

    // Validate the course ID
    if (required_val($course_id)) {
        $errors[] = "Course Id Is Required";
    }

    // If there are no errors, proceed with data insertion
    if (empty($errors)) {
        // Establish database connection
        $conn = mysqli_connect("localhost", "root", "", "edumanage");

        // Prepare SQL query to insert student data into the database
        $sql = "INSERT INTO `students` (`first_name`, `last_name`, `email`, `password`, `phone_number`, `course_id`)
                VALUES
                (
                    '$first_name',
                    '$last_name',
                    '$email',
                    '$password',
                    '$phone_number',
                    '$course_id'
                )";

        // Execute the SQL query
        mysqli_query($conn, $sql);

        // Check if the insertion was successful
        if (mysqli_affected_rows($conn)) {
            $_SESSION["success"] = "Data inserted successfully";
            redirect("../students_group.php");
        }
    } else {
        // Store errors in session and redirect back to the form
        $_SESSION["errors"] = $errors;
        redirect("../add_student.php");
    }
} else {
    // Handle case where the request method is not POST
    echo "No method";
}
?>
