<?php

// Définition de la classe "View"
class View{

    private $data = array(); // Tableau pour stocker les données à passer à la vue
    private $render = FALSE; // Variable pour stocker le chemin du fichier de vue à afficher

    /**
     * Constructeur de la classe.
     *
     * @param string $template Le nom du modèle de vue à afficher.
     */
    public function __construct($template){
        try{
            $file = 'view/'.$template.'.php';   // Construit le chemin du fichier de vue en ajoutant "view/" et ".php" au nom du modèle.

            // Vérifie si le fichier de vue existe.
            if(file_exists($file)){
                $this->render = $file; // Stocke le chemin du fichier de vue dans la variable "render".
            }else{
                throw new Exception($file.' not found'); // Lance une exception si le fichier de vue n'est pas trouvé.
            }
        }
        catch (Exception $e){
            echo $e->getMessage(); // Affiche le message d'erreur de l'exception.
            exit(); // Termine l'exécution du script en cas d'erreur.
        }
    }

    /**
     * Méthode pour définir des variables à passer à la vue.
     *
     * @param string $variable Le nom de la variable à définir dans la vue.
     * @param mixed $value La valeur de la variable à définir dans la vue.
     */
    public function output($variable, $value){
        $this->data[$variable] = $value; // Stocke la valeur dans le tableau de données avec la clé spécifi
    }
}