<?php
echo "entrei no controller produit";
RequirePage::model('CRUD');
RequirePage::model('Produit');
RequirePage::model('Material');
RequirePage::model('Artiste');

class ControllerProduit extends Controller {

    public function index() {
        $produit = new Produit;
        $select = $produit->select();
        $material = new Material;
        $selectMaterial = $material->select('id_material');
        $artiste = new Artiste;
        $selectArtiste = $artiste->select('id_usager');

        return Twig::render('produit-index.php', ['produits'=>$select, 'materials'=>$selectMaterial,'usagers'=>$selectArtiste]);
    }

    public function create() {
        $material = new Material;
        $selectMaterial = $material->select('id_material');
        $artiste = new Artiste;
        $selectArtiste = $artiste->select('id_usager');

        return Twig::render('produit-create.php', ['materials'=>$selectMaterial, 'usagers'=>$selectArtiste]);
    }

    public function store() {

        //Vérification des données saisies par l'utilisateur et si aucune donnée n'a été saisie, la méthode store redirige l'utilisateur vers la page du formulaire de création.
        if (isset($_POST['type']) && ($_POST['type'] != '') && isset($_POST['description']) && ($_POST['description'] != '') && isset($_POST['prix']) && ($_POST['prix'] != '') && isset($_POST['id_material']) && ($_POST['id_material'] != '') && isset($_POST['id_usager']) && ($_POST['id_usager'] != '')) {
            // echo "uhuuu";
            // var_dump($_POST);
            // die();
            $produit = new Produit;
            $insert = $produit->insert($_POST);  
            
            RequirePage::url('produit');
        } else {
            //VER COM MARCOS AMANHA COMO INSERIR MENSAGEM
            RequirePage::url('produit/create');
        }

    }

    public function edit($id = null) {
        if ($id != null) {
            $produit = new Produit;
            $selectId = $produit->selectId($id);
            $material = new Material;
            $selectMaterial = $material->select('id_material');
    
            return Twig::render('produit-edit.php', ['produit'=>$selectId, 'materials'=>$selectMaterial]);
        } else {
            RequirePage::url('produit');
        }
    }

    public function update() {
        if (isset($_POST['type']) && ($_POST['type'] != '') && isset($_POST['description']) && ($_POST['description'] != '') && isset($_POST['prix']) && ($_POST['prix'] != '') && isset($_POST['id_material']) && ($_POST['id_material'] != '') && isset($_POST['id_produit']) && ($_POST['id_produit'] != '')) {           
            print_r($_POST);
            $produit = new Produit;
            $update = $produit->update($_POST);

            RequirePage::url('produit');
        } else {
            RequirePage::url('produit');
        }
    }

    public function destroy($id = null) { 
        if ($id != null && is_numeric($id)) {
            $produit = new Produit;
            $delete = $produit->delete($id);

            RequirePage::url('produit');
        } else {
            RequirePage::url('produit');
        }
    }
}
?>