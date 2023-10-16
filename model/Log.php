<?php
require_once('Crud.php');

class Log extends Crud{

    public $table = 'log';
    public $primaryKey = 'idLog';

    public $fillable = [
        'idLog',
        'ipAddress',
        'date',
        'username',
        'pageUrl'
    ];
}