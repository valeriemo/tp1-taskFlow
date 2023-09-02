<?php 
$idProject = $_GET['idProject'];
?>
<?php
require_once('class/Partial.php');
echo Partial::head();
?> 
<body class="align">
    <div class="grid">
            <h1>Task Flow</h1>
            <h2>New task</h2>
            <form action="task-store.php" method="POST" class="form">
                <input type="hidden" name="project_idProject" value="<?=$idProject?>">
                <label>
                    <input type="text" name="task"  placeholder="Task"  required>
                </label>
                <label>
                    <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>" required>
                </label>
                <fieldset>
                    <legend>Select the level of importance:</legend>
                    <div class="rangee">
                        <label class="rangee">
                            High: 
                            <input type="radio" name="importance_idImp" value="1" >
                        </label>
                        <label class="rangee">
                            Mid: 
                            <input type="radio" name="importance_idImp" value="2">
                        </label>
                        <label class="rangee">
                            Low: 
                            <input type="radio" name="importance_idImp" value="3">
                        </label>
                    </div>
                </fieldset>
                <input type="submit" value="Save">
            </form>
    </div>
</body>

</html>