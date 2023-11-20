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

    public function edit($id = null) {  

        if (isset($_SESSION) && $_SESSION['privilege'] == 1 && $id != null) {
            $artiste = new Artiste;
            $selectId = $artiste->selectId($id);
            $genre = new Genre;
            $selectGenre = $genre->select('id_genre');
    
            return Twig::render('artiste-edit.php', ['artiste'=>$selectId, 'genres'=>$selectGenre]);
        } else {
            RequirePage::url('artiste');
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
        CheckSession::sessionAuth();
        if ($_SESSION['privilege'] == 1) {
            if ($id != null && is_numeric($id)) {
                $artiste = new Artiste;
                $delete = $artiste->delete($id);

                RequirePage::url('artiste');
            } else {
                RequirePage::url('artiste');
            }
        } else {
            RequirePage::url('artiste');
        } 
    }
}

?>