<?php
if(isset($_GET['id']) && $_GET['id']!=null ){
    $id = $_GET['id'];
    require_once('Classe/CRUD.php');
    $crud = new CRUD;
    $produit = $crud->selectId('produit', $id, 'id_produit');
    extract($produit);
}else{
    header('location:index.php');
}

$material = $crud->select('material');

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
        <p>Modification</p>
        <img src="assets/img/panier.svg" alt="image_panier">
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Liste des produits</a></li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
        <h1>Modifier les Informations sur le Produit</h1>
        <form action="produit-update.php" method="post">
            <input type="hidden" name="id_produit" value="<?= $id; ?>">
            <label>Type :
                <input type="text" name="type" value="<?= $type; ?>">
            </label>
            <label>Description :
                <input type="text" class="description" name="description"  value="<?= $description; ?>">
            </label>
            <label>Prix :
                <input type="number" name="prix"  value="<?= $prix; ?>">
            </label>
            <label>Material :
                <select name="id_material" >
                    <?php
                        foreach($material as $row) {
                            if ($id_material == $row['id_material']) {
                    ?>
                                <option selected value="<?= $id_material ?>"><?= $row['description'] ?></option>
                    <?php
                            } else {
                            ?>
                                <option value="<?= $row['id_material'] ?>"><?= $row['description'] ?></option>
                            <?php
                            }
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