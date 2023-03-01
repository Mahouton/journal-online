<?php
require_once(dirname(__FILE__) . '/../config/database.php');

class Categories
{
    private $category_id;
    private $name;
    private $icon_name;
    private $pdo;

    /**
     * Constructeur de la classe Categories
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
     * CreateCategorie : fonction d'insertion d'une nouvelle catégorie
     * 
     * @param mixed $name
     * @param mixed $icon_name
     * @return mixed bool
     */
    public function CreateCategorie($name, $icon_name)
    {
        try {
            $sql = "INSERT INTO categories (name, icon_name) VALUES (:name, :icon_name)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':icon_name', $icon_name, PDO::PARAM_STR);

            $stmt->execute();
            return (bool) $stmt->rowCount();
            
        } catch (PDOException $e) {
            return $this->isUniqueConstraintViolation($e) ? 1062 : throw $e;
        }

    }

    //Sélection de toutes les catégories
    public function readCategorie(){
        $categories =  $this->pdo->prepare('SELECT * FROM categories');
        $categories->execute();
        
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>