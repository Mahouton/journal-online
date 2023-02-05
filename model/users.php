<?php
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
        require_once('../config/database.php');
    }

    /**
     * CreateUser : fonction d'insertion d'un nouvel
     * utilisateur
     * 
     * @param mixed $username
     * @param mixed $password
     * @param mixed $email
     * @return mixed
     */
    public function CreateUser($username, $password, $email)
    {
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

}

?>