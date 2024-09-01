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
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $course_id = $_POST["course"];
    $student_id = $_POST["student_id"];

    // Validate first name
    if (required_val($first_name)) {
        $errors[] = "First Name Is Required";
    } elseif (min_val($first_name, 3)) {
        $errors[] = "First Name Must Be Greater Than 3 Chars";
    } elseif (max_val($first_name, 50)) {
        $errors[] = "First Name Must Be Smaller Than 50 Chars";
    }

    // Validate last name
    if (required_val($last_name)) {
        $errors[] = "Last Name Is Required";
    } elseif (min_val($last_name, 3)) {
        $errors[] = "Last Name Must Be Greater Than 3 Chars";
    } elseif (max_val($last_name, 50)) {
        $errors[] = "Last Name Must Be Smaller Than 50 Chars";
    }

    // Validate email
    if (required_val($email)) {
        $errors[] = "Email Is Required";
    }

    // Validate phone number
    if (required_val($phone_number)) {
        $errors[] = "Phone Number Is Required";
    } elseif (!phone_valid($phone_number)) {
        $errors[] = "Phone Number Is Not Valid";
    }

    // If there are no errors, proceed with database update
    if (empty($errors)) {
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "edumanage");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL query based on whether course_id is provided
        if (isset($course_id)) {
            $sql = "UPDATE `students` SET `first_name` = '$first_name',
                                            `last_name` = '$last_name',
                                            `email` = '$email',
                                            `phone_number` = '$phone_number',
                                            `course_id` = '$course_id'
                                        WHERE `student_id` = '$student_id'";
        } else {
            $sql = "UPDATE `students` SET `first_name` = '$first_name',
                                            `last_name` = '$last_name',
                                            `email` = '$email',
                                            `phone_number` = '$phone_number'
                                        WHERE `student_id` = '$student_id'";
        }

        // Execute the SQL query
        mysqli_query($conn, $sql);

        // Check for SQL errors
        if (mysqli_error($conn)) {
            $_SESSION["errors"] = [mysqli_error($conn)];
            redirect("../edit_student.php");
        }

        // Check if any rows were affected by the update
        $affected_rows = mysqli_affected_rows($conn);
        if ($affected_rows > 0) {
            $_SESSION["success"] = "Data updated successfully";
            redirect("../students_group.php");
        } else {
            // Redirect if no rows were affected
            redirect("../students_group.php");
        }
    } else {
        // Store errors in session and redirect to edit page
        $_SESSION["errors"] = $errors;
        redirect("../edit_student.php");
    }
} else {
    // Handle case where the request method is not POST
    echo "Invalid request method";
}
?>
