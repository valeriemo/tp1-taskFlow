<?php
abstract class Crud extends PDO
{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=taskflow; port=3306; charset=utf8', 'root');
    }

    /**
     * Méthode pour effectuer une sélection (READ) de tous les enregistrements
     */
    public function select($field = 'id', $order = null)
    {
        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    /**
     *  Méthode pour effectuer une sélection (READ) par ID
     */
    public function selectId($value)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location:../../home/error");
            exit;
        }
    }

    /**
     * Méthode pour sélectionner plusieurs éléments avec une foreign key
     */
    public function selectAllById($value)
    {
        if ($this->table == 'project') {
            $key = $this->foreignKey;
            // si c'est task
        } elseif ($this->table == 'task') {
            $key = $this->foreignKey2;
        } else {
            $key = $this->primaryKey;
        }

        $sql = "SELECT * FROM $this->table WHERE $key = :$key";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$key", $value);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count >= 1) {
            return $stmt->fetchAll();
        } else {
            return "Nothing";
        }
    }
    // Méthode pour effectuer une insertion (CREATE) d'un nouvel enregistrement
    public function insert($data){
        $data_keys = array_fill_keys($this->fillable, '');
        // print_r($this->fillable);
        // echo '<br><br>';
        // print_r($data_keys);
        // echo '<br><br>';
        // print_r($data);
        $data = array_intersect_key($data, $data_keys);
        // print_r($data);
        // die();
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($fieldName) VALUES ($fieldValue)";

       //return $sql;

       $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
       $stmt->execute();

       return $this->lastInsertId();
    }

    /**
     * Méthode pour effectuer une mise à jour (UPDATE) d'un enregistrement
     */
    public function update($data)
    {
        $fieldName = Null;
        foreach ($data as $key => $value) {
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');
        $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
        $stmt =  $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->errorInfo();
        }
    }
    /**
     * Méthode pour delete une ligne de la base de donnée
     */
    public function delete($value)
    {
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        if ($stmt->execute()) {
            return true;
        } else {
            print_r($stmt->errorInfo());
        }
    }
}
