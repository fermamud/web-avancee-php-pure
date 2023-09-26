<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1 - Fernanda Frata Mamud</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header><h1>My Happy Pet</h1></header>
    <main>
        <?php
        require_once('Classe/Pet.php');
        require_once('Classe/Owner.php');
        ?>

        <section>
            <div>
                <?php
                    $pet1 = new Pet();
                    $pet1->setProp('Leo', '2017-07-01');
                ?>
                <?= $pet1->getProp() ?> 
            </div>
            <div>
                <?php
                    $owner1 = new Owner('Fernanda', 'Montreal', 'H1X 2C4', '514-456-7890', 'fernanda@gmail.com');
                ?>
            </div>
            <img src="media/leo.jpg" alt="first_cat">
        </section>
        <section>
            <div>
                <?php
                    $pet2 = new Pet();
                    $pet2->setProp('Catinga', '2018-01-19', 'Dog');
                ?>
                <?= $pet2->getProp() ?>
            </div>
            <div>
                <?php
                    $owner2 = new Owner('Caio', 'Laval', 'H3C 6Z2', '514-123-4567', 'caiomatos@gmail.com');
                ?>
            </div>
            <img src="media/catinga.jpg" alt="second_cat">
        </section>
    </main>
    <footer>Contactez-nous</footer>
</body>
</html>