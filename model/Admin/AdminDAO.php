<?php

require_once 'C:\\xampp\\htdocs\\B11\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Admin\\Admin.php';

class AdminDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addAdmin($admin)
    {
        $stmt = $this->db->prepare("INSERT INTO Admin (name, email, password) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $admin->getName());
        $stmt->bindParam(2, $admin->getEmail());
        $stmt->bindParam(3, $admin->getPassword());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAdmin($admin)
    {
        $stmt = $this->db->prepare("UPDATE Admin SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bindParam(1, $admin->getName());
        $stmt->bindParam(2, $admin->getEmail());
        $stmt->bindParam(3, $admin->getPassword());
        $stmt->bindParam(4, $admin->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdmins()
    {
        $query = "SELECT * FROM Admin";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $adminsData = $stmt->fetchAll();
        $adminsList = array();

        foreach ($adminsData as $admin) {
            $adminsList[] = new Admin(
                $admin["name"],
                $admin["email"],
                $admin["password"]
            );
        }

        return $adminsList;
    }

    public function deleteAdmin($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Admin WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


?>
