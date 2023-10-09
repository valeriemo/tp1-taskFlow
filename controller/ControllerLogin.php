<?php
RequirePage::model('User');

// mon login est sur home-index.php
class ControllerLogin extends Controller{

    public function index(){
        Twig::render('login.php');
    }

    public function auth(){
        // vérification a faire lorsque nous utilisons une methode post
        if ($_SERVER["REQUEST_METHOD"] != "POST"){
            RequirePage::redirect('home/index');
            exit();
        }

        extract($_POST);

        // Validation
        RequirePage::library('Validation');
        $val = new Validation();

        $val->name('username')->value($username)->required()->pattern('alphanum')->min(3)->max(20);
        $val->name('password')->value($password)->pattern('alphanum')->min(8)->max(20);

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

    public function logout(){
        session_destroy();
        RequirePage::redirect('login');
    }
}

?>