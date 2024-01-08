<?php

class Tag {
    private $id;
    private $name;
    private $adminIdFk;

    public function __construct($name, $adminIdFk) {
        $this->name = $name;
        $this->adminIdFk = $adminIdFk;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAdminIdFk() {
        return $this->adminIdFk;
    }

    public function setAdminIdFk($adminIdFk) {
        $this->adminIdFk = $adminIdFk;
    }
}

?>