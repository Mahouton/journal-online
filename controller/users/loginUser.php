<?php
require_once('../../model/users.php');

$data = ['password' => '', 'email' => ''];
foreach ($data as $key => &$value) {
    if (isset($_POST[$key])) {
        $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }
}
unset($value);

$users = new Users();

$result = $users->LoginUser($data['email']);
if($result){

    if (password_verify($data['password'], $result['password'])){
        $check = true;
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $result['user_id'];
        $_SESSION['name'] = $result['username'];
    } else{
        $check = false;
    }
} else {
    $check = false;
}


$response = [
    'status' => $check === true ? 'success' : 'error'
];
if($check === false){
    $response['message'] = 'Adresse email ou mot de passe invalide!';
}

header('Content-Type: application/json');
echo json_encode($response);
?>