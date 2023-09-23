<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header><h1>Clinique Vétérinaire Chat Heureux</h1></header>
    <main>
        <?php
        require_once('Classe/Pet.php');
        require_once('Classe/Owner.php');
        ?>

        <section>
            <div>
                <?php
                    $pet1 = new Pet();
                    $pet1->setProps('Leo', '2017-07-01');
                    echo $pet1->getProps();
                ?>
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
                    $pet2->setProps('Catinga', '2018-01-19');
                    echo $pet2->getProps();
                ?>
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

<!-- $pet1->type = 'dog';
var_dump($owner1);
print_r($owner1);
var_dump($pet1); -->