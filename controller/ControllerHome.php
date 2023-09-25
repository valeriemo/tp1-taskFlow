<?php

class ControllerHome extends Controller
{

    /**
     * Méthode pour afficher la page d'accueil.
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
