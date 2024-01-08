<?php

require_once 'C:\\xampp\\htdocs\\B11\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Tag\\Tag.php';

class TagDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addTag($tag)
    {
        $stmt = $this->db->prepare("INSERT INTO Tag (name, admin_id_fk) VALUES (?, ?)");
        $stmt->bindParam(1, $tag->getName());
        $stmt->bindParam(2, $tag->getAdminIdFk(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTag($tag)
    {
        $stmt = $this->db->prepare("UPDATE Tag SET name = ?, admin_id_fk = ? WHERE id = ?");
        $stmt->bindParam(1, $tag->getName());
        $stmt->bindParam(2, $tag->getAdminIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(3, $tag->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTags()
    {
        $query = "SELECT * FROM Tag";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $tagsData = $stmt->fetchAll();
        $tagsList = array();

        foreach ($tagsData as $tag) {
            $tagsList[] = new Tag(
                $tag["name"],
                $tag["admin_id_fk"]
            );
        }

        return $tagsList;
    }

    public function deleteTag($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Tag WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


$admin = new TagDAO();
$result = $admin->getTags();

foreach($result as $admin) {
    print_r($admin->getName());

}


?>
