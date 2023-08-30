<?php 
class Crud extends PDO{

public function __construct(){
    parent::__construct('mysql:host=localhost; dbname=taskflow; port=3306; charset=utf8', 'root', '');
}

}
