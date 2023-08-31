<?php
class Crud extends PDO
{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=taskflow; port=3306; charset=utf8', 'root', '');
    }

    public function insert($table, $data)
    {

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";

        // return $sql;

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->lastInsertId();
    }

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
}
