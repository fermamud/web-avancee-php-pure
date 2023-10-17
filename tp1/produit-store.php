<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$insert = $crud->insert('produit', $_POST);
header('location: index.php');
?>