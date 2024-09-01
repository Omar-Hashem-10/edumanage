<?php
  session_start(); // Start the session to track the user

  // Check if the 'id' parameter is set in the URL and save it to the session
  if (isset($_GET["id"])) {
    $_SESSION["view_exam"] = $_GET["id"];
  }

  // Retrieve the course ID from the session
  $course_id = $_SESSION["view_exam"];

  // Establish a connection to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "edumanage");

  // Check if the connection was successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // SQL query to fetch exam data along with course details
  $sql = "SELECT 
      exams.*, 
      courses.major, 
      courses.year 
    FROM 
      exams
    INNER JOIN 
      courses 
    ON 
      exams.course_id = courses.course_id
    WHERE 
      exams.course_id = '$course_id'";
    
  // Execute the SQL query
  $result = mysqli_query($conn, $sql);
?>
<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Data Table</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .exam-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .exam-table th, .exam-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .exam-table th {
            background-color: #007bff;
            color: #fff;
        }

        .exam-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .exam-table tr:hover {
            background-color: #e9ecef;
        }

        .btn-custom-blue {
            background-color: #007bff; /* Custom blue color */
            border-color: #007bff; /* Border color */
            color: #fff; /* Text color */
            padding: 8px 12px; /* Padding */
            font-size: 16px; /* Font size */
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #ffc107; /* Yellow color for edit button */
            border-color: #ffc107;
        }

        .btn-edit:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-delete {
            background-color: #dc3545; /* Red color for delete button */
            border-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn i {
            margin-right: 4px; /* Space between icon and text */
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mt-4 text-center">Exam Data</h2>
        <?php require_once("../inc/errors.php"); ?>
        <?php require_once("../inc/success.php"); ?>
        <table class="exam-table">
            <thead>
                <tr>
                    <th>Major</th> <!-- Column for course major -->
                    <th>Year</th> <!-- Column for course year -->
                    <th>Date</th> <!-- Column for exam date -->
                    <th>Start Time</th> <!-- Column for exam start time -->
                    <th>End Time</th> <!-- Column for exam end time -->
                    <th>Exam Link</th> <!-- Column for exam link -->
                    <th>Edit</th> <!-- Column for edit button -->
                    <th>Delete</th> <!-- Column for delete button -->
                </tr>
            </thead>
            <tbody>
              <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row["major"]); ?></td>
                    <td><?= htmlspecialchars($row["year"]); ?></td>
                    <td><?= htmlspecialchars($row["exam_date"]); ?></td>
                    <td><?= htmlspecialchars($row["start_time"]); ?></td>
                    <td><?= htmlspecialchars($row["end_time"]); ?></td>
                        <td>
                            <!-- Link to the exam document -->
                            <a href="<?=$row["exam_link"] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-custom-blue">
                                <i class='bx bx-link'></i> 
                            </a>
                        </td>
                    <td>
                        <!-- Link to edit exam page -->
                        <a href="edit_exam.php?id=<?= htmlspecialchars($row['exam_id']); ?>" class="btn btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <!-- Link to delete exam handler with confirmation prompt -->
                        <a href="handlers/delete_exam.php?id=<?= htmlspecialchars($row['exam_id']); ?>" class="btn btn-delete">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php require_once("inc/footer.php"); ?>
</body>
</html>
