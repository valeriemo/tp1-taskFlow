<?php
print_r($_POST);

require_once('class/Crud.php');

$crud = new Crud;
$insert = $crud->insert('project', $_POST); // renvoi le id du projet

//echo $insert;

// Afficher la page des projets 
// Ajouter des task aux projets
// pouvoir Modifier les projets
header("location:project-show.php?idProject=$insert");
?>