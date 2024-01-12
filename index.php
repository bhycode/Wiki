<?php
require_once 'C:\\xampp\\htdocs\\B11\\controller\\AuthorController.php';

$authorController = new AuthorController();

// Determine which action to perform based on the request
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'signup':
            $authorController->processSignup();
            break;
        case 'login' :
            $authorController->processlogin();
            break;
        default:
            // Default to showing the signup form
            $authorController->showSignupForm();
            break;
    }
} else {
    // Default to showing the signup form
    $authorController->showSignupForm();
}


?>