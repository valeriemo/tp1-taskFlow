<?php
RequirePage::model('Project');
RequirePage::library('Mailer');

class ControllerHome extends Controller
{

    /**
     * Méthode pour afficher la page d'accueil. Affiche tous les projets en cours.
     */
    public function index()
    {
        Twig::render("home-index.php");
    }

    /**
     * Méthode pour afficher la page d'erreur.
     */
    public function error()
    {
        Twig::render("home-error.php");
    }
}
