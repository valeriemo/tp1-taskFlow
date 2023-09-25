<?php

// Définition de la classe "ControllerHome" qui étend la classe de base "Controller"
class ControllerHome extends Controller
{

    /**
     * Méthode pour afficher la page d'accueil.
     */
    public function index()
    {
        // Appelle la méthode "render" de la classe utilitaire "Twig" pour afficher la vue "home-index.php"
        // en passant un tableau associatif contenant une clé "name" avec la valeur "peter".
        Twig::render("home-index.php", ['name' => 'peter']);
    }

    /**
     * Méthode pour afficher la page d'erreur.
     */
    public function error()
    {
        // Appelle la méthode "render" de la classe utilitaire "Twig" pour afficher la vue "home-error.php".
        Twig::render("home-error.php");
    }
}
