<?php
RequirePage::model('CRUD');
RequirePage::model('Log');

class ControllerLog extends Controller {
    public function index() {
        // Créer la structure du tableau associative avec les données que nous voulons voir en résultat.
        $logData = [
            'adresse_ip' => $_SERVER['REMOTE_ADDR'],
            'nom' => $_SERVER['HTTP_USER_AGENT'],
            'date' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
            'page' => $_SERVER['REQUEST_URI'],
            'usager' => ((isset($_SESSION['privilege'])) && ($_SESSION['privilege'] == 1 || $_SESSION['privilege'] == 2)) ? 'admin ou emploi' : 'guest'
        ];
 
        $log = new Log;
        $selectLog = $log->insert($logData);
    }

    public function affichage() {

        // Affichage du journal de bord
        $logAffichage = new Log;
        $selectLogAffichage = $logAffichage->select('id');

        return Twig::render('log.php', ['logs'=>$selectLogAffichage]);
    }

}

?>