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

var_dump($_FILES);
// var_dump($_SERVER);
// if ($_SESSION && ($_SESSION['privilege'] == 1)) {
//     if ($_SERVER) {
//         $log = new ControllerLog;

        //essa deixei comentada
        //$log->index();
//     }
// }

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
        //FAZER MAIS TESTES AQUI!!!!!!!!!!!!!!!
        //if (isset($url[1])) {
        //     $method = $url[1];
        //     if (method_exists($controller, $method)) {
        //         echo $controller->$method(); 
        //         if (isset($url[2])) echo $controller->$method($url[2]); 
        //     } else {
        //         echo $controller->index();
        //     }           
        // } else {
        //     echo $controller->index();
        // }
        if (isset($url[1])) {
            $method = $url[1];
            if (isset($url[2])) {
                echo $controller->$method($url[2]); 
            } else {
                // Gestion des erreurs si l'utilisateur tente de saisir une méthode qui n'existe pas
                if (method_exists($controller, $method)) echo $controller->$method();
                else echo $controller->index();
            }
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