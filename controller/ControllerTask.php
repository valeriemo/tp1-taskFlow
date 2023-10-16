<?php
RequirePage::model('Task');

class ControllerTask extends Controller
{
    public function index(){
        $task = new Task;
    }

    public function show($id){
        $task = new Task;
        $taskShow = $task->selectAllById($id);
    }

    public function create($id)
    {
        Twig::render("task-create.php", ['idProject' => $id]);
    }

    public function store()
    {
        $task = new task; 
        $insert = $task->insert($_POST); 
        RequirePage::redirect('project/show/' . $_POST['project_idProject']);
    }

    public function delete($id){

        $task = new Task;
        $projet = $task->selectId($id, 'idTask');
        $idProject = $projet['project_idProject'];

        $task->delete($id);
        RequirePage::redirect('project/show/' . $idProject);

    }
}