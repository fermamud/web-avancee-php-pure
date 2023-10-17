<?php
require_once('Classe/CRUD.php');
$crud = new CRUD;
$material = $crud->select('material');
$artiste = $crud->select('usager');
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
            <li>Collier</li>
            <li>Bague</li>
            <li>Bracelet de cheville</li>
            <li>À propos</li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
        <h1>Inserez les Informations de Votre Produit</h1>
            <form action="produit-store.php" method="post">
                <label>Type
                    <input type="text" name="type">
                </label>
                <label>Description
                    <input type="text" name="description">
                </label>
                <label>Prix
                    <input type="number" name="prix">
                </label>
                <label>Material
                    <select name="id_material" >
                        <?php
                            foreach($material as $row) {
                        ?>
                        <option value="<?= $row['id_material'] ?>"><?= $row['description'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </label>
                <label>Collaborateur
                    <select name="id_usager" >
                        <?php
                            foreach($artiste as $row) {
                        ?>
                        <option value="<?= $row['id_usager'] ?>"><?= $row['prenom'] ?> <?= $row['nom'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </label>
                <input type="submit" value="save">
            </form>
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