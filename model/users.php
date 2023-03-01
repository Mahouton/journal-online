<?php
require_once(dirname(__FILE__) . '/../config/database.php');

class Users
{
    private $user_id;
    private $username;
    private $password;
    private $email;
    private $pdo;

    /**
     * Constructeur de la classe Users
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
     * CreateUser : fonction d'insertion d'un nouvel
     * utilisateur
     * 
     * @param mixed $username
     * @param mixed $password
     * @param mixed $email
     * @return mixed bool
     */
    public function CreateUser($username, $password, $email)
    {
        try {
            $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            $stmt->execute();
            return (bool) $stmt->rowCount();
            
        } catch (PDOException $e) {
            return $this->isUniqueConstraintViolation($e) ? 1062 : throw $e;
        }

    }

    //fonction de connexion d'un utilisateur
    public function LoginUser($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
            
        } catch (PDOException $e) {
            throw $e;
        }

    }

}

?>