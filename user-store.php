<?php
require_once('class/Crud.php');

$crud = new Crud;
$insert = $crud->insert('user', $_POST);



header("location:user-show.php?idUser=$insert");

?>