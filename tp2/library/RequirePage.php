<?php

class RequirePage {
    // ver pq eh static
    static public function model($model) {
        return require_once('model/' . $model . '.php');
    }

    static public function header($title) {
        return '
        <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Fernanda Mamud</title>
                <link rel="stylesheet" href="' . PATH_DIR . 'assets/css/styles.css">
            </head>
            <body>
                <header>
                    <img src="' . PATH_DIR . 'assets/img/logo.svg" alt="image_logo">
                    <p>Votre boutique en ligne préférée</p>
                    <img src="' . PATH_DIR . 'assets/img/panier.svg" alt="image_panier">
                </header>
                <nav>
                    <ul>
                        <li><a href="#boucle">Boucle d\'oreille</a></li>
                        <li><a href="#collier">Collier</a></li>
                        <li>À propos</li>
                        <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
                    </ul>
                </nav>';
    }

    static public function headerCreateProduit($title) {
        return '
        <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Fernanda Mamud</title>
                <link rel="stylesheet" href="' . PATH_DIR . 'assets/css/styles.css">
            </head>
            <body>
                <header>
                    <img src="' . PATH_DIR . 'assets/img/logo.svg" alt="image_logo">
                    <p>Votre boutique en ligne préférée</p>
                    <img src="' . PATH_DIR . 'assets/img/panier.svg" alt="image_panier">
                </header>
                <nav>
                    <ul>
                        <li>À propos</li>
                        <li><a href="' . PATH_DIR . 'index/produit">Liste des Produits</a></li>
                        <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
                    </ul>
                </nav>';
    // MUDAR ESSES CAMINHOS DPS DE FALAR COM O MARCOS
    }

    // ver pra que serve isso
    static public function url($url){
        header('location:'.PATH_DIR.$url);
    }
}

?>