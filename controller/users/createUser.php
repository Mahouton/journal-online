<?php
require_once('../../model/users.php');

$data = ['username' => '', 'password' => '', 'email' => ''];
foreach ($data as $key => &$value) {
    if (isset($_POST[$key])) {
        $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }
}
unset($value);

$users = new Users();
$result = $users->CreateUser($data['username'], password_hash($data['password'], PASSWORD_DEFAULT), $data['email']);

$response = [
    'status' => $result === true ? 'success' : 'error',
    'username' => $data['username']
];


if ($result === 1062) {
    $response['message'] = 'Adresse email déjà utilisée';
}

header('Content-Type: application/json');
echo json_encode($response);
?>