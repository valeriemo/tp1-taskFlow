<?php
require_once('class/Crud.php');

$crud = new Crud;
$update = $crud->update('project', $_POST, $_POST['idProject'],'idProject');


?>