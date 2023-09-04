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
            <p class="button-74"><span>Due date : </span><?= $dueDate; ?></p>
            <div class="task-container">
                <h4 class="button-74">To do :</h4>
                <?php
                //Je vais chercher les tasks associés à ce projet
                $task = $crud->select('task', $idProject, 'project_idProject', 'importance_idImp');
                if (empty($task)) {
                    echo "No task";
                }
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Importance</th>
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($task as $key => $value) : ?>
                            <tr> 
                                <td><?= $value['task'] ?></td>
                                <!-- Je devrais avoir une fonction pour aller cherche la valeur correspondante -->
                                <td><span><?= ($value['importance_idImp'] == '1') ? 'High' : (($value['importance_idImp'] == '2') ? 'Medium' : 'Low'); ?></span></td>
                                <td><a class="button-74" href="task-delete.php?idTask=<?= $value['idTask'] ?>&idProject=<?= $idProject ?>">Remove</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="button-74" href="task-create.php?idProject=<?= $idProject ?>">New task</a>
            </div>
            <div class="btn">
                <a class="button-74" href="project-edit.php?idProject=<?= $idProject ?>">Edit project</a>
                <?php if (empty($task)) {
                    echo '<a class="button-74" href="project-delete.php?idProject=' . $idProject . '">Remove project</a>';
                } ?>
            </div>
        </section>
    </section>
</body>