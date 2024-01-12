<?php

require_once 'C:\\xampp\\htdocs\\B11\\model\\Tag\\Tag.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Tag\\TagDAO.php';

class TagController {

    private $tagDAO;

    public function __construct() {
        $this->tagDAO = new TagDAO();
    }


    public function getTags() {
        return $this->tagDAO->getTags();
    }


}


?>
