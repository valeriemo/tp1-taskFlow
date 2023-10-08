<?php

class CheckSession{

    static public function sessionAuth(){
        if(isset($_SESSION['fingerPrint']) && ($_SESSION['fingerPrint']) == md5($_SERVER['REMOTE_ADDT'] . $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }else{
            RequirePage::redirect('login');
        }
    }
}


?>