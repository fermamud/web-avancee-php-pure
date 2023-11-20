<?php
RequirePage::model('CRUD');
RequirePage::model('Log');

class ControllerLog extends Controller {

    public function index() {
        //var_dump($_SERVER);

        $logData = [
            'adresse_ip' => $_SERVER['REMOTE_ADDR'],
            'nom' => $_SERVER['HTTP_USER_AGENT'],
            'date' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
            'page' => $_SERVER['REQUEST_URI']
        ];
 

        //duas funcoes, insert eu chamo no index
        $log = new Log;
        $selectLog = $log->insert($logData);
    }

    public function affichage() {

        //tbm procuro o affiche
        $logAffichage = new Log;
        $selectLogAffichage = $logAffichage->select('id');

        return Twig::render('log.php', ['logs'=>$selectLogAffichage]);
    }

}

?>