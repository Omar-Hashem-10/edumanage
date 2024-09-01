<?php session_start(); ?>
<?php require_once "../src/config.php"; ?>
<?php require_once("../core/functions.php"); ?>

<?php
    // Check if 'id' is set in the GET request to determine if we are editing a specific student
    if(isset($_GET["id"]))
    {
        // Set session variable for the student ID to be edited
        $_SESSION["edit_student_id"] = $_GET["id"];
        $student_id = $_GET["id"];
        
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "edumanage");
        
        // SQL query to fetch student details and associated course
        $sql = "SELECT * 
        FROM `students` s
        JOIN `courses` c
        ON c.course_id = s.course_id
        WHERE student_id = '$student_id'
        ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    else
    {
        // Retrieve student ID from session if not set in the GET request
        $student_id = $_SESSION["edit_student_id"];
        
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "edumanage");
        
        // SQL query to fetch student details and associated course
        $sql = "SELECT * 
        FROM `students` s
        JOIN `courses` c
        ON c.course_id = s.course_id
        WHERE student_id = '$student_id'
        ";
        $result = mysqli_query($conn, $sql);
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
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Basic styling for the body and html to ensure full height and no scroll */
        html, body {
            height: 100%;
            margin: 0;
            background-color: #f8f9fa;
            overflow: hidden; /* Ensure no scroll appears */
        }
        /* Styling for the container to fill the viewport and add padding */
        .container {
            width: 100%;
            height: 100vh; /* Use 100vh to fill the entire screen height */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box; /* Ensure padding is included in width/height */
        }
        /* Styling for form labels */
        .form-group label {
            font-weight: bold;
        }
        /* Styling for form controls */
        .form-control {
            border-radius: 0.25rem;
        }
        /* Styling for the primary button */
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.25rem;
            width: 100%;
        }
        /* Hover effect for the primary button */
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Edit Student</h2>
        
        <!-- Include error and success messages if available -->
        <?php require_once("../inc/errors.php"); ?>
        <?php require_once("../inc/success.php"); ?>
        
        <!-- Form for editing student details -->
        <form action="handlers/update_student.php" method="POST">
            <!-- Hidden input for student ID -->
            <div class="form-group">
                <input type="text" class="form-control" id="student_id" name="student_id" value="<?= $row["student_id"]; ?>" hidden>
            </div>
            
            <!-- Input for student's first name -->
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $row["first_name"]; ?>" required>
            </div>
            
            <!-- Input for student's last name -->
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row["last_name"]; ?>" required>
            </div>
            
            <!-- Input for student's email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $row["email"]; ?>" required>
            </div>
            
            <!-- Input for student's phone number -->
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $row["phone_number"]; ?>" required>
            </div>
            
            <!-- Display student's year (disabled field) -->
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" id="year" name="year" value="<?= $row["year"]; ?>" disabled>
            </div>
            
            <!-- Display student's major (disabled field) -->
            <div class="form-group">
                <label for="id">Major:</label>
                <input type="text" class="form-control" id="major" name="major" value="<?= $row["major"]; ?>" disabled>
            </div>
            
            <!-- Dropdown for selecting a course -->
            <div class="form-group">
                <label for="course">Course</label>
                <select id="course" name="course" class="form-control">
                    <option value="<?= $row["course_id"]; ?>">Select a Course</option>
                    <!-- Options for course selection -->
                    <option value="1">First Year: Arabic Language</option>
                    <option value="2">First Year: Geography</option>
                    <option value="3">First Year: Chemistry</option>
                    <option value="4">First Year: Physics</option>
                    <option value="5">First Year: English Language</option>
                    <option value="6">Second Year: Arabic Language</option>
                    <option value="7">Second Year: French Language</option>
                    <option value="8">Third Year: Science</option>
                    <option value="9">Third Year: Social Studies</option>
                    <option value="10">Third Year: Arabic Language</option>
                    <option value="11">Third Year: English Language</option>
                    <option value="12">Fourth Year: Arabic Language</option>
                    <option value="13">Fourth Year: English Language</option>
                    <option value="14">Fourth Year: Geography</option>
                    <option value="15">Fourth Year: Chemistry</option>
                    <option value="16">Fourth Year: Biology</option>
                    <option value="17">Fourth Year: Mathematics</option>
                </select>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<?php require_once("inc/footer.php"); ?>
