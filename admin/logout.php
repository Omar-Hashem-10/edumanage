<?php
require_once("../src/config.php");
require_once ROOT_PATH . "core/functions.php";
session_start();

// Store important session data that needs to be retained
$keep = [];
if (isset($_SESSION['student_id'])) {
    $keep['student_id'] = $_SESSION['student_id'];
}

// End the current session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Start a new session
session_start(); // Initialize a new session

// Restore the important data back into the new session
if (!empty($keep)) {
    $_SESSION = array_merge($_SESSION, $keep); // Merge retained data into the new session
}

// Redirect the user to the login page
redirect(url("login")); // Redirect function to go to the login page
exit(); // Terminate the script
?>
