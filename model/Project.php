<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class Project extends Crud{

    public $table = 'project';
    public $primaryKey = 'idProject';
    public $foreignKey = 'user_idUser';

    public $fillable = [
        'idProject',
        'name',
        'description',
        'startDate',
        'dueDate',
        'user_idUser',
    ];
}