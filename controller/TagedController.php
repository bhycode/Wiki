<?php

require_once 'C:\\xampp\\htdocs\\B11\\model\\Taged\\Taged.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Taged\\TagedDAO.php';

class TagedController {

    private $tagedDAO;

    public function __construct() {
        $this->tagedDAO = new TagedDAO();
    }

    public function getTagedList() {
        return $this->tagedDAO->getTagedList();
    }

}



?>
