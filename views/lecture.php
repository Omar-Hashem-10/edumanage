<?php
require_once "src/config.php"; // Include the configuration file for database connection and constants
require_once ROOT_PATH . "core/functions.php"; // Include core functions

// Check if the student is logged in by verifying if the session variable 'student_id' is set
if (isset($_SESSION["student_id"])) {
    $student_id = $_SESSION["student_id"]; // Retrieve the student ID from the session

    // Establish a connection to the MySQL database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Check if the connection to the database was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); // Display an error message if the connection fails
    }

    // Modify the query to fetch lectures and assignments specific to the logged-in student
    $sql = "SELECT c.*, l.*, p.*, a.task_link
    FROM students s
    JOIN courses c ON s.course_id = c.course_id
    JOIN lectures l ON c.course_id = l.course_id
    JOIN professor p ON l.professor_id = p.professor_id
    LEFT JOIN assignments a ON l.lecture_id = a.lecture_id AND a.student_id = s.student_id
    WHERE s.student_id = '$student_id'";

    $result = mysqli_query($conn, $sql); // Execute the query

    // Check if the query execution was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn)); // Display an error message if the query fails
    }

    mysqli_close($conn); // Close the database connection
}
require_once ROOT_PATH . "inc/header.php"; // Include the header file
require_once ROOT_PATH . "inc/nav.php"; // Include the navigation file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set character encoding for the document -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Set the viewport for responsive design -->
    <title>Lecture Schedule</title> <!-- Set the title of the page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"> <!-- Include Boxicons for icon styling -->
    <style>
        /* Custom styles for the container */
        .container {
            max-width: 1200px; /* Set maximum width */
            margin: 0 auto; /* Center the container */
            padding: 2rem; /* Add padding */
        }
        /* Center text */
        .text-center {
            text-align: center;
        }
        /* Custom styles for the blue button */
        .btn-custom-blue {
            background-color: #007bff; /* Custom blue color */
            border-color: #007bff; /* Border color */
            color: #fff; /* Text color */
            padding: 8px 12px; /* Padding */
            font-size: 16px; /* Font size */
        }
        /* Custom styles for the green button */
        .btn-custom-green {
            background-color: #28a745; /* Custom green color */
            color: #fff; /* Text color */
            border: none; /* Remove border */
            border-radius: 4px; /* Rounded corners */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s; /* Smooth background color transition */
            display: inline-flex; /* Align icon and text on the same line */
            align-items: center; /* Vertical alignment */
            justify-content: center; /* Horizontal alignment */
        }
        /* Darker green color on hover for the green button */
        .btn-custom-green:hover {
            background-color: #218838; /* Darker green color */
        }
        /* Custom styles for the orange button */
        .btn-custom-orange {
            background-color: orange; /* Orange color */
            color: #fff; /* Text color */
            border: none; /* Remove border */
            border-radius: 4px; /* Rounded corners */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s; /* Smooth background color transition */
            display: inline-flex; /* Align icon and text on the same line */
            align-items: center; /* Vertical alignment */
            justify-content: center; /* Horizontal alignment */
        }
        /* Darker orange color on hover for the orange button */
        .btn-custom-orange:hover {
            background-color: #e67e22; /* Darker orange color */
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container mt-4">
            <h1 class="text-center mb-4">Lecture Schedule</h1> <!-- Page title -->
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th> <!-- Serial number column -->
                        <th>Topic</th> <!-- Lecture topic column -->
                        <th>Course Name</th> <!-- Course name column -->
                        <th>Lecturer Name</th> <!-- Lecturer name column -->
                        <th>Lecture Link</th> <!-- Lecture link column -->
                        <th>Assignment</th> <!-- Assignment link column -->
                    </tr>
                </thead>
                <tbody>
                <?php if($result): ?> <!-- Check if there are results from the query -->
                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?> <!-- Loop through each row in the result set -->
                    <?php $lecture_id = $row["lecture_id"]; ?> <!-- Get the lecture ID for assignment linking -->
                    <tr>
                        <td><?= $i++; ?></td> <!-- Display the serial number -->
                        <td><?= htmlspecialchars($row["topic"]); ?></td> <!-- Display the lecture topic -->
                        <td><?= htmlspecialchars($row["course_name"]); ?></td> <!-- Display the course name -->
                        <td><?= htmlspecialchars($row["lecturer_name"]); ?></td> <!-- Display the lecturer name -->
                        <td>
                            <a href="<?= htmlspecialchars($row['drive_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-custom-blue">
                                <i class='bx bx-link'></i> <!-- Display the link icon -->
                            </a>
                        </td>
                        <td>
                            <a href="<?= url("assignment&lecture_id=$lecture_id"); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-custom-green">
                                <i class='bx bx-task'></i> <!-- Display the task icon -->
                            </a>
                            <?php if (!empty($row['task_link'])): ?> <!-- Check if there is a task link -->
                                <a href="<?= htmlspecialchars($row['task_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-custom-orange">
                                    <i class='bx bx-link-external'></i> <!-- Display the external link icon -->
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?> <!-- End of the loop -->
                    <?php endif; ?> <!-- End of the result check -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php require_once ROOT_PATH . "inc/footer.php"; // Include the footer file ?>
