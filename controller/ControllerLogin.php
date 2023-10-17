<?php
RequirePage::model('User');

class ControllerLogin extends Controller{

    public function index(){
        Twig::render('login.php');
    }

    /**
     * Méthode pour authentifier un utilisateur et le rediriger vers la page d'accueil 
     */
    public function auth(){
        if ($_SERVER["REQUEST_METHOD"] != "POST"){
            RequirePage::redirect('home/index');
            exit();
        }
        extract($_POST);
        RequirePage::library('Validation');
        $val = new Validation();

        $val->name('username')->value($username)->required()->pattern('alphanum')->min(3)->max(20);
        $val->name('password')->value($password)->required()->pattern('alphanum')->min(8)->max(20);

        if ($val->isSuccess()) {
            $user = new User;
            if($user->checkUser($username, $password)){
                RequirePage::redirect('user/index');
            }else{
                RequirePage::redirect('home/error');
            }
        }else {
            $errors = $val->displayErrors();
            Twig::render('login.php', ['errors'=>$errors, 'data'=>$_POST]);
        }
    }

    /**
     * Méthode pour déconnecter un utilisateur
     */
    public function logout(){
        session_destroy();
        RequirePage::redirect('login');
    }
}
