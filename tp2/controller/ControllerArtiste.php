<?php
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
        return Twig::render('artiste-create.php');
    }

    public function store() {
        // Condition si toutes les informations nécessaires ont été correctement saisies
        if (isset($_POST['nom']) && ($_POST['nom'] != '') && isset($_POST['prenom']) && ($_POST['prenom'] != '') && isset($_POST['nom_genre']) && ($_POST['nom_genre'] != '')) {
            // Instanciation de la classe Genre pour qu'un nouveau genre soit créé dans la BD en même temps qu'un artiste est créé
            $genre = new Genre;
            $insertGenre = $genre->insert($_POST);
            $_POST['id_genre'] = $insertGenre;

            $artiste = new Artiste;
            $insert = $artiste->insert($_POST);  
            
            RequirePage::url('artiste');
        
        // Condition si la personne essaie de saisir des informations sans être passée par le lien d'insertion d'artiste
        } elseif ((!isset($_POST['nom'])) || (!isset($_POST['prenom'])) || (!isset($_POST['nom_genre']))) {
            $error_message = "Le lien 'Travaillez avec nous' doivent être accédé avant.";

            return Twig::render('liste-artiste.php', ['error_message' => $error_message]);

        // Condition si la personne essaie d'envoyer un formulaire avec des champs vides        
        } elseif (($_POST['nom'] == '') || ($_POST['prenom'] == '') || ($_POST['nom_genre'] == '')) {
            $error_message = "Toutes les données doivent être saisies.";

            return Twig::render('liste-artiste.php', ['error_message' => $error_message]);
        
        // Redirection des pages pour les cas d'erreurs qui n'ont pas de traitement spécifique
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
        // Condition si toutes les informations nécessaires ont été correctement saisies
        if (isset($_POST['nom']) && ($_POST['nom'] != '') && isset($_POST['prenom']) && ($_POST['prenom'] != '') && isset($_POST['id_genre']) && ($_POST['id_genre'] != '')) {           
            $artiste = new Artiste;
            $update = $artiste->update($_POST);

            RequirePage::url('artiste');
        
        // Condition si la personne essaie de saisir des informations sans être passée par le lien de modification des informations
        } elseif ((!isset($_POST['nom'])) || (!isset($_POST['prenom'])) || (!isset($_POST['id_genre']))) {
            $error_message = "Le lien 'Modifier vos informations' doivent être accédé avant.";

            return Twig::render('liste-artiste.php', ['error_message' => $error_message]);

        // Condition si la personne essaie d'envoyer un formulaire avec des champs vides
        } elseif (($_POST['nom'] == '') || ($_POST['prenom'] == '') || ($_POST['id_genre'] == '')) {
            $error_message = "Toutes les données doivent être saisies.";

            return Twig::render('liste-artiste.php', ['error_message' => $error_message]);
        
        // Redirection des pages pour les cas d'erreurs qui n'ont pas de traitement spécifique
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