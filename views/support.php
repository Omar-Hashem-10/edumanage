<?php
require_once "src/config.php"; // Include the configuration file
require_once ROOT_PATH . "inc/header.php"; // Include the header file using the ROOT_PATH constant
require_once ROOT_PATH . "inc/nav.php"; // Include the navigation file using the ROOT_PATH constant
?>

<div class="main-content">
    <div class="container">
        <h1>Support</h1>
        <?php require_once("inc/errors.php"); // Include the file to display any error messages ?>
        <?php require_once("inc/success.php"); // Include the file to display any success messages ?>
        <form action="handlers/submit_support.php" method="POST"> 
            <!-- Form to submit a support request, sending data via POST method to the specified handler -->
            <div class="form-group">
                <label for="message">Message</label> 
                <!-- Label for the message field -->
                <textarea id="message" name="message" class="form-control" rows="7"></textarea> 
                <!-- Textarea for entering the support message -->
            </div>
            <button type="submit" class="btn btn-primary">Submit Support Request</button> 
            <!-- Submit button for the form -->
        </form>
    </div>
</div>

<style>
    /* Container styling */
    .main-content {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 50px auto;
        overflow: hidden;
    }

    /* Title styling */
    .container h1 {
        text-align: center;
        color: #333;
        font-size: 28px;
        margin-bottom: 30px;
        font-family: 'Arial', sans-serif;
    }

    /* Form styling */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        color: #555;
        font-size: 16px;
        margin-bottom: 10px;
        display: block;
    }

    .form-group textarea {
        width: 100%;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        resize: none;
        font-size: 14px;
        font-family: 'Arial', sans-serif;
        height: 200px; /* Increased height */
    }

    /* Button styling */
    .btn-primary {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<?php require_once ROOT_PATH . "inc/footer.php"; // Include the footer file using the ROOT_PATH constant ?>
