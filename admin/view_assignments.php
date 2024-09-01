<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<?php 
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "edumanage");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the lecture ID from the URL
$lecture_id = $_GET["id"];

// SQL query to fetch assignment data along with student and course details
$sql = "SELECT 
    a.id AS assignment_id,
    a.lecture_id,
    a.task_link,
    a.submission_date,
    a.updated_at,
    s.first_name AS student_first_name,
    s.last_name AS student_last_name,
    c.course_name
FROM 
    assignments a
JOIN 
    students s ON a.student_id = s.student_id
JOIN 
    courses c ON a.course_id = c.course_id
WHERE 
    a.lecture_id = '$lecture_id';
";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .text-center {
            text-align: center;
        }
        .btn-custom-blue {
            background-color: #007bff; /* Custom blue color */
            border-color: #007bff; /* Border color */
            color: #fff; /* Text color */
            padding: 8px 12px; /* Padding */
            font-size: 16px; /* Font size */
        }
        .btn-custom-blue .bx {
            vertical-align: middle; /* Align icon vertically */
        }
        table {
            width: 100%; /* Table width 100% of available width */
            border-collapse: collapse; /* Collapse borders to avoid spacing between cells */
        }
        th, td {
            padding: 10px; /* Padding inside cells */
            text-align: left; /* Align text to the left */
        }
        th {
            background-color: #343a40; /* Background color for table headers */
            color: white; /* Text color in table headers */
        }
        td a {
            text-decoration: none; /* Remove underline from links */
            color: #007bff; /* Link color */
        }
        td a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
        .table-responsive {
            overflow-x: auto; /* Allow horizontal scrolling if the table is wide */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Assignments</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th> <!-- Column for assignment ID -->
                    <th>Students</th> <!-- Column for student names -->
                    <th>Course</th> <!-- Column for course name -->
                    <th>Task</th> <!-- Column for task link -->
                    <th>Date Sent</th> <!-- Column for submission date -->
                    <th>Date Updated</th> <!-- Column for last updated date -->
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                    <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $i++; ?></td> <!-- Assignment ID -->
                        <td><?= $row["student_first_name"] . " " . $row["student_last_name"]; ?></td> <!-- Student names -->
                        <td><?= $row["course_name"]; ?></td> <!-- Course name -->
                        <td>
                            <!-- Link to the task -->
                            <a href="<?= htmlspecialchars($row['task_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-custom-blue">
                                <i class='bx bx-link'></i> 
                            </a>
                        </td>
                        <td><?= htmlspecialchars($row["submission_date"]); ?></td> <!-- Submission date -->
                        <td><?= htmlspecialchars($row["updated_at"]); ?></td> <!-- Last updated date -->
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No assignments found.</td> <!-- Message if no assignments are found -->
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php require_once("inc/footer.php"); ?>
