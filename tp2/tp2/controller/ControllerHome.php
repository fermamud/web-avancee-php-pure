<?php

class ControllerHome extends Controller {

    public function index() {
        echo "voce esta no index do controller home";
        //$view = new View('home');
        return Twig::render('home.php');
    }

    public function error($e = null) {
        return Twig::render('404.html');
    }
}

?>