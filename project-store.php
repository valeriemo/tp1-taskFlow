<?php
require_once('class/Crud.php');

$crud = new Crud;
$insert = $crud->insert('project', $_POST); // renvoi le id du projet

header("location:project-show.php?idProject=$insert");
?>