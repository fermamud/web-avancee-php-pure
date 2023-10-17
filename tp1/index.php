<?php
require_once('Classe/CRUD.php');
//require_once('Classe/Footer.php');
$crud = new CRUD;
$produit = $crud->select('produit');
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
        <p>Votre boutique en ligne préférée</p>
        <img src="assets/img/panier.svg" alt="image_panier">
    </header>
    <nav>
        <ul>
            <li><a href="#boucle">Boucle d'oreille</a></li>
            <li><a href="#collier">Collier</a></li>
            <li>À propos</li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
        <h1>Fait main, avec amour</h1>
        <div id="collier">
            <h2>Collier</h2>
            <?php
                foreach($produit as $row) {
                    if ($row['type'] == 'Collier') {
            ?>
                <section>
                    <img src="assets/img/<?= $row['id_produit'] ?>.jpeg" alt="image_collier">
                    <div>
                        <p>Type : <?= $row['type']?></p>
                        <p>Description : <?= $row['description']?></p>
                        <p>Material : <?= $row['id_material']?></p>
                        <p>Prix : <?= $row['prix']?></p>
                        <p>Artiste : 
                        <?php $artiste = $crud->selectId('usager', $row['id_usager'], 'id_usager')?>
                        <?= $artiste['prenom'] ?> <?= $artiste['nom'] ?></p>
                        <a href="produit-edit.php?id=<?= $row['id_produit'] ?>">Modifier les informations</a> | 
                        <a href="produit-delete.php?id=<?= $row['id_produit'] ?>">Supprimer produit</a>
                    </div>
                </section>
            <?php
                    }
                }
            ?>
        </div>
        <div id="boucle">
            <h2>Boucle d'oreille</h2>
            <?php
                foreach($produit as $row) {
                    if ($row['type'] == 'Boucle d\'oreille') {
            ?>
                <section>
                    <img src="assets/img/<?= $row['id_produit'] ?>.jpeg" alt="image_boucle">
                    <div class="produit">
                        <p>Type : <?= $row['type']?></p>
                        <p>Description : <?= $row['description']?></p>
                        <p>Material : <?= $row['id_material']?></p>
                        <p>Prix : <?= $row['prix']?> CAD</p>
                        <p>Artiste : 
                        <?php $artiste = $crud->selectId('usager', $row['id_usager'], 'id_usager')?>
                        <?= $artiste['prenom'] ?> <?= $artiste['nom'] ?></p>
                        <a href="produit-edit.php?id=<?= $row['id_produit'] ?>">Modifier les informations</a> | 
                        <a href="produit-delete.php?id=<?= $row['id_produit'] ?>">Supprimer produit</a>
                    </div>
                </section>
            <?php
                    }
                }
            ?>
        </div>
        <br>
        <a href="create-produit.php">Insérer un nouveau produit</a>
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
    <?php
    //$footer = new Footer;
    //$footer2 = $footer->footer();
    ?>
</body>

</html>