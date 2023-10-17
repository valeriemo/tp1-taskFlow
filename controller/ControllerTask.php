<?php
RequirePage::model('Task');

class ControllerTask extends Controller
{
    public function index()
    {
        $task = new Task;
    }

    /*
    * Méthode pour afficher le formulaire de création d'une tâche
    */
    public function create($id)
    {
        Twig::render("task-create.php", ['idProject' => $id]);
    }

    /**
     * Méthode pour traiter la soumission du formulaire de création d'une tâche
     */
    public function store()
    {
        $task = new task;
        $insert = $task->insert($_POST);
        RequirePage::redirect('project/show/' . $_POST['project_idProject']);
    }

    /**
     * Méthode pour supprimer une tâche
     */
    public function delete($id)
    {
        $task = new Task;
        $projet = $task->selectId($id, 'idTask');
        $idProject = $projet['project_idProject'];
        $task->delete($id);
        RequirePage::redirect('project/show/' . $idProject);
    }
}
