<?php
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
        // Condition si toutes les informations nécessaires ont été correctement saisies
        if (isset($_POST['type']) && ($_POST['type'] != '') && isset($_POST['description']) && ($_POST['description'] != '') && isset($_POST['prix']) && ($_POST['prix'] != '') && isset($_POST['id_material']) && ($_POST['id_material'] != '') && isset($_POST['id_usager']) && ($_POST['id_usager'] != '')) {

            $produit = new Produit;
            $insert = $produit->insert($_POST);  
            
            RequirePage::url('produit');
        
        // Condition si la personne essaie de saisir des informations sans être passée par le lien d'insertion du produit
        } elseif ((!isset($_POST['type'])) || (!isset($_POST['description'])) || (!isset($_POST['prix'])) || (!isset($_POST['id_material'])) || (!isset($_POST['id_usager']))) {
            $error_message = "Le lien 'Insérer un nouveau produit' doivent être accédé avant.";
            
            return Twig::render('produit-index.php', ['error_message' => $error_message]);

        // Condition si la personne essaie d'envoyer un formulaire avec des champs vides
        } elseif (($_POST['type'] == '') || ($_POST['description'] == '') || ($_POST['prix'] == '') || ($_POST['id_material'] == '') || ($_POST['id_usager'] == '')) {
            $error_message = "Toutes les données doivent être saisies.";
            
            return Twig::render('produit-index.php', ['error_message' => $error_message]);

        // Redirection des pages pour les cas d'erreurs qui n'ont pas de traitement spécifique
        } else {
            RequirePage::url('produit');
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
        // Condition si toutes les informations nécessaires ont été correctement saisies
        if (isset($_POST['type']) && ($_POST['type'] != '') && isset($_POST['description']) && ($_POST['description'] != '') && isset($_POST['prix']) && ($_POST['prix'] != '') && isset($_POST['id_material']) && ($_POST['id_material'] != '')) {           
            $produit = new Produit;
            $update = $produit->update($_POST);

            RequirePage::url('produit');

        // Condition si la personne essaie de saisir des informations sans être passée par le lien de modification du produit
        } elseif ((!isset($_POST['type'])) || (!isset($_POST['description'])) || (!isset($_POST['prix'])) || (!isset($_POST['id_material']))) {
            $error_message = "Le lien 'Modifier les informations' doivent être accédé avant.";
            
            return Twig::render('produit-index.php', ['error_message' => $error_message]);
        
        // Condition si la personne essaie d'envoyer un formulaire avec des champs vides
        } elseif (($_POST['type'] == '') || ($_POST['description'] == '') || ($_POST['prix'] == '') || ($_POST['id_material'] == '')) {
            $error_message = "Toutes les données doivent être saisies.";
            
            return Twig::render('produit-index.php', ['error_message' => $error_message]);
        
        // Redirection des pages pour les cas d'erreurs qui n'ont pas de traitement spécifique
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