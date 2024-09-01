<?php session_start(); ?>
<?php require_once "../src/config.php"; ?>
<?php require_once("../core/functions.php"); ?>

<?php
    // Check if 'id' is set in the GET request to determine which lecture to edit
    if (isset($_GET["id"])) {
        // Store the lecture ID in the session
        $_SESSION["id"] = $_GET["id"];
        $lecture_id = $_SESSION["id"];

        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "edumanage");

        // SQL query to fetch details of the specific lecture
        $sql = "SELECT * FROM `lectures` WHERE lecture_id = '$lecture_id'";
        $result = mysqli_query($conn, $sql);

        // Fetch the lecture details as an associative array
        $row = mysqli_fetch_assoc($result);
    }
?>

<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lecture</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Basic styling for the body */
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif;
        }

        /* Container styling */
        .container {
            max-width: 600px; /* Limit the width of the form container */
            padding: 20px;
        }

        /* Card styling for the form */
        .card {
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            box-shadow: 0 0 1rem rgba(0,0,0,0.1);
            background-color: #ffffff;
        }

        /* Padding inside the card body */
        .card-body {
            padding: 20px;
        }

        /* Styling for the title */
        h2 {
            color: #343a40; /* Darker text color for title */
            margin-bottom: 20px; /* Space below title */
            text-align: center;
        }

        /* Styling for form labels */
        .form-group label {
            font-weight: bold;
            color: #495057; /* Darker text color for labels */
        }

        /* Styling for form controls */
        .form-control {
            border-radius: .25rem;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0,0,0,.075);
        }

        /* Styling for the primary button */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1rem;
            padding: .375rem .75rem;
            border-radius: .25rem;
        }

        /* Hover effect for the primary button */
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Focus effect for form controls */
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 .2rem rgba(38, 143, 255, .25);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Edit Lecture</h2>

        <!-- Include error messages if available -->
        <?php require_once("../inc/errors.php"); ?>
        
        <!-- Card containing the form for editing the lecture -->
        <div class="card">
            <div class="card-body">
                <form action="handlers/update_lecture.php" method="POST">
                    <!-- Hidden input to store the lecture ID -->
                    <input type="hidden" name="lecture_id" value="<?= $row["lecture_id"]; ?>">
                    
                    <!-- Input field for the lecture topic -->
                    <div class="form-group">
                        <label for="topic">Topic</label>
                        <input type="text" class="form-control" id="topic" name="topic" value="<?= $row["topic"]; ?>">
                    </div>
                    
                    <!-- Input field for the lecture link -->
                    <div class="form-group">
                        <label for="drive_link">Lecture Link</label>
                        <input type="url" class="form-control" id="drive_link" name="drive_link" value="<?= $row["drive_link"] ?>">
                    </div>
                    
                    <!-- Submit button for updating the lecture -->
                    <button type="submit" class="btn btn-primary">Update Lecture</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php require_once("inc/footer.php"); ?>
