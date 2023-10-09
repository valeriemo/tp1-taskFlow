<?php
RequirePage::model('Project');

class ControllerHome extends Controller
{

    /**
     * Méthode pour afficher la page d'accueil. Affiche tous les projets en cours.
     */
    public function index()
    {
        $projects = new Project();
        $allProjects = $projects->select("idProject");
        Twig::render("home-index.php", ["projects" => $allProjects]);
    }

    /**
     * Méthode pour afficher la page d'erreur.
     */
    public function error()
    {
        Twig::render("home-error.php");
    }
}
