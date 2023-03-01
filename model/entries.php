<?php
require_once(dirname(__FILE__) . '/../config/database.php');

class Entries
{
    private $entry_id, $entry_categories_id, $category_id;
    private $title, $image_path;
    private $body;
    private $user_id, $image_id;
    private $pdo;

    /**
     * Constructeur de la classe Entries
     */
    public function __construct()
    {
        $this->pdo = Database::getPDO();
    }

    public function isUniqueConstraintViolation(PDOException $e)
    {
        return ($e instanceof PDOException && $e->errorInfo[0] === "23000" && $e->errorInfo[1] === 1062);
    }


    /**
     * CreateEntries : fonction d'insertion d'une nouvelle entrée de journal
     * 
     * @param mixed $title
     * @param mixed $body
     * @param mixed $user_id
     * 
     * @return mixed bool
     */
    public function CreateEntries($title, $body, $user_id, $category_id)
    {
        try {
            $this->pdo->beginTransaction();

            // Insertion dans la table entries
            $sql1 = "INSERT INTO entries (title, body, user_id) VALUES (:title, :body, :user_id)";
            $stmt = $this->pdo->prepare($sql1);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':body', $body, PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->execute();

            // Récupérer l'id  de la dernière entrée insérée

            $entry_id = $this->pdo->lastInsertId();

            // Insertion dans la table entry_categories
            $sql2 = "INSERT INTO entry_categories (entry_id, category_id) VALUES (:entry_id, :category_id)";
            $stmt = $this->pdo->prepare($sql2);
            $stmt->bindValue(':entry_id', $entry_id, PDO::PARAM_STR);
            $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
            $stmt->execute();

            // Insertion dans la table images
            /* $sql2 = "INSERT INTO images (entry_id, image_path) VALUES (:entry_id, :image_path)";
            $stmt = $this->pdo->prepare($sql2);
            $stmt->bindValue(':entry_id', $entry_id, PDO::PARAM_STR);
            $stmt->bindValue(':image_path', $image_path, PDO::PARAM_STR); */

            $this->pdo->commit();
            return true;
            
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return throw $e;
        }

    }

     //Sélectionner toutes les entrées
     public function readEntries(){
        $sql =  $this->pdo->prepare('SELECT * FROM entries');
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);  
    }

    // Sélectionner une catégorie associée à une entrée
    public function readOneEntries($entry_id){
        $sql = $this->pdo->prepare("SELECT name, icon_name FROM entry_categories ec, categories c, entries e WHERE 
            ec.category_id=c.category_id AND ec.entry_id=e.entry_id AND e.entry_id=$entry_id");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    } 
    
    // Sélectionner un utilisateur associée à une entrée
    public function readOneUserEntries($user_id, $entry_id){
        $sql = $this->pdo->prepare("SELECT username FROM users u, entries e WHERE 
            u.user_id=e.user_id AND u.user_id=$user_id  AND e.entry_id=$entry_id");
        $sql->execute();
        return $sql->fetch();
    }

}

?>