<?php 
echo $_GET['idTask'];

require_once('class/Crud.php');

$crud = new Crud;
echo $delete = $crud->delete('task', $_GET['idTask'], "idTask", $_GET['idProject']);
// Je commence à avoir des problèmes de redirection puisque je n'ai pas créer de session. L'important est que le delete fonctionne bien. 
?>