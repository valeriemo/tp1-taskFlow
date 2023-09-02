<?php
$id = $_GET['idUser'];

require_once('class/Partial.php');
echo Partial::head();
?>

<body class="align">
    <div class="grid">
        <h1>Task Flow</h1>
        <h2>Create a new project</h2>

        <form action="project-store.php" method="POST" class="form">
            <label>
                <input type="text" name="name" placeholder="Project Name" required>
            </label>
            <label>
                <textarea name="description" placeholder="Description" cols="30" rows="10"></textarea>
            </label>
            <label> Starting date
                <input type="date" name="startDate" required>
            </label>
            <label> Due date
                <input type="date" name="dueDate" required>
            </label>
            <input type="hidden" name="user_idUser" value="<?=$id;?>">



            <input type="submit" value="Save">
        </form>
    </div>
</body>

</html>