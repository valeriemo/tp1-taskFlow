<?php
require_once('Crud.php');

class Project extends Crud{

    public $table = 'project';
    public $primaryKey = 'idProject';
    public $foreignKey = 'user_idUser';
    public $idProject = 'idProject';

    public $fillable = [
        'idProject',
        'name',
        'description',
        'startDate',
        'dueDate',
        'user_idUser',
    ];
}