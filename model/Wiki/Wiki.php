<?php

class Wiki {
    private $id;
    private $title;
    private $body;
    private $categoryIdFk;
    private $authorIdFk;

    public function __construct($title, $body, $categoryIdFk, $authorIdFk) {
        $this->title = $title;
        $this->body = $body;
        $this->categoryIdFk = $categoryIdFk;
        $this->authorIdFk = $authorIdFk;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function getCategoryIdFk() {
        return $this->categoryIdFk;
    }

    public function setCategoryIdFk($categoryIdFk) {
        $this->categoryIdFk = $categoryIdFk;
    }

    public function getAuthorIdFk() {
        return $this->authorIdFk;
    }

    public function setAuthorIdFk($authorIdFk) {
        $this->authorIdFk = $authorIdFk;
    }
}

?>
