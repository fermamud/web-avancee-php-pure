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
        // $view->output('materials', $selectMaterial);
        // $view->output('usagers', $selectArtiste);

        return Twig::render('produit-create.php', ['materials'=>$selectMaterial, 'usagers'=>$selectArtiste]);
    }

    public function store() {

        $produit = new Produit;
        $insert = $produit->insert($_POST);  
        
        RequirePage::url('produit');
    }

    public function edit($id) {
        $produit = new Produit;
        $selectId = $produit->selectId($id);
        $material = new Material;
        $selectMaterial = $material->select('id_material');

        return Twig::render('produit-edit.php', ['produit'=>$selectId, 'materials'=>$selectMaterial]);
    }

    public function update() {
        print_r($_POST);
        $produit = new Produit;
        $update = $produit->update($_POST);
        RequirePage::url('produit/index');
    }

    public function destroy($id) {
        $produit = new Produit;
        $delete = $produit->delete($id);
        RequirePage::url('produit/index');
    }
}
?>