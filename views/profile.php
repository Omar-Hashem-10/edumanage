<?php
require_once "src/config.php"; // Include the configuration file

// Check if the student is logged in by verifying if the session contains the student ID
if (isset($_SESSION["student_id"])) {
    $student_id = $_SESSION["student_id"]; // Get the student ID from the session

    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "edumanage");

    // Prepare a SQL query to fetch student data based on the student ID
    $sql = "SELECT * FROM `students` WHERE student_id = '$student_id'";

    // Execute the query and store the result
    $result = mysqli_query($conn, $sql);

    // Close the database connection after querying
    mysqli_close($conn);
}

// Include the header and navigation files using the ROOT_PATH constant
require_once ROOT_PATH . "inc/header.php";
require_once ROOT_PATH . "inc/nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set the character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensure responsive design -->
    <title>Profile</title> <!-- Page title -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Include Bootstrap CSS -->
    <style>
        /* Container styling */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Table cell and header styling */
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }

        /* Styling for the table header */
        .thead-dark th {
            background-color: #343a40;
            color: white;
        }

        /* Centered text styling */
        .text-center {
            color: #333;
            font-size: 2rem;
            margin-top: 2rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container mt-4">
            <h1 class="text-center mb-4">Profile</h1> <!-- Page header -->
            <table class="table table-striped table-bordered"> <!-- Table with striped and bordered styling -->
                <thead class="thead-dark"> <!-- Table header with dark background -->
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result): ?> <!-- Check if the query returned a result -->
                        <?php while ($row = mysqli_fetch_assoc($result)): ?> <!-- Loop through the query result -->
                            <tr>
                                <td>Name</td>
                                <td><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td> <!-- Display the student's full name -->
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $row["email"]; ?></td> <!-- Display the student's email -->
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><?= $row["password"]; ?></td> <!-- Display the student's password -->
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php require_once ROOT_PATH . "inc/footer.php"; // Include the footer file using the ROOT_PATH constant ?>
