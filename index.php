<?php
session_start(); // Make sure to start the session at the top of the page

require_once 'src/config.php'; // Include the configuration file
require_once ROOT_PATH . 'core/functions.php'; // Include core functions using the ROOT_PATH constant

if (!isset($_SESSION["insert"])) { 
    // Check if the session variable 'insert' is not set, if not, redirect to the login page
    redirect("login.php");
?>


<?php
} else {
    // If the session is active, display content based on the requested page
    if (isset($_GET['page'])) { 
        // Check if a 'page' parameter is passed in the URL
        switch ($_GET['page']) { 
            // Determine which page to display based on the value of the 'page' parameter
            case 'home':
                require_once 'views/home.php'; // Load the home page view
                break;
            case 'course':
                require_once 'views/course.php'; // Load the course page view
                break;
            case 'lecture':
                require_once 'views/lecture.php'; // Load the lecture page view
                break;
            case 'assignment':
                require_once 'views/assignment.php'; // Load the assignment page view
                break;
            case 'exam':
                require_once 'views/exam.php'; // Load the exam page view
                break;
            case 'support':
                require_once 'views/support.php'; // Load the support page view
                break;
            case 'profile':
                require_once 'views/profile.php'; // Load the profile page view
                break;
            case 'login':
                require_once 'views/login.php'; // Load the login page view
                break;
            case 'register':
                require_once 'views/register.php'; // Load the register page view
                break;
            case 'logout':
                require_once 'views/logout.php'; // Load the logout page view
                break;
            default:
                require_once 'views/404.php'; // Load the 404 error page if the 'page' parameter doesn't match any case
                break;
        }
    } else {
        require_once 'views/home.php'; // Default to the home page if no 'page' parameter is set
    }
}
?>
