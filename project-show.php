<?php
$id = $_GET['idProject'];
require_once('class/Crud.php');
require_once('class/Partial.php');

$crud = new Crud;
$project = $crud->selectId('project', $id, 'idProject');
extract($project);


?>

<?php echo Partial::head(); ?>

<body>
    <header>        
        <h1>Project</h1>
    </header>
    <section>
        <section class="project">
            <hgroup>
                <h3><?= $name ?></h3>
                <p><?= $description; ?></p>
            </hgroup>    
            <p><span>Due date : </span><?= $dueDate; ?></p>
            <div>
                <h4>Task</h4>
                <?php
                $task = $crud->select('task', $idProject, 'project_idProject');
                if (empty($task)) {
                    echo "No task";
                }
                ?>
                <?php foreach ($task as $key => $value) : ?>
                    <div class="task">
                        <?= $value['task'] ?><span><?= ($value['importance_idImp'] == '1') ? 'Low' : (($value['importance_idImp'] == '2') ? 'Medium' : 'High'); ?></span>
                        <a href="task-delete.php?idTask=<?= $value['idTask'] ?>&idProject=<?= $idProject ?>">Remove</a>
                    </div>
                <?php endforeach; ?>

                <a class="btn" href="task-create.php?idProject=<?= $idProject ?>">New task</a>
            </div>
            <div class="btn">
                <a href="project-edit.php?idProject=<?= $idProject ?>">Edit project</a>
                <a href="project-delete.php?idProject=<?= $idProject ?>">Delete project</a>
            </div>
        </section>
    </section>
</body>
