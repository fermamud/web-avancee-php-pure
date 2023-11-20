<?php
session_start();
var_dump($_SESSION);
define('PATH_DIR', 'http://localhost/WebAvancee22635-Fernanda/tp3/');
//define('IMAGE_PATH', '/WebAvancee22635-Fernanda/tp3/');
require_once('controller/Controller.php');
require_once('library/RequirePage.php');
require_once __DIR__.'/vendor/autoload.php';
require_once('library/Twig.php');
require_once('library/CheckSession.php');
require_once('controller/ControllerLog.php');

$url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';

//var_dump($_FILES);
// var_dump($_SERVER);

//Gestion do mon journal de bord
//$log = new ControllerLog;
//echo $log->index();


if ($url == '/') {
    require_once('controller/ControllerHome.php');
    $controller = new ControllerHome;
    echo $controller->index();
} else {
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__ . "/controller/Controller" . $requestURL . ".php";
    
    if (file_exists($controllerPath)) {
        require_once($controllerPath);
        $controllerName = 'Controller' . $requestURL;
        $controller = new $controllerName;
        if (isset($url[1]) && method_exists($controller, $url[1])) {
            $method = $url[1];
            if(isset($url[2])){
                echo $controller->$method($url[2]);
            }else{
                echo $controller->$method();
            }

            
            //$method = $url[1];
            //if (isset($url[2])) {
            // if (isset($url[2])) {
            //     $value = $url[2];
            //     if ($value) echo "value exists";
            //     var_dump($url);
            //     var_dump($url[2]);
                // die();
                // Gestion des erreurs si l'utilisateur tente de saisir une valeur qui n'existe pas
                //if (method_exists($controller, $value)) echo $controller->$method($value);
                //else echo $controller->index();
                //die();
                //if ($url[2]) {
                //else echo $controller->$method();

            //} else {
                // Gestion des erreurs si l'utilisateur tente de saisir une méthode qui n'existe pas
                //if (method_exists($controller, $method)) echo $controller->$method();
                //else echo $controller->index();
            //}
        } else {
            echo $controller->index();
        }
    } else {
        require_once('controller/ControllerHome.php');
        $controller = new ControllerHome;
        echo $controller->error('404');
    }
}
?>


<!-- $logData = [
    'timestamp' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'url' => $_SERVER['REQUEST_URI'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'message' => 'Mensagem de log aqui.',
]; -->