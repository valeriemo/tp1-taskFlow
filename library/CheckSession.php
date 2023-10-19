<?php

class CheckSession{

    /**
     * Vérifie si une session est active
     */
    static public function sessionAuth(){

        if(isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }else{
            RequirePage::redirect('login');
        }
    }
}

?>