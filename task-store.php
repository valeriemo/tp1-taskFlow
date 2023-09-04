<?php


require_once('class/Crud.php');

$crud = new Crud;

$insert = $crud->insert('task', $_POST); 


$idProject = $_POST['project_idProject'];

header("location:project-show.php?idProject=$idProject");
?>