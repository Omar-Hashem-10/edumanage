<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<?php

// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "edumanage");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // Handle connection failure
}

// SQL query to fetch support data along with student and course information
$sql = "SELECT 
    s.id AS support_id,            // Support record ID
    s.message AS support_message,  // Support message content
    st.first_name AS student_first_name, // Student's first name
    st.last_name AS student_last_name,   // Student's last name
    c.course_name AS course_name,        // Course name
    c.year,                             // Academic year
    c.major                             // Major subject
FROM 
    support s
JOIN 
    students st ON s.student_id = st.student_id
JOIN 
    courses c ON s.course_id = c.course_id;";

$result = mysqli_query($conn, $sql); // Execute the SQL query

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background color */
            font-family: Arial, sans-serif; /* Font style */
        }
        .container {
            margin-top: 30px; /* Margin from the top */
        }
        table {
            width: 100%; /* Full width table */
            border-collapse: collapse; /* Collapse table borders */
            background-color: #fff; /* White background for table */
            border-radius: 8px; /* Rounded corners for table */
            overflow: hidden; /* Hide overflow */
        }
        th, td {
            padding: 12px; /* Padding inside table cells */
            text-align: left; /* Left-align text */
            border: 1px solid #ddd; /* Light grey border for cells */
        }
        th {
            background-color: #007bff; /* Blue background for table header */
            color: white; /* White text for table header */
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternate row background color */
        }
        tbody tr:hover {
            background-color: #e9ecef; /* Hover background color for rows */
        }
        .table-container {
            overflow-x: auto; /* Horizontal scroll for table container */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Support Data</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th> <!-- Serial number -->
                        <th>Message</th> <!-- Support message -->
                        <th>Student Name</th> <!-- Full name of the student -->
                        <th>Course Name</th> <!-- Name of the course -->
                        <th>Major</th> <!-- Student's major -->
                        <th>Year</th> <!-- Academic year -->
                    </tr>
                </thead>
                <tbody>
                  <?php if($result): ?> <!-- Check if result is not empty -->
                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?> <!-- Iterate through result rows -->
                    <tr>
                        <td><?= $i++; ?></td> <!-- Serial number -->
                        <td><?= $row["support_message"]; ?></td> <!-- Support message -->
                        <td><?= $row["student_first_name"] . " " . $row["student_last_name"]; ?></td> <!-- Full name of the student -->
                        <td><?= $row["course_name"]; ?></td> <!-- Course name -->
                        <td><?= $row["major"]; ?></td> <!-- Student's major -->
                        <td><?= $row["year"]; ?></td> <!-- Academic year -->
                    </tr>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
</html>

<?php require_once("inc/footer.php"); ?>
