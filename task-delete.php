<?php 

require_once('class/Crud.php');

$crud = new Crud;
echo $delete = $crud->delete('task', $_GET['idTask'],  $_GET['idProject'], "idTask");
?>