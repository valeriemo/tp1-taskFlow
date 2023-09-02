<?php


require_once('class/Crud.php');

$crud = new Crud;

$insert = $crud->insert('task', $_POST); 

$idProject = $_POST['project_idProject'];

//echo $insert;

// Afficher la page des projets 
// Ajouter des task aux projets
// pouvoir Modifier les projets
header("location:project-show.php?idProject=$idProject");
?>