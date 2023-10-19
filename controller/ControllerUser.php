<?php
RequirePage::model('User');
RequirePage::model('Project');
RequirePage::model('Privilege');
RequirePage::library('Mailer');

class ControllerUser extends Controller
{
    /**
     * Méthode pour afficher la page d'accueil du user->Project Board
     */
    public function index()
    {
        CheckSession::sessionAuth();
        $user = new User;
        $select = $user->selectId($_SESSION['idUser'], 'idUser');
        //Je vais chercher les projets de l'utilisateur connecté
        $projectUser = new Project;
        $projects = $projectUser->selectAllById($_SESSION['idUser']);
        if (is_array($projects)) {
            $nbProjects = count($projects);
        } else {
            $nbProjects = 0;
        }
        Twig::render("user-index.php", ['projects' => $projects, 'user' => $select, 'nbProjects' => $nbProjects]);
    }

    /**
     * Méthode pour afficher le formulaire de création d'un client
     */
    public function create()
    {
        $privilege = new Privilege;
        $selectPrivilege = $privilege->select('idPri');
        Twig::render("user-create.php", ['privileges' => $selectPrivilege]);
    }

    /**
     * Méthode pour traiter la soumission du formulaire de création d'un client
     * Hachage du mot de passe
     * Envoi du mail de bienvenue
     */
    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('user/create');
            exit();
        }

        extract($_POST);
        RequirePage::library('Validation');
        $val = new Validation();

        $val->name('username')->value($username)->max(20)->min(4);
        $val->name('password')->value($password)->pattern('alphanum')->min(6)->max(20);
        $val->name('email')->value($email)->pattern('email')->required()->max(50);
        $val->name('privilege_idPri')->value($privilege_idPri)->required();

        if ($val->isSuccess()) {
            $user = new User;
            $options = [
                'cost' => 10,
            ];
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            $_POST['password'] = $hashPassword;
            $insert = $user->insert($_POST);
            $select = $user->selectId($insert, 'idUser');

            // Envoi le email de bienvenue
            $mail = new SendMail();
            $body = $mail->craftEmailBody($select);
            $mail->sendMail($select['email'], $select['username'], $body);

            Twig::render('user-index.php', ['user' => $select]);
        } else {
            $errors = $val->displayErrors();
            Twig::render('user-create.php', ['errors' => $errors]);
        }
    }

    /**
     * Méthodes d'une page qui n'existe pas pour éviter les erreurs php je l'a protège
     */
    public function show()
    {
        CheckSession::sessionAuth();
        RequirePage::redirect('home/error');
    }
    public function edit()
    {
        CheckSession::sessionAuth();
        RequirePage::redirect('home/error');
    }
}
