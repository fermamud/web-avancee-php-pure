<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$insert = $crud->insert('usager', $_POST);
header('location: liste-collaborateurs.php');
?>