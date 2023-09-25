<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class Task extends Crud{

    // Propriété pour spécifier le nom de la table dans la base de données
    public $table = 'task';

    // Propriété pour spécifier la clé primaire de la table
    public $primaryKey = 'idTask';
    public $foreignKey1 = 'importance_idImp';
    public $foreignKey2 = 'project_idProject';
}
