<?php

require_once 'C:\\xampp\\htdocs\\B11\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Wiki\\Wiki.php';

class WikiDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addWiki($wiki)
    {
        $stmt = $this->db->prepare("INSERT INTO Wiki (title, body, category_id_fk, author_id_fk) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $wiki->getTitle());
        $stmt->bindParam(2, $wiki->getBody());
        $stmt->bindParam(3, $wiki->getCategoryIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(4, $wiki->getAuthorIdFk(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateWiki($wiki)
    {
        $stmt = $this->db->prepare("UPDATE Wiki SET title = ?, body = ?, category_id_fk = ?, author_id_fk = ? WHERE id = ?");
        $stmt->bindParam(1, $wiki->getTitle());
        $stmt->bindParam(2, $wiki->getBody());
        $stmt->bindParam(3, $wiki->getCategoryIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(4, $wiki->getAuthorIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(5, $wiki->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getWikis()
    {
        $query = "SELECT * FROM Wiki";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $wikisData = $stmt->fetchAll();
        $wikisList = array();

        foreach ($wikisData as $wiki) {
            $wikisList[] = new Wiki(
                $wiki["title"],
                $wiki["body"],
                $wiki["category_id_fk"],
                $wiki["author_id_fk"]
            );
        }

        return $wikisList;
    }

    public function deleteWiki($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Wiki WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


?>