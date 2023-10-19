<?php
require_once('Crud.php');

class User extends Crud{

    public $table = 'user';
    public $primaryKey = 'idUser';
    public $username = 'username';
    public $idUser = 'idUser';
    public $privilege = 'privilege_idPri';

    public $fillable = [
        'idUser',
        'username',
        'email',
        'password',
        'privilege_idPri'
    ];

    /**
     * Méthode qui permet de hasher le mot de passe
     * 
     * @param string $password
     * @return string
     */
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
