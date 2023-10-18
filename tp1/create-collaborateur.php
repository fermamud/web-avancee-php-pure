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
        <h1>Inserez vos Informations Personnels</h1>
            <form action="collaborateur-store.php" method="post">
                <label>Nom
                    <input type="text" name="nom">
                </label>
                <label>Prenom
                    <input type="text" name="prenom">
                </label>
                <label>Genre
                    <select name="id_genre" >
                        <?php
                            foreach($genre as $row) {
                        ?>
                            <option value="<?= $row['id_genre'] ?>"><?= $row['nom'] ?></option>
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