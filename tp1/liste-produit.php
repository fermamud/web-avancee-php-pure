<?php
require_once('Classe/CRUD.php');
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
            <li>Collier</li>
            <li>Bague</li>
            <li>Bracelet de cheville</li>
            <li>À propos</li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
        <h1>Fait main, avec amour</h1>
        <div>
            <h2>Collier</h2>
            <?php
                foreach($produit as $row) {
            ?>
                <section>
                    <img src="assets/img/collier.jpeg" alt="">
                    <div>
                        <p>Description : <?= $row['description']?></p>
                        <p>Material : <?= $row['id_material']?></p>
                        <p>Prix : <?= $row['prix']?></p>
                        <p>Artiste : <?= $row['id_usager']?></p>
                    </div>
                </section>
            <?php
                }
            ?>


                <!-- <img src="assets/img/collier.jpeg" alt="">
                <div>
                    <p>
                        Description : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta quasi voluptates
                        eos
                        laudantium vel eius veniam laborum! Libero, aliquid error dolores alias maiores illum id dolorum
                        dicta
                        expedita minima suscipit.
                    </p>
                    <p>
                        Material : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, ducimus ipsum.
                        Nulla,
                        aliquid, praesentium voluptatibus veniam, ex vel tempora dicta voluptas quo ipsam ea iste.
                        Officia
                        at
                        illo consectetur nesciunt!
                    </p>
                </div> -->
            <!-- </section>
            <section>
                <img src="assets/img/collier.jpeg" alt="">
                <div>
                    <p>
                        Description : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta quasi voluptates
                        eos
                        laudantium vel eius veniam laborum! Libero, aliquid error dolores alias maiores illum id dolorum
                        dicta
                        expedita minima suscipit.
                    </p>
                    <p>
                        Material : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, ducimus ipsum.
                        Nulla,
                        aliquid, praesentium voluptatibus veniam, ex vel tempora dicta voluptas quo ipsam ea iste.
                        Officia
                        at
                        illo consectetur nesciunt!
                    </p>
                </div>
            </section> -->
        </div>
        <div id="boucle">
            <h2>Boucle d'oreille</h2>
            <section>
                <img src="assets/img/boucle.jpeg" alt="">
                <div>
                    <p>
                        Description : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta quasi voluptates
                        eos
                        laudantium vel eius veniam laborum! Libero, aliquid error dolores alias maiores illum id dolorum
                        dicta
                        expedita minima suscipit.
                    </p>
                    <p>
                        Material : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, ducimus ipsum.
                        Nulla,
                        aliquid, praesentium voluptatibus veniam, ex vel tempora dicta voluptas quo ipsam ea iste.
                        Officia
                        at
                        illo consectetur nesciunt!
                    </p>
                </div>
            </section>
            <section>
                <img src="assets/img/boucle.jpeg" alt="">
                <div>
                    <p>
                        Description : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta quasi voluptates
                        eos
                        laudantium vel eius veniam laborum! Libero, aliquid error dolores alias maiores illum id dolorum
                        dicta
                        expedita minima suscipit.
                    </p>
                    <p>
                        Material : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, ducimus ipsum.
                        Nulla,
                        aliquid, praesentium voluptatibus veniam, ex vel tempora dicta voluptas quo ipsam ea iste.
                        Officia
                        at
                        illo consectetur nesciunt!
                    </p>
                </div>
            </section>
        </div>
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