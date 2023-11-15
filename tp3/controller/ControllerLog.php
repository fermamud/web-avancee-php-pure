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
        ];
 
        $log = new Log;
        $selectLog = $log->insert($logData);
        $logAffichage = new Log;
        $selectLogAffchage = $logAffichage->select('id');

        return Twig::render('log.php', ['logs'=>$selectLogAffchage]);
    }

}

?>