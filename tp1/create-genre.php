<?php
require_once('Classe/Footer.php');
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
        <p>Votre boutique en ligne préférée</p>
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
        <h1>Inserez Nouveau Genre</h1>
            <form action="genre-store.php" method="post">
                <label>Nom
                    <input type="text" name="nom">
                </label>
                <input type="submit" value="save">
            </form>
    </main>
    <?php
        echo $footerHTML;
    ?>
</body>

</html>