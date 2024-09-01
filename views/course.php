<?php
// Include the configuration file
require_once "src/config.php";

// Check if a student is logged in by verifying if 'student_id' is set in the session
if (isset($_SESSION["student_id"])) {
  // Get the logged-in student's ID from the session
  $student_id = $_SESSION["student_id"];
  
  // Establish a connection to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "edumanage");

  // Check the connection to ensure it was successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Define the SQL query to retrieve course details for the logged-in student
  $sql = "SELECT s.course_id, c.*
          FROM students s
          JOIN courses c ON s.course_id = c.course_id
          WHERE s.student_id = '$student_id'";

  // Execute the query and store the result
  $result = mysqli_query($conn, $sql);

  // Close the connection to the database
  mysqli_close($conn);
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
    <title>Courses Table</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Center text and reduce font size in table cells */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 14px; /* Reduce font size to save space */
        }
        /* Darken the table header background */
        .thead-dark th {
            background-color: #343a40;
            color: white;
        }
        /* Set border style for table cells */
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        /* Alternate row colors for better readability */
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        /* Highlight row on hover */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        /* Maximize container width and remove padding for full-screen view */
        .container {
            max-width: 100%; /* Set container width to fill the screen */
            padding: 0; /* Remove padding to save space */
        }
        /* Remove margins and prevent horizontal scrolling */
        body {
            margin: 0;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Courses</h2>
            <table class="table table-striped table-bordered table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>Title</th>
                  <th>Year</th>
                  <th>Major</th>
                  <th>Lecture Times</th>
                  <th>Lecture Name</th>
                  <th>Lecture Location</th>
                </tr>
              </thead>
              <tbody>
                  <!-- Check if there are course results to display -->
                  <?php if($result): ?>
                    <!-- Loop through each course and display its details -->
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row["course_name"]; ?></td>
                        <td><?= $row["year"]; ?></td>
                        <td><?= $row["major"]; ?></td>
                        <td><?= $row["lecture_times"]; ?></td>
                        <td><?= $row["lecturer_name"]; ?></td>
                        <td><?= $row["lecture_location"]; ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include the footer file -->
    <?php require_once ROOT_PATH . "inc/footer.php"; ?>
</body>
</html>
