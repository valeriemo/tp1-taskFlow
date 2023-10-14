<?php
// Inclusion de la classe "Crud"
require_once('Crud.php');

// Définition de la classe "Client" qui étend la classe "Crud"
class User extends Crud{

    public $table = 'user';
    public $primaryKey = 'idUser';

    public $fillable = [
        'idUser',
        'username',
        'email',
        'password',
        'privilege_idPri'
    ];

    public function checkUser($username, $password){ 
         
        $sql = "SELECT * FROM $this->table WHERE username = :$username";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$username", $username);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if ($count === 1) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password'])) {
                session_regenerate_id();
                $_SESSION['idUser'] = $user['idUser'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['privilege'] = $user['privilege_idPri'];
                $_SESSION['fingerPrint'] = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
                return true;
            } else {
                echo 'no';
            }
        } else {
            return false;
        }
    }
}
