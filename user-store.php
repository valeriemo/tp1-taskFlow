<?php
require_once('class/Crud.php');

$crud = new Crud;
$insert = $crud->insert('user', $_POST);

//echo $insert;

header("location:user-show.php?idUser=$insert");

?>