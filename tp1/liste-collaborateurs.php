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
            <li><a href="#boucle">Boucle d'oreille</a></li>
            <li>Collier</li>
            <li>Bague</li>
            <li>Bracelet de cheville</li>
            <li>À propos</li>
            <li><a href="liste-produit.php">Liste des produits</a></li>
        </ul>
    </nav>
    <main>
    <?php
        foreach($usager as $row) {
    ?>
        <p>Id : <?= $row['id_usager']?></p>
        <p>Nom : <?= $row['nom']?></p>
        <p>Prenom : <?= $row['prenom']?></p>
        <p>Genre : <?= $row['id_genre']?></p>
        <a href="collaborateur-edit.php?id=<?= $row['id_usager'] ?>">Modifier vos informations</a>
        <!-- TIRAR BR DEPOIS -->
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