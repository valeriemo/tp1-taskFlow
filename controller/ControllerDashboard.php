<?php
RequirePage::model('Log');
RequirePage::model('User');
RequirePage::model('Privilege');

class ControllerDashboard extends Controller{

    public function index()
    {        
        if($_SESSION['privilege']==3){
            $log = new Log;
            $logs = $log->select('date', 'DESC');
            Twig::render("dashboard-index.php", ['logs' => $logs]);
        }else{
            RequirePage::redirect('home/error');
        }
    }

    public function user($username){
        if($_SESSION['privilege']==3){
            $user = new User;
            $user = $user->selectId($username, 'username');
            Twig::render("dashboard-user.php", ['user' => $user]);
        }else{
            RequirePage::redirect('home/error');
        }
    }

    public function edit($idUser){
        if($_SESSION['privilege']==3){
            $user = new User;
            $user = $user->selectId($idUser, 'idUser');
            $privilege = new Privilege;
            $selectPrivilege = $privilege->select('idPri');
            Twig::render("dashboard-edit.php", ['user' => $user, 'privileges' => $selectPrivilege]);
        }else{
            RequirePage::redirect('home/error');
        }
    }

    public function update(){
        if($_SESSION['privilege']==3){
            $user = new User;
            $user->update($_POST);
            
            RequirePage::redirect('dashboard');
        }else{
            RequirePage::redirect('home/error');
        }
    }
}