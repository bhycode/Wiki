<?php

require_once 'C:\\xampp\\htdocs\\B11\\model\\Category\\Category.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Category\\CategoryDAO.php';

class CategoryController {

    private $categoryDAO;

    public function __construct() {
        $this->categoryDAO = new CategoryDAO();
    }

    public function getCategories() {
        return $this->categoryDAO->getCategories();
    }

}


?>
