<?php
RequirePage::model('CRUD');
RequirePage::model('Artiste');
RequirePage::model('Genre');
RequirePage::library('Validation');

class ControllerArtiste extends Controller {

    public function index() {
        $artiste = new Artiste;
        $selectArtiste = $artiste->select('id_usager');
        $genre = new Genre;
        $selectGenre = $genre->select('id_genre');

        return Twig::render('liste-artiste.php', ['artistes'=>$selectArtiste, 'genres'=>$selectGenre]);
    }

    public function create() {
        return Twig::render('artiste-create.php');
    }

    public function store() {
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->max(45)->min(3);
        $validation->name('prenom')->value($prenom)->max(45)->min(3);
        $validation->name('nom_genre')->value($nom_genre)->max(20)->min(3);

        if(!$validation->isSuccess()) {
            $errors = $validation->displayErrors();

            // return Twig::render('artiste-create.php', ['errors' => $errors, 'artiste' => $_POST]);
            return Twig::render('artiste-create.php', ['errors' => $errors]);
            exit();
        } else {
            $genre = new Genre;
            $insertGenre = $genre->insert($_POST);
            $_POST['id_genre'] = $insertGenre;

            $artiste = new Artiste;
            //$update = $artiste->update($_POST);
            $insert = $artiste->insert($_POST);
            RequirePage::url('artiste');
        }
    }

    public function edit($id = null) {
        // echo $id;
        // var_dump($_SESSION);
        // die();


        if (isset($_SESSION) && $_SESSION['privilege'] == 1 && $id != null) {
            $artiste = new Artiste;
            $selectId = $artiste->selectId($id);
            $genre = new Genre;
            $selectGenre = $genre->select('id_genre');
    
            return Twig::render('artiste-edit.php', ['artiste'=>$selectId, 'genres'=>$selectGenre]);
        } else {
            RequirePage::url('artiste', ['errors' => 'errado']);
        }
 
    }

    public function update() {
        // Pour vous assurer que certaines informations ont été saisies et ne pas autoriser l'accès à la mise à jour via URL
        if (isset($_POST) && !empty($_POST)) {
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->max(45)->min(5);
        $validation->name('prenom')->value($prenom)->max(45)->min(5);

            if(!$validation->isSuccess()) {
                $genre = new Genre;
                $selectGenre = $genre->select('id_genre');
                $errors = $validation->displayErrors();

                return Twig::render('artiste-edit.php', ['errors' => $errors, 'genres'=>$selectGenre, 'artiste' => $_POST]);
                exit();
            } else {
                $genre = new Genre;
                $selectGenre = $genre->select('id_genre');

                $artiste = new Artiste;
                $update = $artiste->update($_POST);
                RequirePage::url('artiste');
            }
        } else {
            RequirePage::url('artiste');
        }
    }

    public function destroy($id = null) {
        if ($id != null && is_numeric($id)) {
            $artiste = new Artiste;
            $delete = $artiste->delete($id);

            RequirePage::url('artiste');
        } else {
            RequirePage::url('artiste');
        }
    }
}

?>