<?php
require_once('class/Crud.php');

$crud = new Crud;

$login = $crud->login('user', $_POST['username'], $_POST['password']);

$project = $crud->select('project', $login['idUser'], 'user_idUser');

?>
<?php
require_once('class/Partial.php');
echo Partial::head();
?>

<body>
    <section>
        <h1>Welcome <?= $login['username']; ?></h1>
        <!--   vérifier si il existe des projets*/-->
        <?php if (empty($project)) {
            echo "<h2>No project</h2>";
        } elseif (count($project) > 1) {
            echo "<h2>Your projects</h2>";
        } else {
            echo "<h2>Your project</h2>";
        } ?>
        <div class="container">
            <?php foreach ($project as $key => $value) : ?>
                <section class="project">
                    <hgroup>
                        <h3><?= $value['name'] ?></h3>
                        <p><?= $value['description']; ?></p>
                    </hgroup>
                    <div class="btn">
                        <a class="button-74" href="project-show.php?idProject=<?= $value['idProject'] ?>">View project</a>
                        <a class="button-74" href="project-edit.php?idProject=<?= $value['idProject'] ?>">Edit project</a>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
        <a class="button-74" href="project-create.php?idUser=<?= $login['idUser'] ?>">Create a project</a>
    </section>
</body>