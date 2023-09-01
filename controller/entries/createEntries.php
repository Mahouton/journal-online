<?php
require_once('../../model/entries.php');

session_start(); 

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $contenu = $_POST['contenu'];
}

$data = ['titre' => '', 'categorie' => ''];
foreach ($data as $key => &$value) {
    if (isset($_POST[$key])) {
        $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }
}
unset($value);

$entries = new Entries();
$result = $entries->CreateEntries($data['titre'],$contenu, $user_id, $data['categorie']);

$response = [
    'status' => $result === true ? 'success' : 'error',
    'titre' => $data['titre']
];


header('Content-Type: application/json');
echo json_encode($response);
?>