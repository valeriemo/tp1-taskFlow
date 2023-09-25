<?php

/**
 * Classe Twig - Utilitaire pour utiliser le moteur de template Twig dans un projet MVC.
 */
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
        // Configuration du chargeur pour charger les modèles depuis le répertoire "view".
        $loader = new \Twig\Loader\FilesystemLoader('view');
        
        // Configuration de l'environnement Twig avec auto-rechargement activé pour le développement.
        $twig = new \Twig\Environment($loader, array(
            'auto_reload' => true,
        ));

        // Ajout d'une variable globale "$path" pour construire des liens absolus.
        $twig->addGlobal('path', 'http://localhost:8080/repo/tp1-taskFlow/');         // ATTENTION SUR WEBDEV CHEMIN A CHANGE !!!!!!!!!!!!!!!!!!!

        // Génération du contenu HTML en utilisant le modèle spécifié et les données associées.
        echo $twig->render($template, $data);
    }
}
