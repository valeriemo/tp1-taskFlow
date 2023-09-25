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
        echo $twig->render($template, $data);
    }
}
