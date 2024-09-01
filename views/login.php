<?php
session_start(); // Start the session at the beginning of the script
require_once "src/config.php"; // Include the configuration file
require_once ROOT_PATH . 'core/functions.php'; // Include the core functions file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set the character encoding for the document -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensure the page is responsive on different devices -->
    <title>EduManage Login</title> <!-- Set the title of the page -->
    <style>
        /* Styling for the body */
        body {
            font-family: Arial, sans-serif; /* Set the font family */
            background-color: #f4f4f4; /* Set the background color */
            display: flex; /* Use flexbox for alignment */
            justify-content: center; /* Center the content horizontally */
            align-items: center; /* Center the content vertically */
            height: 100vh; /* Set the height to full view height */
            margin: 0; /* Remove default margin */
        }

        /* Styling for the card container */
        .card {
            background-color: #fff; /* Set the background color */
            padding: 40px; /* Set padding */
            border-radius: 8px; /* Round the corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            width: 100%; /* Set width to 100% */
            max-width: 400px; /* Set a maximum width */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            text-align: center; /* Center the text */
        }

        /* Styling for the card title */
        .card h2 {
            margin-bottom: 30px; /* Add space below the title */
            color: #333; /* Set the text color */
            font-size: 28px; /* Set the font size */
        }

        /* Styling for form group elements */
        .form-group {
            margin-bottom: 20px; /* Add space below each form group */
        }

        /* Styling for form labels */
        .form-group label {
            display: block; /* Make the label a block element */
            margin-bottom: 8px; /* Add space below the label */
            color: #333; /* Set the label color */
            text-align: left; /* Align the label text to the left */
        }

        /* Styling for input fields */
        .form-group input {
            width: 100%; /* Set the input width to 100% */
            padding: 10px; /* Add padding inside the input */
            border: 1px solid #ccc; /* Add a border */
            border-radius: 5px; /* Round the corners of the input */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        /* Styling for the submit button */
        .btn {
            display: block; /* Make the button a block element */
            width: 100%; /* Set the button width to 100% */
            padding: 15px; /* Add padding inside the button */
            margin: 20px 0; /* Add vertical margin */
            background-color: #007bff; /* Set the background color */
            color: #fff; /* Set the text color */
            text-decoration: none; /* Remove underline from the text */
            border-radius: 5px; /* Round the corners of the button */
            transition: background-color 0.3s ease; /* Add a transition effect for the background color */
        }

        /* Change the background color when the button is hovered */
        .btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Styling for muted text */
        .text-muted {
            color: #6c757d; /* Set the text color */
            font-size: 14px; /* Set the font size */
        }

        /* Styling for error alerts */
        .alert-danger {
            color: red; /* Set the text color */
            background-color: #f8d7da; /* Set the background color */
            border-color: #f5c6cb; /* Set the border color */
            padding: 10px; /* Add padding inside the alert */
            border-radius: 5px; /* Round the corners of the alert */
            margin-bottom: 15px; /* Add space below the alert */
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login</h2> <!-- Page title -->
        <?php require_once("inc/errors.php"); ?> <!-- Include errors.php to display error messages -->
        <?php require_once("inc/success.php"); ?> <!-- Include success.php to display success messages -->
        <form action="handlers/login_process.php" method="POST"> <!-- Form action to handle login -->
            <div class="form-group">
                <label for="email">Email:</label> <!-- Label for the email input -->
                <input type="email" id="email" name="email"> <!-- Input field for the email -->
            </div>
            <div class="form-group">
                <label for="password">Password:</label> <!-- Label for the password input -->
                <input type="password" id="password" name="password"> <!-- Input field for the password -->
            </div>
            <button type="submit" class="btn">Login</button> <!-- Submit button for the form -->
        </form>
    </div>
</body>
</html>
