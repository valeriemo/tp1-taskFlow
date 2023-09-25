<?php
// Définition de la classe "RequirePage"
class RequirePage
{
    /**
     * Inclut un modèle ou une classe spécifié.
     *
     * @param string $page Le nom du modèle ou de la classe à inclure.
     * @return mixed Retourne le résultat de la fonction require_once.
     */
    static public function model($page)
    {
        // Construit le chemin relatif vers le fichier PHP du modèle en utilisant le nom de la page fourni.
        $filePath = 'model/' . $page . '.php';

        // Utilise require_once pour inclure le fichier PHP spécifié dans le script en cours.
        return require_once($filePath);
    }

    /**
     * Effectue une redirection HTTP vers une page spécifiée.
     *
     * @param string $page Le nom de la page vers laquelle effectuer la redirection.
     * @return void
     */
    static public function redirect($page)
    {
        // Construit l'URL de redirection en utilisant l'URL de base et le nom de la page fourni.
        $redirectURL = 'http://localhost:8080/repo/tp1-taskFlow/' . $page;

        // Envoie un en-tête HTTP de redirection vers l'URL spécifiée.
        header('Location: ' . $redirectURL);

        // Termine immédiatement l'exécution du script pour éviter toute instruction supplémentaire non souhaitée.
        exit;
    }
}
