<?php
session_start();
define('PATH_DIR', 'http://localhost:8080/repo/tp1-taskFlow/');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
require(__DIR__ . '/vendor/autoload.php');

require_once(__DIR__ . '/controller/Controller.php');
require_once(__DIR__ . '/library/RequirePage.php');
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/library/Twig.php');
require_once(__DIR__ . '/library/CheckSession.php');

RequirePage::model('Crud');
RequirePage::model('Log');


/**
 * Point d'entrée de l'application web.
 */
$url = isset($_GET["url"]) ? explode('/', ltrim($_GET["url"], '/')) : '/';

if ($url == '/') {    
    $controllerHome = __DIR__ . '/controller/ControllerHome.php';  
    require_once $controllerHome;
    $controller = new ControllerHome; 
    echo $controller->index(); 
} else {  
    $requestURL = $url[0]; 
    $requestURL = ucfirst($requestURL); 
    $controllerPath = __DIR__ . '/controller/Controller' . $requestURL . '.php'; 

    if (file_exists($controllerPath)) { 
        require_once($controllerPath); 

        // C'est ici que je veux insert dans ma base de donnée les logs
        $log = new Log;
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
        $data = [
            'ipAddress' => $_SERVER['REMOTE_ADDR'],
            'date' => date('d F Y'),
            'username' => $username,
            'pageUrl' => $controllerPath
        ];
        $log->insert($data);

        $controllerName = 'Controller' . $requestURL; 
        $controller = new $controllerName;

        if (isset($url[1])) {  
            $method = $url[1]; 
            if (isset($url[2])) { 
                $id = $url[2]; 
                echo $controller->$method($id);   
            } else {
                echo $controller->$method(); 
            }
        } else {
            echo $controller->index();   
        }
    } else {
        $controllerHome = __DIR__ . '/controller/ControllerHome.php';
        require_once $controllerHome;
        $controller = new ControllerHome;  
        echo $controller->error(); 
    }
}

