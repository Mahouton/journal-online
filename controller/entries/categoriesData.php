<?php
require_once("model/categories.php");
$categorie = new Categories();

$result = $categorie->readCategorie();
?>