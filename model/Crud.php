<?php
abstract class Crud extends PDO
{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=e0673328; port=3306; charset=utf8', 'e0673328', 'N1xKtgaHjkRpJEAvK0H1');
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
        } elseif ($this->table == 'task') {
            $key = $this->foreignKey2;
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

    /**
     * Méthode qui vérifie le username et le password de l'utilisateur
     */
    public function login($data, $field = 'username', $field2 = 'password')
    {
        $username = $data['username'];
        $password = $data['password'];
        $sql = "SELECT * FROM user WHERE $field = :$field AND $field2 = :$field2";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $username);
        $stmt->bindValue(":$field2", $password);
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
     * Méthode pour effectuer une insertion (CREATE) d'un nouvel enregistrement
     */
    public function insert($data)
    {
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($fieldName) VALUES ($fieldValue)";
        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            return $this->lastInsertId();
        } else {
            return $stmt->errorInfo();
        }
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
