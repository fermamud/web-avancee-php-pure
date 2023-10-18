<?php
require_once('Classe/CRUD.php');
require_once('Classe/Footer.php');
$crud = new CRUD;
$material = $crud->select('material');
$artiste = $crud->select('usager');

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
        <p>Insertion</p>
        <img src="assets/img/panier.svg" alt="image_panier">
    </header>
    <nav>
        <ul>
            <li>À propos</li>
            <li><a href="index.php">Liste des Produits</a></li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
        <h1>Inserez les Informations de Votre Produit</h1>
            <form action="produit-store.php" method="post">
                <label>Type
                    <select name="type" >
                        <option value="Collier">Collier</option>
                        <option value="Boucle">Boucle d'oreille</option>
                    </select>
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
    <?php
        echo $footerHTML;
    ?>
</body>

</html>