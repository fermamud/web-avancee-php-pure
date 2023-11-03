<?php
RequirePage::model('CRUD');
RequirePage::model('Genre');

class ControllerGenre extends Controller {
    
    public function index() {
        $genre = new Genre;
        $selectGenre = $genre->select('id_genre');

        return Twig::render('liste-genres.php', ['genres'=>$selectGenre]);
    }

    public function create() {
        return Twig::render('genre-create.php');
    }

    public function store() {  
        if (isset($_POST['nom_genre']) && ($_POST['nom_genre'] != '')) {
            $genre = new Genre;
            $insert = $genre->insert($_POST);  
            
            RequirePage::url('genre');
        } else {
            RequirePage::url('genre');
        }
    }

    public function destroy($id = null) {
        if ($id != null && is_numeric($id)) {
            $genre = new Genre;
            $delete = $genre->delete($id);

            RequirePage::url('genre');
        } else {
            RequirePage::url('genre');
        }
    }

}

?>