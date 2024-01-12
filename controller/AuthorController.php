<?php

require_once "C:\\xampp\\htdocs\\B11\\model\\Author\\Author.php";
require_once "C:\\xampp\\htdocs\\B11\\model\\Author\\AuthorDAO.php";

class AuthorController {

    private $authorDAO;

    public function __construct() {
        $this->authorDAO = new AuthorDAO();
    }

    public function showSignupForm() {
        // Include the signup form view
        include('C:\\xampp\\htdocs\\B11\\view\\signup.php');
    }

    public function processSignup() {
        // Validate and sanitize inputs
        $name = '';
        $email = '';
        $password = '';
        $errors = [];
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                // Validate name
                if (!$name) {
                    $errors['name'] = 'Name is required.';
                }
    
                // Validate email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Invalid email format';
                }
    
                // Validate password
                if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
                    $errors['password'] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.';
                }
    
                // If there are no validation errors, proceed with signup
                if (empty($errors)) {
                    // Create Author object
                    $newAuthor = new Author($name, $email, $password);
    
                    // Add the new author
                    if ($this->authorDAO->addAuthor($newAuthor)) {
                        $signupMessage = '<div class="alert alert-success mt-3" role="alert">Signup successful! You can now <a href="index.php?action=login" class="alert-link">login here</a>.</div>';
                    } else {
                        $signupMessage = '<div class="alert alert-danger mt-3" role="alert">Error in signup process.</div>';
                    }
                }
            }
        }
    
        // Include the signup form view with the signup message and errors
        include('C:\\xampp\\htdocs\\B11\\view\\signup.php');
    }
    
        
        

    // Login
    public function showLoginForm() {
        // Include the signup form view
        include('C:\\xampp\\htdocs\\B11\\view\\login.php');
    }

    public function processlogin() {
        $email = '';
        $password = '';
        $errors = [];
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                // Validate email
                if (!$email) {
                    $errors['email'] = 'Email is required.';
                }
    
                // Validate password
                if (!$password) {
                    $errors['password'] = 'Password is required.';
                } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
                    $errors['password'] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.';
                }
    
                // If there are no validation errors, proceed with login
                if (empty($errors)) {
                    // Check authentication
                    // var_dump($this->authorDAO->auth($email, $password));
                    
                    if ($this->authorDAO->auth($email, $password)) {
                        $loginMessage = '<div class="alert alert-success mt-3" role="alert">Login successful!</div>';
                    } else {
                        $loginMessage = '<div class="alert alert-danger mt-3" role="alert">Error in login process. Invalid email or password.</div>';
                    }
                }
            }
        }
    
        // Include the login form view with the login message and errors
        include('C:\\xampp\\htdocs\\B11\\view\\login.php');
    }
    


}


?>
