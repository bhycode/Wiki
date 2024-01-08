<?php

require_once 'C:\\xampp\\htdocs\\B11\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Category\\Category.php';

class CategoryDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addCategory($category)
    {
        $stmt = $this->db->prepare("INSERT INTO Category (name, admin_id_fk) VALUES (?, ?)");
        $stmt->bindParam(1, $category->getName());
        $stmt->bindParam(2, $category->getAdminIdFk(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory($category)
    {
        $stmt = $this->db->prepare("UPDATE Category SET name = ?, admin_id_fk = ? WHERE id = ?");
        $stmt->bindParam(1, $category->getName());
        $stmt->bindParam(2, $category->getAdminIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(3, $category->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategories()
    {
        $query = "SELECT * FROM Category";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $categoriesData = $stmt->fetchAll();
        $categoriesList = array();

        foreach ($categoriesData as $category) {
            $categoriesList[] = new Category(
                $category["name"],
                $category["admin_id_fk"]
            );
        }

        return $categoriesList;
    }

    public function deleteCategory($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Category WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}



?>