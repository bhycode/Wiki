<?php

require_once 'C:\\xampp\\htdocs\\B11\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\B11\\model\\Author\\Author.php';

class AuthorDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addAuthor($author)
    {
        $name = $author->getName();
        $email = $author->getEmail();
        $password = $author->getPassword();
    
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt = $this->db->prepare("INSERT INTO Author (name, email, password) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $hashedPassword);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    


    public function auth($email, $password)
    {
        // Retrieve hashed password from the database based on the provided email
        $stmt = $this->db->prepare("SELECT password FROM Author WHERE email = ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result && password_verify($password, $result['password'])) {
            // Password is correct
            return true;
        } else {
            // Password is incorrect
            return false;
        }
    }
    


    public function updateAuthor($author)
    {
        $stmt = $this->db->prepare("UPDATE Author SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bindParam(1, $author->getName());
        $stmt->bindParam(2, $author->getEmail());
        $stmt->bindParam(3, $author->getPassword());
        $stmt->bindParam(4, $author->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAuthors()
    {
        $query = "SELECT * FROM Author";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $authorsData = $stmt->fetchAll();
        $authorsList = array();

        foreach ($authorsData as $author) {
            $authorsList[] = new Author(
                $author["name"],
                $author["email"],
                $author["password"]
            );
        }

        return $authorsList;
    }

    public function deleteAuthor($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Author WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    

}


?>
