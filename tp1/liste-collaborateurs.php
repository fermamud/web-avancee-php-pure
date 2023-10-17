<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$usager = $crud->select('usager');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fernanda Mamud</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <img src="assets/img/logo.svg" alt="image_logo">
        <p>Liste de Collaborateurs</p>
        <img src="assets/img/panier.svg" alt="image_panier">
    </header>
    <nav>
        <ul>
            <li>À propos</li>
            <li><a href="index.php">Liste des produits</a></li>
            <li><a href="liste-genres.php">Liste des genres</a></li>
        </ul>
    </nav>
    <main>
    <?php
        foreach($usager as $row) {
    ?>
        <p>Usager : <?= $row['id_usager'] ?></p>
        <p>Nom : <?= $row['nom'] ?></p>
        <p>Prenom : <?= $row['prenom'] ?></p>
        <p>Genre : <?php $genre = $crud->selectId('genre', $row['id_genre'], 'id_genre'); ?>
        <?= $genre['nom'] ?></p>
        <a href="collaborateur-edit.php?id=<?= $row['id_usager'] ?>">Modifier vos informations</a> | 
        <a href="collaborateur-delete.php?id=<?= $row['id_usager'] ?>">Supprimer collaborateur</a>
        <br>
        <br>
    <?php
        }
    ?>
    <a href="create-collaborateur.php">Travaillez avec nous</a>
    </main>
    <footer>
        <div>
            @2023 - Fernanda Mamud
        </div>
        <div>
            <img src="assets/img/instagram.svg" alt="">
            <img src="assets/img/facebook.svg" alt="">
            <img src="assets/img/whatsapp.svg" alt="">
        </div>
    </footer>
</body>

</html>