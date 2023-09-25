<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class User extends Crud{

    // Propriété pour spécifier le nom de la table dans la base de données
    public $table = 'user';

    // Propriété pour spécifier la clé primaire de la table
    public $primaryKey = 'idUser';
}
