<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>
<?php
  // Retrieve the course ID from the GET request
  $course_id = $_GET["id"];
  
  // Connect to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "edumanage");

  // Check if the database connection was successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // SQL query to fetch lectures for the specific course ID
  $sql = "SELECT * FROM `lectures` WHERE `course_id` = '$course_id'";
  $result = mysqli_query($conn, $sql);

  // Check if the SQL query was successful
  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectures</title>
    <!-- Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Container styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        /* Center text alignment */
        .text-center {
            text-align: center;
        }
        /* Custom button styling */
        .btn-custom-primary {
            background-color: #007bff; /* Blue background color */
            border-color: #007bff; /* Blue border color */
            color: #fff; /* White text color */
            padding: 8px 12px; /* Padding inside the button */
            font-size: 16px; /* Font size */
            text-decoration: none; /* Remove underline from the link */
            display: inline-flex; /* Inline flex display for button */
            align-items: center; /* Center icon and text vertically */
        }
        .btn-custom-primary i {
            margin-right: 5px; /* Space between icon and text */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Lectures</h1>
    <div class="table-responsive">
        <!-- Table displaying the list of lectures -->
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Lecture Title</th>
                    <th>Lecture Date</th>
                    <th>Assignment</th>
                </tr>
            </thead>
            <tbody>
              <!-- Check if there are any rows in the result set -->
              <?php if(mysqli_num_rows($result) > 0): ?>
              <!-- Loop through each row and display lecture details -->
              <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= htmlspecialchars($row["topic"]); ?></td>
                    <td><?= htmlspecialchars($row["lecture_date"]); ?></td>
                    <td>
                    <!-- Link to view assignments for the lecture -->
                    <a href="view_assignments.php?id=<?= $row["lecture_id"]; ?>" rel="noopener noreferrer" class="btn btn-custom-primary">
                        <i class="fas fa-eye"></i>              
                    </a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                  <!-- Message displayed if no lectures are found -->
                  <tr>
                    <td colspan="4" class="text-center">No lectures found</td>
                  </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php require_once("inc/footer.php"); ?>
