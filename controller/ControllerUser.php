<?php
RequirePage::model('user');
RequirePage::model('project');


class ControllerUser extends Controller
{

    public function index()
    {
        $user = new User; 
        $login = $user->login($_POST); 
        $project = new Project; 
        $allProjects = $project->selectAllById($login['idUser']);
        Twig::render("user-index.php", ['user' => $login, 'project' => $allProjects]);
    }

    // Méthode pour afficher le formulaire de création d'un client
    public function create()
    {
        Twig::render("user-create.php");
    }

    // Méthode pour traiter la soumission du formulaire de création d'un client
    public function store()
    {
        $user = new User; 
        $insert = $user->insert($_POST); 
        $select = $user->selectId($insert);

        Twig::render("user-index.php", ['user' => $select]);
    }

    // Méthode pour afficher les détails d'un client spécifique
    public function show($id)
    {
        $user = new User; 
        $selectAllById = $user->selectAllById($id); 

        Twig::render('user-show.php', ['user' => $selectAllById]);
    }

}
