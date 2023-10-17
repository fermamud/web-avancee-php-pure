<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$delete = $crud->delete('produit', $_GET['id'], 'id_produit');
header('location: index.php');
?>