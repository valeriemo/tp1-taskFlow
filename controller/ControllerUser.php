<?php
RequirePage::model('User');
RequirePage::model('Project');


class ControllerUser extends Controller
{

    public function index()
    {
        
        // $user = new User; 
        // $login = $user->login($_POST); 
        // $project = new Project; 
        // $allProjects = $project->selectAllById($login['idUser']);
        //CheckSession::sessionAuth();

        // je vais verifier la session et aller chercher le idUser
        Twig::render("user-index.php");
    }

    // Méthode pour afficher le formulaire de création d'un client
    public function create()
    {
        Twig::render("user-create.php");
    }



    // Méthode pour traiter la soumission du formulaire de création d'un client
    public function store(){
        // Vérifie si la requête HTTP est de type POST.
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            // Redirige l'utilisateur vers la page 'user/create' en cas de requête invalide.
            RequirePage::redirect('user/create');
            exit(); // Termine l'exécution du script.
        }
    
        // Extrayez les données du formulaire POST dans des variables.
        extract($_POST);
    
        // Inclut la classe de validation.
        RequirePage::library('Validation');
        $val = new Validation();
    
        $val->name('username')->value($username)->max(20)->min(4);
        $val->name('password')->value($password)->pattern('alphanum')->min(6)->max(20);
        $val->name('email')->value($email)->pattern('email')->required()->max(50);

    
        // Si toutes les validations passent avec succès.
        if ($val->isSuccess()) {
            // Crée un nouvel objet User.
            $user = new User;
    
            // Options pour le hachage du mot de passe.
            $options = [
                'cost' => 10,
            ];
    
            // Hache le mot de passe.
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    
            // Remplace le mot de passe original par le mot de passe haché dans $_POST.
            $_POST['password'] = $hashPassword;
    
            // Insère les données du formulaire dans la base de données.
            $insert = $user->insert($_POST);
            $select = $user->selectId($insert);
            // Redirige l'utilisateur vers la page 'user/create'.
            Twig::render('user-index.php', ['user' => $select]);

        } else {
            // En cas d'erreurs de validation, obtient les erreurs.
            $errors = $val->displayErrors();
            // Rend la vue 'user-create.php' avec les données des privilèges et les erreurs.
            Twig::render('user-create.php', ['errors' => $errors]);
        }
    }




    // Méthode pour afficher les détails d'un client spécifique
    public function show($id)
    {
        $user = new User; 
        $selectAllById = $user->selectAllById($id); 

        Twig::render('user-show.php', ['user' => $selectAllById]);
    }

}
