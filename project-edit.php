<?php

$id =  $_GET['idProject'];

require_once('class/Crud.php');

$crud = new Crud;
$selectId = $crud->selectId('project', $id, 'idProject');

extract($selectId);

require_once('class/Partial.php');
echo Partial::head();
?>

<body class="align">
    <div class="grid">
        <h1>Task Flow</h1>
        <h2>Update your project</h2>

        <form action="project-update.php" method="POST" class="form">
            <input type="hidden" name="idProject" value="<?=$idProject;?>">
            <label>
                <input type="text" name="name"  value="<?=$name;?>" required>
            </label>
            <label>
                <textarea name="description"  value="<?=$description;?>" cols="30" rows="10"><?=$description;?></textarea>
            </label>
            <label> Starting date
                <input type="date" name="startDate" value="<?=$startDate;?>" required>
            </label>
            <label> Due date
                <input type="date" name="dueDate" value="<?=$dueDate;?>" required>
            </label>
            <input type="hidden" name="user_idUser" value="<?=$user_idUser;?>">
            <input type="submit" value="Save">
        </form>
    </div>
</body>

</html>