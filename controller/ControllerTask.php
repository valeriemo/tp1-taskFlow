<?php

RequirePage::model('task');

class ControllerTask extends Controller
{
    public function index(){
        $task = new Task;
    }

    public function show($id){
        $task = new Task;
        $taskShow = $task->selectAllById($id);
    }

    // Méthode pour afficher le formulaire de création d'un client
    public function create($id)
    {
        Twig::render("task-create.php", ['idProject' => $id]);
    }

    public function store()
    {
        $task = new task; 
        $insert = $task->insert($_POST); 
        RequirePage::redirect('home');
    }

    public function delete($id){

        $task = new Task;
        $task->delete($id);
        RequirePage::redirect('project');

    }
}