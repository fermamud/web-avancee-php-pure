<?php
require_once('Classe/CRUD.php');
require_once('Classe/Footer.php');
$crud = new CRUD;
$genre = $crud->select('genre');

$footer = new Footer;
$footerHTML = $footer->getFooterHTML();
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
    <?php
        echo $footerHTML;
    ?>
</body>

</html>