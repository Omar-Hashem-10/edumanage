<?php session_start(); ?>
<?php
  // Check if 'id' is set in the GET request and store it in the session
  if (isset($_GET["id"])) {
    $_SESSION["exam_id"] = $_GET["id"];
  }
  $exam_id = $_SESSION["exam_id"];

  // Connect to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "edumanage");

  // SQL query to fetch details of the specific exam along with course details
  $sql = "SELECT 
            exams.exam_id,
            exams.exam_name,
            exams.exam_date,
            exams.start_time,
            exams.end_time,
            exams.exam_link,
            courses.course_name,
            courses.year,
            courses.major
        FROM 
            exams
        INNER JOIN 
            courses 
        ON 
            exams.course_id = courses.course_id
        WHERE 
            exams.exam_id = '$exam_id'";

  // Execute the query
  $result = mysqli_query($conn, $sql);
  
  // Fetch the exam details as an associative array
  $row = mysqli_fetch_assoc($result);

  // If a result is found, store the exam and course details in the session
  if ($row) {
    $_SESSION["major"] = $row["major"]; 
    $_SESSION["year"] = $row["year"];
    $_SESSION["exam_date"] = $row["exam_date"];
    $_SESSION["start_time"] = $row["start_time"];
    $_SESSION["end_time"] = $row["end_time"];
    $_SESSION["exam_link"] = $row["exam_link"];
    $_SESSION["exam_name"] = $row["exam_name"];
  }
?>
<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Data Form</title>
    <style>
        /* Basic styling for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Container styling */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        /* Styling for the heading */
        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Styling for the form container */
        .exam-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Styling for form groups */
        .form-group {
            margin-bottom: 15px;
        }

        /* Styling for form labels */
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        /* Styling for form inputs and selects */
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Styling for textarea fields */
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }

        /* Styling for form buttons */
        .form-group button {
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Hover effect for the button */
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php require_once("inc/header.php"); ?>
    <?php require_once("inc/nav.php"); ?>

    <div class="container">
        <h2 class="mt-4 text-center">Exam Data Form</h2>
        
        <!-- Include error messages if available -->
        <?php require_once("../inc/errors.php"); ?>
        
        <!-- Form for editing exam details -->
        <div class="exam-form">
            <form action="handlers/update_exam.php?id=<?= $exam_id; ?>" method="post">
                <!-- Disabled input field for Major (not editable) -->
                <div class="form-group">
                    <label for="major">Major:</label>
                    <input type="text" id="major" name="major" value="<?= htmlspecialchars($_SESSION["major"]); ?>" disabled>
                </div>

                <!-- Disabled input field for Year (not editable) -->
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" id="year" name="year" value="<?= htmlspecialchars($_SESSION["year"]); ?>" disabled>
                </div>

                <!-- Input field for Exam Name -->
                <div class="form-group">
                    <label for="exam_name">Exam Name:</label>
                    <input type="text" id="exam_name" name="exam_name" value="<?= htmlspecialchars($_SESSION["exam_name"]); ?>">
                </div>

                <!-- Input field for Exam Date -->
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="<?= htmlspecialchars($_SESSION["exam_date"]); ?>">
                </div>

                <!-- Input field for Start Time -->
                <div class="form-group">
                    <label for="start-time">Start Time:</label>
                    <input type="time" id="start-time" name="start-time" value="<?= htmlspecialchars($_SESSION["start_time"]); ?>">
                </div>

                <!-- Input field for End Time -->
                <div class="form-group">
                    <label for="end-time">End Time:</label>
                    <input type="time" id="end-time" name="end-time" value="<?= htmlspecialchars($_SESSION["end_time"]); ?>">
                </div>

                <!-- Input field for Exam Link -->
                <div class="form-group">
                    <label for="exam-link">Exam Link:</label>
                    <input type="url" id="exam-link" name="exam-link" value="<?= htmlspecialchars($_SESSION["exam_link"]); ?>">
                </div>

                <!-- Submit button for the form -->
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once("inc/footer.php"); ?>
</body>
</html>
