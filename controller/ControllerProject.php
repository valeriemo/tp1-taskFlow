<?php

// Inclusion du modèle "client"
RequirePage::model('Project');
RequirePage::model('Task');

class ControllerProject extends Controller
{

    public function index()
    {
        $project = new Project; 
        $select = $project->select('idProject'); 
        Twig::render("project-index.php", ['project' => $select]);
    }

    // Méthode pour afficher le formulaire de création d'un projet
    public function create($id)
    {
        Twig::render("project-create.php", ['idUser' => $id]);
    }

    // Méthode pour traiter la soumission du formulaire de création d'un projet
    public function store()
    {
        $project = new Project; 
        $insert = $project->insert($_POST); 
        RequirePage::redirect('project');
    }

    // Méthode pour afficher les détails d'un projet spécifique
    public function show($id)
    {
        $project = new Project; 
        $task = new Task;
        $selectId = $project->selectId($id); 
        $allTask = $task->selectAllById($selectId['idProject']);
        Twig::render('project-show.php', ['project' => $selectId,'task' => $allTask]);
    }

    public function edit($id)
    {
        $project = new Project; 
        $selectId = $project->selectId($id); 
        twig::render("project-edit.php", ['project' => $selectId]);
    }

    public function update()
    {
        $project = new Project;
        $update = $project->update($_POST);
        if ($update) {
            RequirePage::redirect('project');
        } else {
            print_r($update);
        }
    }
}
