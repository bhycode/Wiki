<?php

require "C:\\xampp\\htdocs\\B11\\model\\Admin\\Admin.php";
require "C:\\xampp\\htdocs\\B11\\model\\Admin\\AdminDAO.php";


class AdminController {

    function getAdmins() {
        $adminDAO = new AdminDAO();
        return $adminDAO->getAdmins();
    }



}



?>