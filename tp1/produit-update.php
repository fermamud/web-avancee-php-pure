<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$update = $crud->update('produit', $_POST, 'id_produit');
header('location: index.php');
?>