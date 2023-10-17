<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$genre = $crud->select('genre');
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
        <p>Liste des Genres</p>
        <img src="assets/img/panier.svg" alt="image_panier">
    </header>
    <nav>
        <ul>
            <li>À propos</li>
            <li><a href="index.php">Liste des produits</a></li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
    <?php
        foreach($genre as $row) {
    ?>
        <p>Nom : <?= $row['nom'] ?></p> 
        <a href="genre-delete.php?id=<?= $row['id_genre'] ?>">Supprimer</a>
        <br>
        <br>
    <?php
        }
    ?>
    <a href="create-genre.php">Inserez nouveau genre</a>
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