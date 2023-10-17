<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$insert = $crud->insert('genre', $_POST);
header('location: liste-genres.php');
?>