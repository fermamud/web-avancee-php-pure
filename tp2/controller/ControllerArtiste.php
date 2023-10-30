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

        $artiste = new Artiste;
        $insert = $artiste->insert($_POST);  
        
        RequirePage::url('artiste');
    }

    public function edit($id) {
        $artiste = new Artiste;
        $selectId = $artiste->selectId($id);
        $genre = new Genre;
        $selectGenre = $genre->select('id_genre');

        return Twig::render('artiste-edit.php', ['artiste'=>$selectId, 'genres'=>$selectGenre]);
    }

    public function update() {
        $artiste = new Artiste;
        $update = $artiste->update($_POST);
        RequirePage::url('artiste');
    }

    public function destroy($id) {
        $artiste = new Artiste;
        $delete = $artiste->delete($id);
        RequirePage::url('artiste');
    }
}

?>