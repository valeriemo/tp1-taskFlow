<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class Privilege extends Crud{

    public $table = 'privilege';
    public $primaryKey = 'idPri';

    public $fillable = [
        'idPri',
        'privilege',
    ];
}