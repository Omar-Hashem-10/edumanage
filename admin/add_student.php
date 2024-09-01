<?php session_start(); ?>
<?php require_once "../src/config.php"; ?>
<?php require_once("../core/functions.php"); ?>
<?php
    // Check if 'id' is present in the GET request and store it in the session
    if (isset($_GET["id"])) {
        $_SESSION["view_id"] = $_GET["id"];
    }

    // Retrieve the course ID from the session
    $course_id = $_SESSION["view_id"];

    // Connect to the MySQL database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // SQL query to fetch course details for the specific course ID
    $sql = "SELECT * FROM `courses` WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $sql);
    
    // Fetch the course details from the query result
    $row = mysqli_fetch_assoc($result);
?>
<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<style>
    /* Style for the entire page including body and html */
    body, html {
        height: 100%;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    /* Styling for the form container */
    .form-container {
        max-width: 600px;
        width: 100%;
        padding: 20px;
        margin: 20px auto; /* Center the form horizontally */
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Styling for the form heading */
    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #343a40;
    }

    /* Styling for form labels */
    .form-container .form-label {
        font-weight: bold;
        color: #495057;
    }

    /* Styling for form controls */
    .form-container .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        box-shadow: none;
        transition: border-color 0.3s ease-in-out;
    }

    /* Styling for form controls on focus */
    .form-container .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Styling for the primary button */
    .form-container .btn-primary {
        width: 100%;
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    /* Styling for the primary button on hover */
    .form-container .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

<div class="form-container">
    <h2>Add Student</h2>
    <!-- Include error messages if any -->
    <?php require_once("../inc/errors.php"); ?>
    <form action="handlers/insert_student.php" method="POST">
        <div class="mb-3">
            <!-- Input for the student's first name -->
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" >
        </div>
        <div class="mb-3">
            <!-- Input for the student's last name -->
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" >
        </div>
        <div class="mb-3">
            <!-- Input for the student's phone number -->
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" >
        </div>
        <div class="mb-3">
            <!-- Input for the student's email -->
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
        <div class="mb-3">
            <!-- Input for the student's password -->
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <div class="mb-3">
            <!-- Hidden input to store course ID -->
            <input id="course_id" name="course_id" value="<?= $row["course_id"] ?>" hidden>
        </div>
        <div class="mb-3">
            <!-- Display course information (read-only) -->
            <label for="course_id_dis" class="form-label">Course</label>
            <input type="text" class="form-control" id="course_id_dis" name="course_id_dis" value="<?= $row["year"] . ":  " . $row["major"] ?>" disabled>
        </div>

        <!-- Submit button for the form -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>

<?php require_once("inc/footer.php"); ?>
