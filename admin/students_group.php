<?php session_start(); ?>
<?php require_once "../src/config.php"; ?>
<?php require_once("../core/functions.php"); ?>

<?php 
    // Store the course ID from the URL parameter into a session variable
    if (isset($_GET["id"])) {
        $_SESSION["id_students_group"] = $_GET["id"];
    }

    // Retrieve the course ID from the session
    $course_id = $_SESSION["id_students_group"];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to get student details for the specific course
    $sql = "SELECT s.student_id, s.first_name, s.last_name, s.email, s.phone_number, c.year, c.major, c.course_id
            FROM students s
            JOIN courses c ON s.course_id = c.course_id
            WHERE s.course_id = '$course_id'";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
?>

<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Students</h1>
        <?php require_once("../inc/success.php"); ?>
        <!-- Button to add a new student -->
        <div class="d-flex justify-content-end mb-3">
            <a href="add_student.php?id=<?= $course_id; ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Student
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th> <!-- Column for student ID -->
                        <th>First Name</th> <!-- Column for first name -->
                        <th>Last Name</th> <!-- Column for last name -->
                        <th>Email</th> <!-- Column for email -->
                        <th>Phone Number</th> <!-- Column for phone number -->
                        <th>Year</th> <!-- Column for academic year -->
                        <th>Major</th> <!-- Column for major -->
                        <th>Edit</th> <!-- Column for edit button -->
                        <th>Remove</th> <!-- Column for remove button -->
                    </tr>
                </thead>
                <tbody>
                    <?php if($result && mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["student_id"]); ?></td> <!-- Student ID -->
                        <td><?= htmlspecialchars($row["first_name"]); ?></td> <!-- First name -->
                        <td><?= htmlspecialchars($row["last_name"]); ?></td> <!-- Last name -->
                        <td><?= htmlspecialchars($row["email"]); ?></td> <!-- Email -->
                        <td><?= htmlspecialchars($row["phone_number"]); ?></td> <!-- Phone number -->
                        <td><?= htmlspecialchars($row["year"]); ?></td> <!-- Academic year -->
                        <td><?= htmlspecialchars($row["major"]); ?></td> <!-- Major -->
                        <td>
                            <!-- Edit student button -->
                            <a href="edit_student.php?id=<?= $row["student_id"] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <!-- Remove student button with confirmation prompt -->
                            <a href="handlers/delete_student.php?id=<?= $row["student_id"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fas fa-trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">No students found.</td> <!-- Message if no students are found -->
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php require_once("inc/footer.php"); ?>
