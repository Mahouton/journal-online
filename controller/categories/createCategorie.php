<?php
require_once('../../model/categories.php');

$data = ['name' => '', 'icon_name' => ''];
foreach ($data as $key => &$value) {
    if (isset($_POST[$key])) {
        $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }
}
unset($value);

$categories = new Categories();
$result = $categories->CreateCategorie($data['name'], $data['icon_name']);

$response = [
    'status' => $result === true ? 'success' : 'error',
    'name' => $data['name']
];


if ($result === 1062) {
    $response['message'] = 'Cette catégorie est déjà disponible';
}

header('Content-Type: application/json');
echo json_encode($response);
?>