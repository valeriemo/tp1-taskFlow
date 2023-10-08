<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class Importance extends Crud{

    public $table = 'importance';
    public $primaryKey = 'idImp';
}
