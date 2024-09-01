<?php
// Include the configuration file
require_once "src/config.php";

// Check if a student is logged in by verifying if 'student_id' is set in the session
if (isset($_SESSION["student_id"])) {
  // Get the logged-in student's ID from the session
  $student_id = $_SESSION["student_id"];
  
  // Establish a connection to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "edumanage");

  // Check if the connection to the database was successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Query the database to retrieve the course ID for the logged-in student
  $sql = "SELECT course_id FROM `students` WHERE student_id = '$student_id'";
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful and if a course ID was found
  if ($result && mysqli_num_rows($result) > 0) {
      // Fetch the course ID from the result
      $row = mysqli_fetch_assoc($result);
      $course_id = $row['course_id'];

  } else {
      // Display a message if no course was found for the student
      echo "No course found for this student.";
  }

  // Query the database to retrieve all exams associated with the retrieved course ID
  $sql = "SELECT * FROM `exams` WHERE course_id = '$course_id'";
  $result = mysqli_query($conn, $sql);
}

// Include the header and navigation files
require_once ROOT_PATH . "inc/header.php";
require_once ROOT_PATH . "inc/nav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exams</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom styling for the blue button */
        .btn-custom-blue {
            background-color: #007bff; 
            border-color: #007bff;
            color: #fff; 
            padding: 8px 12px; 
            font-size: 16px; 
        }
    </style>
</head>
<body>
    <!-- Main container for the page content -->
    <div class="container mt-4">
        <h1 class="text-center mb-4">Exams</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Marks</th>
                    <th>Passing Marks</th>
                    <th>Exam Link</th>
                </tr>
            </thead>
            <tbody>
              <!-- Check if there are exam results to display -->
              <?php if($result): ?>
                <!-- Loop through each exam and display its details -->
                <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row["exam_name"]; ?></td>
                    <td><?= $row["start_time"]; ?></td>
                    <td><?= $row["end_time"]; ?></td>
                    <td><?= $row["total_marks"]; ?></td>
                    <td><?= $row["passing_marks"] ?></td>
                    <td>
                        <!-- Button with a link to the exam -->
                        <a href="<?= $row["exam_link"]; ?>" class="btn btn-custom-blue" target="_blank">
                        <i class='bx bx-spreadsheet' ></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Include jQuery, Popper.js, and Bootstrap JS for interactivity and responsive design -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!-- Include the footer file -->
<?php require_once ROOT_PATH . "inc/footer.php"; ?>
