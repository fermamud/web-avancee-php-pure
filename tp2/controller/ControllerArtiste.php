<?php
echo "entrei no controller collaborateur";
RequirePage::model('CRUD');
RequirePage::model('Artiste');
RequirePage::model('Genre');

class ControllerArtiste extends Controller {

    public function index() {
        $artiste = new Artiste;
        $selectArtiste = $artiste->select('id_usager');
        $genre = new Genre;
        $selectGenre = $genre->select('id_genre');

        return Twig::render('liste-artiste.php', ['artistes'=>$selectArtiste, 'genres'=>$selectGenre]);
    }

    public function create() {
        $genre = new Genre;
        $selectGenre = $genre->select('id_genre');

        return Twig::render('artiste-create.php', ['genres'=>$selectGenre]);
    }

    public function store() {
        if (isset($_POST['nom']) && ($_POST['nom'] != '') && isset($_POST['prenom']) && ($_POST['prenom'] != '') && isset($_POST['id_genre']) && ($_POST['id_genre'] != '')) {
            $artiste = new Artiste;
            $insert = $artiste->insert($_POST);  
            
            RequirePage::url('artiste');
        } elseif ((!isset($_POST['nom'])) || (!isset($_POST['prenom'])) || (!isset($_POST['id_genre']))) {
            $error_message = "Le lien 'Travaillez avec nous' doivent être accédé avant.";

            return Twig::render('liste-artiste.php', ['error_message' => $error_message]);
        } elseif (($_POST['nom'] == '') || ($_POST['prenom'] == '') || ($_POST['id_genre'] == '')) {
            $error_message = "Toutes les données doivent être saisies.";

            return Twig::render('liste-artiste.php', ['error_message' => $error_message]);
        } else {
            RequirePage::url('artiste');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
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
        if (isset($_POST['nom']) && ($_POST['nom'] != '') && isset($_POST['prenom']) && ($_POST['prenom'] != '') && isset($_POST['id_genre']) && ($_POST['id_genre'] != '')) {           
            $artiste = new Artiste;
            $update = $artiste->update($_POST);

            RequirePage::url('artiste');
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