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

    public function create($id)
    {
        Twig::render("task-create.php", ['idProject' => $id]);
    }

    public function store()
    {
        $task = new task; 
        $insert = $task->insert($_POST); 
        RequirePage::redirect('project');
    }

    public function delete($id){

        $task = new Task;
        $task->delete($id);
        RequirePage::redirect('project');

    }
}