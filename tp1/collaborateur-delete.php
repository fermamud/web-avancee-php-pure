<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$delete = $crud->delete('usager', $_GET['id'], 'id_usager');
header('location: liste-collaborateurs.php');
?>