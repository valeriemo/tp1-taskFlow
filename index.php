<?php
define('PATH_DIR', 'http://localhost:8080/repo/tp1-taskFlow/');
require_once(__DIR__ . '/controller/Controller.php');
require_once(__DIR__ . '/library/RequirePage.php');
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/library/Twig.php');

/**
 * Point d'entrée de l'application web.
 */
// Analyse de l'URL
//a partir de chaque fois qu'il trouve des "/"
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

// Gestion des routes
if ($url == '/') {    // Si l'URL est la racine (page d'accueil)
    $controllerHome = __DIR__ . '/controller/ControllerHome.php';  // Chemin vers le contrôleur de la page d'accueil
    require_once $controllerHome; 
    $controller = new ControllerHome; // Créer une instance du contrôleur de la page d'accueil
    echo $controller->index(); // Appeler la méthode index() du contrôleur et afficher le résultat
} else {  // Si ce n'est pas la racine (page controller-action)
    $requestURL = $url[0]; //Récupérer la première partie de l'URL (nom du contrôleur)
    $requestURL = ucfirst($requestURL); // Mettre en majuscule la première lettre du nom du contrôleur
    $controllerPath = __DIR__ . '/controller/Controller' . $requestURL . '.php'; // Chemin vers le fichier du contrôleur


    if (file_exists($controllerPath)) { // Vérifier si le fichier du contrôleur existe
        require_once($controllerPath); // Inclure le fichier du contrôleur
        $controllerName = 'Controller' . $requestURL; // Construire le nom de la classe du contrôleur
        $controller = new $controllerName; // Créer une instance du contrôleur

        if (isset($url[1])) {  // Si une action est spécifiée dans l'URL
            $method = $url[1]; // Récupérer le nom de l'action depuis l'URL
            if(isset($url[2])){ // Si un identifiant (par exemple, un paramètre) est spécifié dans l'URL
                $id = $url[2]; //Récupérer l'identifiant
                echo $controller->$method($id);   // Appeler la méthode d'action du contrôleur avec l'identifiant
            }else{
                echo $controller->$method(); // Appeler la méthode d'action du contrôleur sans identifiant
            }
        } else {
            echo $controller->index();   //par defaut tous les controller on une methode index()
        }
    } else {
        // Redirection vers la page d'erreur
        $controllerHome = __DIR__ . '/controller/ControllerHome.php'; // Chemin vers le contrôleur de la page d'erreur
        require_once $controllerHome;
        $controller = new ControllerHome;  // Créer une instance du contrôleur de la page d'erreur
        echo $controller->error(); // Appeler la méthode error() du contrôleur de la page d'erreur et afficher le résultat
    }
}


// <body class="align">

//     <div class="grid">
//         <h1>Task Flow</h1>

//         <form action="user-login.php" method="POST" class="form">
//             <label>
//                 <input type="text" name="username"  placeholder="Username" required>
//             </label>
//             <label>
//                 <input type="password" name="password"  placeholder="Password" required>
//             </label>
//             <input class="button-74" type="submit" value="Sign In">
//         </form>

//         <p>Not a member? <a class="button-74" href="user-create.php">Sign up now</a></p>

//     </div>

// </body>

// </html> -->