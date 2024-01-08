<?php

class Taged {
    private $id;
    private $wikiIdFk;
    private $tagIdFk;

    public function __construct($wikiIdFk, $tagIdFk) {
        $this->wikiIdFk = $wikiIdFk;
        $this->tagIdFk = $tagIdFk;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getWikiIdFk() {
        return $this->wikiIdFk;
    }

    public function setWikiIdFk($wikiIdFk) {
        $this->wikiIdFk = $wikiIdFk;
    }

    public function getTagIdFk() {
        return $this->tagIdFk;
    }

    public function setTagIdFk($tagIdFk) {
        $this->tagIdFk = $tagIdFk;
    }
}

?>