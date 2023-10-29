<?php

class ControllerHome extends Controller {

    public function index() {
        echo "voce esta no index do controller home";
        $view = new View('home');
    }

    public function error($e = null) {
        return 'error ' . $e;
    }
}

?>