<?php
class Crud extends PDO
{
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=taskflow; port=3306; charset=utf8', 'root', '');
    }
    /**
     * 
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
     * Retourne plusieurs ligne
     */
    public function select($table, $value, $field = 'user_idUser')
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retourne 1 ligne
     */
    public function selectId($table, $value, $field = 'idUser', $url = 'index')
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
    //Je suis consciente que cette fonction n'est pas bonne pour une vérification de password (fait rapidement dans le but d'imiter une connexion)
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
     * 
     */
    public function update($table, $data, $field = 'id')
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
            $idProject = $this->lastInsertId();
            header("Location:project-show.php?idProject=$idProject");
        } else {
            print_r($stmt->errorInfo());
        }
    }
    /**
     * 
     */
    public function delete($table, $value, $field = 'id', $url)
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
