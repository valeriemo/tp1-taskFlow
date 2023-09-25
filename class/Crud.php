<?php
class Crud extends PDO
{
    /**
     * Constructeur appellé lors de l'instanciation de la class
     * Établit la connexion avec la base de donnée
     */
    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=taskflow; port=3306; charset=utf8', 'root', '');
    }
    /**
     *  Insert une nouvelle ligne dans une table
     * 
     * @param string $table Le nom de la table
     * @param array $data Un tableau associatif des valeurs à insérer
     * @return int Le id de la derniere rangée insérer
     */
    public function insert($table, $data)
    {
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->lastInsertId();
    }
    /**
     * Retourne plusieurs lignes
     *
     *
     * @param string $table Nom de la table
     * @param mixed $value La valeur à chercher
     * @param string $field [optinel] Le nom de la colonne de la clause WHERE
     * @param string $order [Optionel] L'ordre d'organisation
     * @return array Un tableau associatif multidimensionnel correspondant à la query
     */
    public function select($table, $value, $field = 'user_idUser', $order = 'name')
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field ORDER BY $order";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * 
     *  Retourne 1 ligne 
     *
     * @param string $table Nom de la table
     * @param mixed $value La valeur à chercher
     * @param string $field [optinel] Le nom de la colonne de la clause WHERE
     * @param string $url [Optionel] Le nom du URL pour la redirection
     * @return  Un tableau associatif correspondant à la query
     */
    public function selectAllById($table, $value, $field = 'idUser', $url = 'index')
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location:$url.php");
            exit;
        }
    }
    /**
     * Authentifier la connexion d'une utilisateur en trouvant un match dans la BD
     * 
     *
     * @param string $table Nom de la table
     * @param string $value La valeur recu à comparer (username)
     * @param string $value2 La 2eme valeur recu a comparer (password)
     * @param string $field [Optional]  Le nom de la colonne de la clause WHERE
     * @param string $field2 [Optional]  Le nom de la colonne de la clause WHERE
     * @param string $url [Optional] Le URL de redirection si la connexion ne se fait pas
     * @return  Un tableau associatif correspondant a l'utilisateur
     */
    public function login($table, $value, $value2, $field = 'username', $field2 = 'password', $url = 'index')
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field AND $field2 = :$field2";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->bindValue(":$field2", $value2);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location:$url.php");
            exit;
        }
    }
    /**
     * Update une rangée dans une table
     * 
     * @param string $table Nom de la table 
     * @param array $data Tableau de nouvelles données à entrer dans la table
     * @param int $idProject L'id pour trouver la rangée.
     * @param string $field [Optionel] Le nom de la colonne de la clause WHERE
     */
    public function update($table, $data, $idProject, $field = 'id')
    {

        $fieldName = null;
        foreach ($data as $key => $value) {
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            header("Location:project-show.php?idProject=$idProject");
        } else {
            print_r($stmt->errorInfo());
        }
    }
    /**
     * Delete une rangée d'une table selon un identifiant
     * 
     *
     * @param string $table Nom de la table 
     * @param mixed $value Valeur d'identification de la rangée
     * @param string $url Le URL pour rediriger la page
     * @param string $field [Optinel] Le nom de la colonne de la clause WHERE
     */
    public function delete($table, $value, $url, $field = "id")
    {
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        if ($stmt->execute()) {
            header("Location:project-show.php?idProject=$url");
        } else {
            print_r($stmt->errorInfo());
        }
    }
}
