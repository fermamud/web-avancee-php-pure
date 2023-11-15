<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fernanda Mamud</title>
        <link rel="stylesheet" href="{{path}}assets/css/styles.css">
    </head>
    <body>
        <header>
            <img src="{{path}}assets/img/logo.svg" alt="image_logo">
            <p>Votre boutique en ligne préférée</p>
            <img src="{{path}}assets/img/panier.svg" alt="image_panier">
        </header>
        <nav>
            <ul>
                <li><a href="{{path}}home">Accueil</a></li>
                <li><a href="{{path}}produit">Liste des produits</a></li>
                <li><a href="{{path}}artiste">Liste des artistes</a></li>
                <li><a href="{{path}}genre">Liste des genres</a></li>
                {% if session.privilege == 1 %}
                <li><a href="{{path}}log">Log</a></li>
                {% endif %}
            </ul>
        </nav>