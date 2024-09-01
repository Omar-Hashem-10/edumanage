<?php
// Include the configuration file
require_once "src/config.php";

// Include the header and navigation files
require_once ROOT_PATH . "inc/header.php";
require_once ROOT_PATH . "inc/nav.php";

// Initialize variable for lecture ID
$lecture_id = null;

// Check if 'lecture_id' is present in the query string and is numeric
if(isset($_GET["lecture_id"]) && is_numeric($_GET["lecture_id"])) {
    $lecture_id = $_GET["lecture_id"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Assignment</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Center the container and set a maximum width */
        .container {
            max-width: 600px;
            margin-top: 5rem; /* Add top margin */
        }

        /* Style the form controls */
        .form-control {
            border-radius: 0.25rem; /* Round the corners */
            border-color: #ced4da; /* Set border color */
        }

        .form-control:focus {
            border-color: #007bff; /* Change border color on focus */
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Add shadow on focus */
        }

        /* Style the primary button */
        .btn-primary {
            background-color: #007bff; /* Set background color */
            border-color: #007bff; /* Set border color */
            padding: 10px 20px; /* Add padding */
            border-radius: 0.25rem; /* Round the corners */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Change background color on hover */
            border-color: #004085; /* Change border color on hover */
        }

        /* Style the success alert */
        .alert-success {
            background-color: #d4edda; /* Set background color */
            color: #155724; /* Set text color */
            border-color: #c3e6cb; /* Set border color */
        }

        /* Style the danger alert */
        .alert-danger {
            background-color: #f8d7da; /* Set background color */
            color: #721c24; /* Set text color */
            border-color: #f5c6cb; /* Set border color */
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h1 class="text-center mb-4">Submit Assignment</h1>
            <!-- Include error and success messages -->
            <?php require_once("inc/errors.php"); ?>
            <?php require_once("inc/success.php"); ?>
            <!-- Assignment submission form -->
            <form method="POST" action="handlers/send-assignment.php?lecture_id=<?= $lecture_id ?>">
                <div class="form-group">
                    <label for="task_link">Task Link:</label>
                    <input type="url" class="form-control" id="task_link" name="task_link" placeholder="Enter task link" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php require_once ROOT_PATH . "inc/footer.php"; ?>
