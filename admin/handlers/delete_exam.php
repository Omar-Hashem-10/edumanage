<?php

// Start the session
session_start();

// Include necessary functions
require_once("../../core/functions.php");

// Check if 'id' is present in the GET request
if (isset($_GET["id"])) {
    // Retrieve exam ID from GET request
    $exam_id = $_GET["id"];
    
    // Establish a connection to the database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Prepare SQL query to delete exam record by ID
    $sql = "DELETE FROM exams WHERE exam_id = '$exam_id'";
    
    // Execute the SQL query
    mysqli_query($conn, $sql);

    // Check if any rows were affected by the query
    if (mysqli_affected_rows($conn)) {
        // Set success message if data was deleted
        $_SESSION["success"] = "Data deleted successfully";
    }

    // Redirect to view exam page
    redirect("../view_exam.php");

    // Close the database connection
    mysqli_close($conn);
} else {
    // Print error message if no exam ID was provided
    echo "No method";
}

?>
