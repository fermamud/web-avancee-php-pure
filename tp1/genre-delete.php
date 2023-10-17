<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$delete = $crud->delete('genre', $_GET['id'], 'id_genre');
header('location: liste-genres.php');
?>