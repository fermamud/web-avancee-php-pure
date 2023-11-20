<?php
RequirePage::model('CRUD');
RequirePage::model('Produit');
RequirePage::model('Material');
RequirePage::model('Artiste');
RequirePage::library('Validation');

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
        CheckSession::sessionAuth();
        if($_SESSION['privilege'] == 1) {
            $material = new Material;
            $selectMaterial = $material->select('id_material');
            $artiste = new Artiste;
            $selectArtiste = $artiste->select('id_usager');

            return Twig::render('produit-create.php', ['materials'=>$selectMaterial, 'usagers'=>$selectArtiste]);
        } else {
            RequirePage::url('produit');
        }
    }

    public function store() {
        if (isset($_POST) && !empty($_POST)) {
            $validation = new Validation;
            extract($_POST);
            $validation->name('description')->value($description)->max(250)->min(10);
            $validation->name('prix')->value($prix)->pattern('int')->required();
            
            if(!$validation->isSuccess()) {
                $material = new Material;
                $selectMaterial = $material->select('id_material');
                $artiste = new Artiste;
                $selectArtiste = $artiste->select('id_usager');
                $errors = $validation->displayErrors();
                
                return Twig::render('produit-create.php', ['materials'=>$selectMaterial, 'usagers'=>$selectArtiste, 'errors' => $errors, 'produit' => $_POST]);
                exit();
            } else {
                $produit = new Produit;

                //Gestion des images reçues
                $target_dir = "/WebAvancee22635-Fernanda/tp3/view/uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                // Vérifiez si le fichier image est une image réelle ou une fausse image
                if(isset($_POST["submit"])) {
                    if ($_FILES["image"]["tmp_name"]) {               
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if($check !== false) {
                            $uploadOk = 1;
                        } else {
                            $uploadOk = 0;
                        }
                    } else {
                        $errors = "Vous devez ajouter une image.";
                        return Twig::render('produit-index.php', ['errors' => $errors]);
                    }
                }

                // Vérifiez si le fichier existe déjà
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $target_file)) {
                    $uploadOk = 0;
                    $errors = "Le fichier existe déjà.";
                    return Twig::render('produit-index.php', ['errors' => $errors]);
                }


                if ($uploadOk == 0) {
                    $errors = "Votre fichier n'a pas été téléchargé.";
                    return Twig::render('produit-index.php', ['errors' => $errors]);

                // Si tout va bien, essayez de télécharger le fichier
                } else {

                    // Donner un nom et une direction à l'image
                    $uploadfile = $_SERVER['DOCUMENT_ROOT'].$target_dir.$_FILES["image"]["name"];
                    
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadfile)) {

                        // Unset le post submit qui a aidé avec le téléchargement d'images
                        unset($_POST['submit']);
                        $_POST['image'] = $_FILES["image"]['name'];
                            
                        $insert = $produit->insert($_POST);
                        RequirePage::url('produit');
                    } else {
                        $errors = "Une erreur s'est produite lors du téléchargement de votre fichier.";
                        return Twig::render('produit-index.php', ['errors' => $errors]);
                    }
                }
            }
        } else {
            RequirePage::url('produit');
        }
    }

    public function edit($id = null) {
        CheckSession::sessionAuth();
        if ($_SESSION['privilege'] == 1 || $_SESSION['privilege'] == 2) {
            if ($id != null) {
                $produit = new Produit;
                $selectId = $produit->selectId($id);

                // Pour s'assurer que seul l'utilisateur qui a créé l'accessoire peut modifier les informations le concernant ou le admin
                if ($selectId['id_usager'] == $_SESSION['id_usager'] || $_SESSION['privilege'] == 1) {
                    $material = new Material;
                    $selectMaterial = $material->select('id_material');
            
                    return Twig::render('produit-edit.php', ['produit'=>$selectId, 'materials'=>$selectMaterial]);
                }
                else {
                    RequirePage::url('produit');    
                }
            } else {
                RequirePage::url('produit');
            }
        } else {
            RequirePage::url('produit');
        }
    }

    public function update() {
        if (isset($_POST) && !empty($_POST)) {
            $validation = new Validation;
            extract($_POST);
            $validation->name('type')->value($type)->max(50)->min(5);
            $validation->name('description')->value($description)->max(250)->min(10);
            $validation->name('prix')->value($prix)->pattern('int')->required();

            if(!$validation->isSuccess()) {
                $material = new Material;
                $selectMaterial = $material->select('id_material');
                $errors = $validation->displayErrors();

                return Twig::render('produit-edit.php', ['materials'=>$selectMaterial,  'errors' => $errors, 'produit' => $_POST]);
                exit();
            } else {
                $produit = new Produit;
                $update = $produit->update($_POST);
                RequirePage::url('produit');
            }
        } else {
            RequirePage::url('produit');
        }
    }

    public function destroy($id = null) {
        CheckSession::sessionAuth();
        if ($_SESSION['privilege'] == 1 || ($_SESSION['privilege'] == 2)) {
            if ($id != null && is_numeric($id)) {
                $produit = new Produit;
                $selectId = $produit->selectId($id);

                if ($selectId['id_usager'] == $_SESSION['id_usager'] || $_SESSION['privilege'] == 1) {
                    $delete = $produit->delete($id);

                    RequirePage::url('produit');
                } else {
                    RequirePage::url('produit');    
                }
            } else {
                RequirePage::url('produit');
            }
        } else {
            RequirePage::url('produit');
        }
    }
}

?>