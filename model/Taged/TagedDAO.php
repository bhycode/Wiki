<?php

require_once 'C:\\xampp\\htdocs\\B11\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Taged\\Taged.php';

class TagedDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addTaged($taged)
    {
        $stmt = $this->db->prepare("INSERT INTO Taged (wiki_id_fk, tag_id_fk) VALUES (?, ?)");
        $stmt->bindParam(1, $taged->getWikiIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(2, $taged->getTagIdFk(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTaged($taged)
    {
        $stmt = $this->db->prepare("UPDATE Taged SET wiki_id_fk = ?, tag_id_fk = ? WHERE id = ?");
        $stmt->bindParam(1, $taged->getWikiIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(2, $taged->getTagIdFk(), PDO::PARAM_INT);
        $stmt->bindParam(3, $taged->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTagedList()
    {
        $query = "SELECT * FROM Taged";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $tagedData = $stmt->fetchAll();
        $tagedList = array();

        foreach ($tagedData as $taged) {
            $tagedList[] = new Taged(
                $taged["wiki_id_fk"],
                $taged["tag_id_fk"]
            );
        }

        return $tagedList;
    }

    public function deleteTaged($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Taged WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


?>