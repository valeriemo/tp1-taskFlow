<?php
print_r($_POST);

require_once('class/Crud.php');

$crud = new Crud;
$insert = $crud->insert('project', $_POST);

//echo $insert;

header("location:project-show.php?idProject=$insert");
?>