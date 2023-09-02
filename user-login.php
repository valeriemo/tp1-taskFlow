<?php
require_once('class/Crud.php');

$crud = new Crud;

$login = $crud->login('user', $_POST['username'], $_POST['password']);

$project = $crud->select('project', $login['idUser'], 'user_idUser');

//$task = $crud->select('task', $project['idProject'],'project_idProject');

?>
<?php
require_once('class/Partial.php');
echo Partial::head();
?>

<body>
    <h1>Welcome <?= $login['username']; ?></h1>
    <!--   vérifier si il existe des projets*/-->
    <section>
        <h2>Your project</h2>

        <?php foreach ($project as $key => $projectValue) : ?>
            <section class="project">
                <hgroup>
                    <h3><?= $projectValue['name'] ?></h3>
                    <p><?= $projectValue['description']; ?></p>
                </hgroup>    
                <p><span>Due date : </span><?= $projectValue['dueDate']; ?></p>
                <div>
                    <h4>Task</h4>
                    <?php $task = $crud->select('task', $projectValue['idProject'],'project_idProject');
                    if (empty($task)){
                        echo "No task";
                    }?>
                    <?php foreach ($task as $key => $value) :?>
                    <div class="task">
                    <?= $value['task']?><span><?=($value['importance_idImp'] == '1') ? 'Low' : (($value['importance_idImp'] == '2') ? 'Medium' : 'High'); ?></span>
                    <a href="task-delete.php?idTask=<?= $value['idTask']?>&idProject=<?=$projectValue['idProject']?>">Remove</a>
                    </div >
                    <?php endforeach; ?>

                    <a class="btn" href="task-create.php?idProject=<?= $projectValue['idProject'] ?>">New task</a>
                </div>
                <div class="btn">
                    <a href="project-edit.php?idProject=<?= $projectValue['idProject'] ?>">Edit project</a>
                    <a href="project-delete.php?idProject=<?= $projectValue['idProject'] ?>">Delete project</a>
                </div>
            </section>
        <?php endforeach; ?>

        <a href="project-create.php?idUser=<?= $login['idUser'] ?>">Create a project</a>
    </section>

</body>