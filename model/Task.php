<?php
require_once('Crud.php');

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
