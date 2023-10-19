<?php
class RequirePage
{
    /**
     * Inclut un modèle ou une classe spécifié.
     *
     * @param string 
     * @return mixed 
     */
    static public function model($page)
    {
        $filePath = 'model/' . $page . '.php';
        return require_once($filePath);
    }

    static public function library($page)
    {
        return require_once('library/' . $page . '.php');
    }

    /**
     * Effectue une redirection HTTP vers une page spécifiée.
     *
     * @param string $page Le nom de la page vers laquelle effectuer la redirection.
     * @return void
     */
    static public function redirect($page)
    {
        $redirectURL = PATH_DIR . $page;
        header('Location: ' . $redirectURL);

        exit;
    }
}
