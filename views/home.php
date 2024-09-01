<?php
// Include the configuration file
require_once "src/config.php";

// Check if a student is logged in by verifying if 'student_id' is set in the session
if(isset($_SESSION['student_id']))
{
    // Get the logged-in student's ID from the session
    $student_id = $_SESSION['student_id'];

    // Establish a connection to the MySQL database
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Query the database to retrieve all details of the logged-in student
    $sql = "SELECT * FROM `students` WHERE student_id = '$student_id'";

    // Execute the query and store the result
    $result = mysqli_query($conn, $sql);

    // Fetch the student's data from the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);
}

// Include the header and navigation files
require_once ROOT_PATH . "inc/header.php";
require_once ROOT_PATH . "inc/nav.php";
?>

<!-- Main content section -->
<div class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Display a card with the student's full name -->
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title">Welcome:<?php echo $row["first_name"] . " " . $row["last_name"]; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include the footer file -->
<?php require_once ROOT_PATH . "inc/footer.php"; ?>
