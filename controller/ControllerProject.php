<?php

// Inclusion du modèle "client"
RequirePage::model('Project');
RequirePage::model('Task');

class ControllerProject extends Controller
{
    /**
     * Méthode pour afficher la page d'accueil du user->Project Board
     */
    public function index()
    {
        CheckSession::sessionAuth();
        RequirePage::redirect('user/index');
    }

    /**
     * Méthode pour afficher la page de création d'un projet
     */
    public function create($id)
    {
        Twig::render("project-create.php", ['idUser' => $id]);
    }

    /**
     * Méthode pour créer un projet
     */
    public function store()
    {
        CheckSession::sessionAuth();
        $project = new Project;
        $insert = $project->insert($_POST);
        RequirePage::redirect('user/index');
    }

    /**
     * Méthode pour afficher un projet spécifique
     */
    public function show($id = null)
    {
        CheckSession::sessionAuth();
        if ($id == null) {
            RequirePage::redirect('home/error');
        }
        $project = new Project;
        $task = new Task;
        $selectId = $project->selectId($id, 'idProject');
        $allTask = $task->selectAllById($selectId['idProject']);
        if (is_array($allTask)) {
            $nbTask = count($allTask);
        } else {
            $nbTask = 0;
        }
        $privilege = $_SESSION['privilege'];
        Twig::render('project-show.php', ['project' => $selectId, 'task' => $allTask, 'nbTask' => $nbTask, 'privilege' => $privilege]);
    }

    /**
     * Méthode qui affiche la page édition d'un projet
     */
    public function edit($id)
    {
        CheckSession::sessionAuth();
        $project = new Project;
        $selectId = $project->selectId($id, 'idProject');
        twig::render("project-edit.php", ['project' => $selectId]);
    }

    /**
     * Méthode pour mettre à jour un projet
     */
    public function update()
    {
        CheckSession::sessionAuth();
        $project = new Project;
        $update = $project->update($_POST);
        if ($update) {
            RequirePage::redirect('user/index');
        } else {
            print_r($update);
        }
    }
}
