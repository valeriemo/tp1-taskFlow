<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class Task extends Crud{

    public $table = 'task';
    public $primaryKey = 'idTask';
    public $foreignKey1 = 'importance_idImp';
    public $foreignKey2 = 'project_idProject';

    public $fillable = [
        'idTask',
        'task',
        'date',
        'importance_idImp',
        'project_idProject',
    ];
}
