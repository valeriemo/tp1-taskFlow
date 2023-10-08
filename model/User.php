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
    ];

    public function checkUser($username, $password){             
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));

        $count = $stmt->rowCount();

        if ($count === 1) {
            $user = $stmt->fetch();

            if (password_verify($password, $user['password'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['fingerPrint'] = md5($_SERVER['REMOTE_ADDT'] . $_SERVER['HTTP_USER_AGENT']);
                return true;
                //RequirePage::redirect('client'); ---- > c'est dans le controller quon choisie la redirection
            } else {
                echo 'no';
            }
        } else {
            return false;
        }
    }
}
