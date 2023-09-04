<?php 
require_once('class/Crud.php');

$crud = new Crud;
echo $delete = $crud->delete("project", $_GET['idProject'],  $_GET['idProject'], "idProject");
// Je voudrais optimiser l'app et faire une redirection que la page home(user-login) mais sans les variables de session cela devient compliquer
?>