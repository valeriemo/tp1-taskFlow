<?php
require_once('Crud.php');

class Privilege extends Crud{

    public $table = 'privilege';
    public $primaryKey = 'idPri';

    public $fillable = [
        'idPri',
        'privilege',
    ];
}