<?php

// Start the session
session_start();

// Include necessary functions
require_once("../../core/functions.php");

// Check if 'id' is present in the GET request
if (isset($_GET["id"])) {
    // Retrieve student ID from GET request
    $student_id = $_GET["id"];
    
    // Establish a connection to the database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Check if the connection was successful
    if (!$conn) {
        // Set error message and redirect if connection fails
        $_SESSION["error"] = "Connection to database failed: " . mysqli_connect_error();
        redirect("../students_group.php");
        exit();
    }

    // Prepare SQL query to delete student record by ID
    $sql = "DELETE FROM `students` WHERE student_id = '$student_id'";
    
    // Execute the SQL query
    mysqli_query($conn, $sql);

    // Check if any rows were affected by the query
    if (mysqli_affected_rows($conn) > 0) {
        // Set success message if data was deleted
        $_SESSION["success"] = "Data deleted successfully";
    } else {
        // Set error message if no rows were affected
        $_SESSION["error"] = "Failed to delete data or no data found";
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect to students group page
    redirect("../students_group.php");
} else {
    // Set error message if no student ID was selected
    $_SESSION["error"] = "No student selected";
    redirect("../students_group.php");
}

?>
