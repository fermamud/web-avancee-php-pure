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
        $material = new Material;
        $selectMaterial = $material->select('id_material');
        $artiste = new Artiste;
        $selectArtiste = $artiste->select('id_usager');

        return Twig::render('produit-create.php', ['materials'=>$selectMaterial, 'usagers'=>$selectArtiste]);
    }

    public function store() {
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
            $insert = $produit->insert($_POST);
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



    public function upload() {

        echo $_SERVER['DOCUMENT_ROOT'];
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";


        // writing in a sublfolder called image 
        $target_dir = "/WebAvancee22635-Fernanda/tp3/view/uploads/";
        //$target_dir = IMAGE_PATH . "view/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }


        // Check if file already exists
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }


        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

            // give a name and direction to the image - i changed the name to test.jpg...
            $uploadfile = $_SERVER['DOCUMENT_ROOT'].$target_dir.$_FILES["fileToUpload"]["name"];

            //echo $_SERVER['DOCUMENT_ROOT'];
            echo "<br><br>";
            echo $uploadfile;
                echo "<br><br>";

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $uploadfile)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>