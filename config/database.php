<?php
/**
 * Le choix de l'extension PDO(flexible et portable) (PHP Data Ojects) se justifie
 * en ce sens qu'elle permet de travailler avec plusieurs types
 * de base de données en utilisant une API unique
 */

class Database
{
    private static $pdo;

    public static function getPDO()
    {
        if (!self::$pdo) {
            try {
                $db_host = "localhost";
                $db_name = "journal_entries";
                $db_user = "paul";
                $db_password = "geek@123";
                $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                self::$pdo = new PDO($dsn, $db_user, $db_password, $options);
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données: " . $e->getMessage();
            }
        }

        return self::$pdo;
    }
}