<?php
session_start();

// Store the course ID from the URL parameter into the session
if (isset($_GET["id"])) {
    $_SESSION["course_id_view"] = $_GET["id"];
}

// Retrieve the course ID from the session
$course_id = $_SESSION["course_id_view"];

// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "edumanage");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // Handle connection failure
}

// SQL query to fetch lectures and associated course details
$sql = "SELECT
        c.*,                       // All columns from courses table
        l.lecture_id,              // Lecture ID
        l.topic,                   // Lecture topic
        l.drive_link               // Google Drive link for the lecture
  FROM
      courses c
  JOIN
      lectures l
  ON
      c.course_id = l.course_id
  WHERE
      l.course_id = '$course_id'"; // Filter by the selected course ID

$result = mysqli_query($conn, $sql); // Execute the SQL query
?>
<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectures Table</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Boxicons CSS (for icons) -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons/css/boxicons.min.css">
    <style>
        /* Ensure no horizontal scrollbar */
        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal scrolling */
            overflow-y: auto; /* Allow vertical scrolling if needed */
            height: 100%;
        }

        /* Center align title and improve spacing */
        .container {
            max-width: 100%;
            padding: 0 15px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        /* Style the card */
        .card {
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            box-shadow: 0 0 1rem rgba(0,0,0,0.1);
            background-color: #fff;
            overflow: hidden; /* Ensure no overflow */
            margin-bottom: 30px; /* Space below card */
        }

        .card-body {
            padding: 20px;
        }

        /* Style the title */
        h2 {
            text-align: center; /* Center align title */
            margin-bottom: 30px; /* Space below title */
            color: #343a40; /* Darker text color for better readability */
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensure table does not overflow */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
            overflow: hidden; /* Prevent text from overflowing */
            text-overflow: ellipsis; /* Show ... when text overflows */
            white-space: nowrap; /* Prevent text wrapping */
            color: #212529; /* Dark text color for readability */
        }

        th {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Even row background color */
        }

        tr:hover {
            background-color: #e9ecef; /* Row hover background color */
        }

        /* Style links */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Style the icon button */
        .btn-custom-blue {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            border-radius: .25rem;
            padding: .375rem .75rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-custom-blue i {
            font-size: 1.25rem; /* Adjust icon size */
        }

        .btn-custom-blue:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-custom {
            padding: .375rem .75rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Lectures</h2>
        <?php require_once("../inc/errors.php"); ?>
        <?php require_once("../inc/success.php"); ?>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th> <!-- Lecture ID -->
                            <th>Course</th> <!-- Course details (year and major) -->
                            <th>Topic</th> <!-- Lecture topic -->
                            <th>Google Drive Link</th> <!-- Link to the lecture's Google Drive file -->
                            <th>Edit</th> <!-- Link to edit the lecture -->
                            <th>Delete</th> <!-- Link to delete the lecture -->
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(mysqli_num_rows($result) > 0): ?> <!-- Check if there are any results -->
                        <?php while($row = mysqli_fetch_assoc($result)): ?> <!-- Iterate through the result rows -->
                        <tr>
                            <td><?= $row["lecture_id"]; ?></td> <!-- Display the lecture ID -->
                            <td><?= $row["year"] . ": " . $row["major"]; ?></td> <!-- Display course details -->
                            <td><?= $row["topic"]; ?></td> <!-- Display the lecture topic -->
                            <td><a href="<?= $row["drive_link"] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-custom-blue">
                                <i class='bx bx-link'></i>                       
                            </a></td> <!-- Link to Google Drive -->
                            <td>
                                <a href="edit_lecture.php?id=<?= $row["lecture_id"] ?>" class="btn btn-custom btn-edit">
                                    <i class='bx bx-edit'></i>
                                </a>
                              </td> <!-- Edit button -->
                                <td>
                                <a href="handlers/delete_lecture.php?id=<?= $row["lecture_id"] ?>" class="btn btn-custom btn-delete" onclick="return confirm('Are you sure you want to delete this lecture?');">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </td> <!-- Delete button -->
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                          <td colspan="6" class="text-center">No lectures found.</td> <!-- Message if no lectures are found -->
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Include JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php require_once("inc/footer.php"); ?>
</body>
</html>
