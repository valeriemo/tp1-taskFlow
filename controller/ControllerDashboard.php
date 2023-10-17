<?php
RequirePage::model('Log');
RequirePage::model('User');
RequirePage::model('Privilege');

class ControllerDashboard extends Controller
{

    /**
     * Méthode pour afficher la page d'accueil du dashboard
     */
    public function index()
    {
        if ($_SESSION['privilege'] == 3) {
            $log = new Log;
            $logs = $log->select('date', 'DESC');
            Twig::render("dashboard-index.php", ['logs' => $logs]);
        } else {
            RequirePage::redirect('home/error');
        }
    }

    /**
     * Méthode pour afficher la d'un utilisateur à partir de son username
     */
    public function user($username)
    {
        if ($_SESSION['privilege'] == 3) {
            $user = new User;
            $user = $user->selectId($username, 'username');
            Twig::render("dashboard-user.php", ['user' => $user]);
        } else {
            RequirePage::redirect('home/error');
        }
    }

    /**
     * Méthode qui affiche le formulaire pour editer le privilege d'un utilisateur
     */
    public function edit($idUser)
    {
        if ($_SESSION['privilege'] == 3) {
            $user = new User;
            $user = $user->selectId($idUser, 'idUser');
            $privilege = new Privilege;
            $selectPrivilege = $privilege->select('idPri');
            Twig::render("dashboard-edit.php", ['user' => $user, 'privileges' => $selectPrivilege]);
        } else {
            RequirePage::redirect('home/error');
        }
    }

    /**
     * Méthode pour mettre à jour le privilege d'un utilisateur
     */
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST"){
            RequirePage::redirect('home/index');
            exit();
        }
        if ($_SESSION['privilege'] == 3) {
            $user = new User;
            $user->update($_POST);
            RequirePage::redirect('dashboard');
        } else {
            RequirePage::redirect('home/error');
        }
    }
}
