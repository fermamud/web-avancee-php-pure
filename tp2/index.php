<?php

define('PATH_DIR', 'http://localhost:80/WebAvancee22635-Fernanda/tp2/tp2/');
require_once('controller/Controller.php');
require_once('library/View.php');
require_once('library/RequirePage.php');
require_once __DIR__.'/vendor/autoload.php';
require_once('library/Twig.php');

// entender melhor o explode e o path_info
$url = isset($_SERVER['PATH_INFO'])? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
print_r ($url);

if ($url == '/') {
    require_once('controller/ControllerHome.php');
    $controller = new ControllerHome;
    echo $controller->index();
} else {
    //controller
    $requestURL = $url[0];
    //echo $requestURL;
    $requestURL = ucfirst($requestURL);
    //echo $requestURL;
    $controllerPath = __DIR__ . "/controller/Controller" . $requestURL . ".php";
    echo $controllerPath;
    
    // DIFERENTE DO MARCOS SE EU ESCREVER SO /HOME ELE NAO FUNCIONA, VER DPS
    if (file_exists($controllerPath)) {
        require_once($controllerPath);
        $controllerName = 'Controller' . $requestURL;
        $controller = new $controllerName;
        if (isset($url[1])) {
            $method = $url[1];
            if (isset($url[2])) {
                echo $controller->$method($url[2]); 
            } else {
                echo $controller->$method();
            }
        } else {
            echo $controller->index();
            echo "aqui";
        }
    } else {
        echo 'entrei aqui';
        require_once('controller/ControllerHome.php');
        $controller = new ControllerHome;
        echo $controller->error('404');
    }
}
?>