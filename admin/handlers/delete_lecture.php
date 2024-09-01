<?php

// Start the session
session_start();

// Include necessary functions
require_once("../../core/functions.php");

// Check if 'id' is present in the GET request
if (isset($_GET["id"])) {
    // Retrieve lecture ID from GET request
    $lecture_id = $_GET["id"];
    
    // Establish a connection to the database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Prepare SQL query to delete lecture record by ID
    $sql = "DELETE FROM `lectures` WHERE lecture_id = '$lecture_id'";
    
    // Execute the SQL query
    mysqli_query($conn, $sql);

    // Check if any rows were affected by the query
    if (mysqli_affected_rows($conn)) {
        // Set success message if data was deleted
        $_SESSION["success"] = "Data deleted successfully";
    }

    // Redirect to view lecture page
    redirect("../view_lecture.php");

    // Close the database connection
    mysqli_close($conn);
} else {
    // Set error message if no lecture ID was selected
    $_SESSION["error"] = "No lecture selected";
    
    // Redirect to view lecture page
    redirect("../view_lecture.php");
}

?>
