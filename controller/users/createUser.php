<?php
require_once('../../model/users.php');


/** 
 * Récupération des données envoyées via JavaScript (AJAX)
 * 
 * L'utilisation de la fonction filter_input 
 * permet de vérifier et de nettoyer les entrées des utilisateurs,
 * en enlevant les caractères spéciaux 
 * qui pourraient causer des problèmes de sécurité ou des erreurs dans le code.
 * 
 */

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

}
// Instanciation d'un nouvel objet Users
$users = new Users();

// Appel de la méthode CreateUser avec les données reçues
$result = $users->CreateUser($username, $password, $email);

// Vérification du résultat et retour en JSON
if ($result) {
header('Content-Type: application/json');

    echo json_encode(['status' => 'success', 'username' => $username]);
} else {
header('Content-Type: application/json');

    echo json_encode(['status' => 'error']);
}
?>