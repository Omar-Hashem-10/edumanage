<?php session_start(); ?>
<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>

<div class="container mt-4">
    <h2>Add New Lecture</h2>
    
    <!-- Include error and success messages if any -->
    <?php require_once("../inc/errors.php"); ?>
    <?php require_once("../inc/success.php"); ?>
    
    <div class="card">
        <div class="card-body">
            <!-- Form to add a new lecture -->
            <form action="handlers/handle-add-lecture.php" method="POST">
                <div class="form-group">
                    <!-- Dropdown for selecting a course -->
                    <label for="course">Course</label>
                    <select id="course" name="course" class="form-control">
                        <option value="">Select a Course</option>
                        <option value="1">First Year: Arabic Language</option>
                        <option value="2">First Year: Geography</option>
                        <option value="3">First Year: Chemistry</option>
                        <option value="4">First Year: Physics</option>
                        <option value="5">First Year: English Language</option>
                        <option value="6">Second Year: Arabic Language</option>
                        <option value="7">Second Year: French Language</option>
                        <option value="8">Third Year: Science</option>
                        <option value="9">Third Year: Social Studies</option>
                        <option value="10">Third Year: Arabic Language</option>
                        <option value="11">Third Year: English Language</option>
                        <option value="12">Fourth Year: Arabic Language</option>
                        <option value="13">Fourth Year: English Language</option>
                        <option value="14">Fourth Year: Geography</option>
                        <option value="15">Fourth Year: Chemistry</option>
                        <option value="16">Fourth Year: Biology</option>
                        <option value="17">Fourth Year: Mathematics</option>
                        <!-- Add more courses as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <!-- Input for lecture topic -->
                    <label for="topic">Topic</label>
                    <input type="text" id="topic" name="topic" class="form-control">
                </div>
                <div class="form-group">
                    <!-- Input for Google Drive link -->
                    <label for="drive_link">Google Drive Link</label>
                    <input type="url" id="drive_link" name="drive_link" class="form-control">
                </div>
                <!-- Submit button for the form -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    /* Ensure the container does not cause scrolling */
    .container {
        max-width: 100%;
        padding: 0 15px;
        margin: 0 auto;
        box-sizing: border-box;
        overflow: hidden; /* Prevent any overflow within the container */
    }

    /* Style the card */
    .card {
        border: 1px solid #dee2e6;
        border-radius: .375rem;
        box-shadow: 0 0 1rem rgba(0,0,0,0.1);
        background-color: #fff;
        overflow: hidden; /* Ensure no overflow */
    }

    .card-body {
        padding: 20px;
    }

    /* Style form groups */
    .form-group {
        margin-bottom: 1rem;
    }

    /* Style labels */
    label {
        font-weight: bold;
        margin-bottom: .5rem;
        display: block;
    }

    /* Style select and input fields */
    .form-control {
        border-radius: .25rem;
        border: 1px solid #ced4da;
        padding: .375rem .75rem;
        font-size: 1rem;
    }

    /* Style the submit button */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
        transition: background-color .15s ease-in-out, border-color .15s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    /* Remove any extra margin and padding that might cause scrolling */
    body, html {
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Prevent horizontal scrolling */
        overflow-y: hidden; /* Prevent vertical scrolling */
    }
</style>

<?php require_once("inc/footer.php"); ?>
