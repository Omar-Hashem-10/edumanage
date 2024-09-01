<?php
require_once("core/functions.php"); // Include the core functions file
session_start(); // Start the session

// Store the data that you want to keep
$keep = [];
if (isset($_SESSION['admin_id'])) {
    $keep['admin_id'] = $_SESSION['admin_id']; // Save the admin ID if it exists in the session
}

// End the current session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Start a new session
session_start(); // Start a new session

// Reassign the important data back to the session
if (!empty($keep)) {
    $_SESSION = array_merge($_SESSION, $keep); // Merge the saved data into the new session
}

// Redirect the user to the login page
redirect(url("login")); // Redirect to the login page using a helper function
exit(); // Ensure no further code is executed
?>
