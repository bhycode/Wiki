<?php

require_once 'C:\\xampp\\htdocs\\B11\\model\\Wiki\\Wiki.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Wiki\\WikiDAO.php';

class WikiController {

    private $wikiDAO;

    public function __construct() {
        $this->wikiDAO = new WikiDAO();
    }


    public function getWikiList() {
        return $this->wikiDAO->getWikis();
    }



}



?>
