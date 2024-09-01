<?php session_start(); ?>
<?php 

// Check if the course ID is passed in the URL
if(isset($_GET["id"])) {
    $course_id = $_GET["id"];
    
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");
    
    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to fetch course details based on course ID
    $sql = "SELECT * FROM `courses` WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if any rows are returned
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle case where no data is found
        die("No course found with the provided ID.");
    }

    // Check if the required fields are set in the result
    if(isset($row["course_name"]) && isset($row["major"]) && isset($row["year"]) && isset($row["course_id"]))
    {
        // Store course details in session variables
        $_SESSION["course_id"] = htmlspecialchars($row["course_id"]);
        $_SESSION["course_name"] = htmlspecialchars($row["course_name"]);
        $_SESSION["major"] = htmlspecialchars($row["major"]);
        $_SESSION["year"] = htmlspecialchars($row["year"]);
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>

<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Exam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Create Exam</h1>
        
        <!-- Include error and success messages if any -->
        <?php require_once("../inc/errors.php"); ?>
        <?php require_once("../inc/success.php"); ?>
        
        <!-- Form to create a new exam -->
        <form action="handlers/submit_exam.php" method="POST">
            <div class="form-group">
                <!-- Input for exam name -->
                <label for="examName">Exam Name</label>
                <input type="text" class="form-control" id="examName" name="exam_name" required>
            </div>
            <div class="form-group">
                <!-- Readonly field for course name -->
                <label for="courseId">Course Name</label>
                <input type="text" id="courseId" name="course_name" value="<?= $_SESSION["course_name"] ?>" class="form-control readonly-input" readonly>
            </div>
            <div class="form-group">
                <!-- Readonly field for major -->
                <label for="major">Major</label>
                <input type="text" id="major" name="major" value="<?= $_SESSION["major"] ?>" class="form-control readonly-input" readonly>
            </div>
            <div class="form-group">
                <!-- Readonly field for year -->
                <label for="year">Year</label>
                <input type="text" id="year" name="year" value="<?= $_SESSION["year"] ?>" class="form-control readonly-input" readonly>
            </div>
            <!-- Hidden field to store course ID -->
            <input type="hidden" id="courseIdHidden" name="course_id" value="<?= $_SESSION["course_id"] ?>">    
            <div class="form-group">
                <!-- Input for exam link -->
                <label for="examLink">Exam Link</label>
                <input type="text" id="examLink" name="exam_link" class="form-control" required>
            </div>
            <div class="form-group">
                <!-- Input for start time -->
                <label for="startTime">Start Time</label>
                <input type="time" class="form-control" id="startTime" name="start_time" required>
            </div>
            <div class="form-group">
                <!-- Input for end time -->
                <label for="endTime">End Time</label>
                <input type="time" class="form-control" id="endTime" name="end_time" required>
            </div>
            <div class="form-group">
                <!-- Input for total marks -->
                <label for="totalMarks">Total Marks</label>
                <input type="number" class="form-control" id="totalMarks" name="total_marks" required>
            </div>
            <div class="form-group">
                <!-- Input for passing marks -->
                <label for="passingMarks">Passing Marks</label>
                <input type="number" class="form-control" id="passingMarks" name="passing_marks" required>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php require_once("inc/footer.php"); ?>
