<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$update = $crud->update('usager', $_POST, 'id_usager');
header('location: liste-collaborateurs.php');
?>