<?php

class Twig
{
    /**
     * Génère et affiche une vue HTML en utilisant le moteur de template Twig.
     *
     * @param string $template Le nom du modèle Twig à utiliser.
     * @param array $data Un tableau associatif contenant les données à passer au modèle.
     * @return void
     */
    static public function render($template, $data=array())
    {
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array(
            'auto_reload' => true,
        ));

        $twig->addGlobal('path', PATH_DIR);    
        
        if(isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])){
            $guest = false; 
        }else{
            $guest = true; 
        }
        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('guest', $guest);   

        echo $twig->render($template, $data);
    }
}
