<?php
session_start(); // Start a new or resume an existing session
require_once "src/config.php"; // Include the configuration file
require_once ROOT_PATH . 'core/functions.php'; // Include core functions using the ROOT_PATH constant
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set the character encoding for the document -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensure proper scaling on mobile devices -->
    <title>EduManage Login</title> <!-- Page title -->
    <style>
        /* Styling for the body to center the content */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Styling for the card containing the form */
        .card {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            text-align: center;
        }

        /* Styling for the card header */
        .card h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
        }

        /* Styling for form groups */
        .form-group {
            margin-bottom: 20px;
        }

        /* Styling for form labels */
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            text-align: left;
        }

        /* Styling for form inputs */
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Styling for the submit button */
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 20px 0;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for the submit button */
        .btn:hover {
            background-color: #0056b3;
        }

        /* Styling for muted text */
        .text-muted {
            color: #6c757d;
            font-size: 14px;
        }

        /* Styling for error alert messages */
        .alert-danger {
            color: red;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login</h2>
        <?php require_once("inc/errors.php"); ?> <!-- Include error messages if any -->
        <?php require_once("inc/success.php"); ?> <!-- Include success messages if any -->
        <form action="handlers/login_process.php" method="POST"> <!-- Form submission for login -->
            <div class="form-group">
                <label for="email">Email:</label> <!-- Label for email input -->
                <input type="email" id="email" name="email"> <!-- Email input field -->
            </div>
            <div class="form-group">
                <label for="password">Password:</label> <!-- Label for password input -->
                <input type="password" id="password" name="password"> <!-- Password input field -->
            </div>
            <button type="submit" class="btn">Login</button> <!-- Submit button -->
        </form>
    </div>
</body>
</html>
