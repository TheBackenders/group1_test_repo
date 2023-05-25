<?php

namespace app\models;

require_once('/../../config/connection.php');

use config\Connection;
use PDO;

class baseModel
{
    public $connection;
    public function __construct()
    {
        $db = new Connection();
        $this->connection = $db->getConnection();
    }

    public function insertData($table, $data)
    {

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $statement = $this->connection->prepare($sql);

        foreach ($data as $column => $value) {
            $statement->bindValue(":$column", $value);
        }

        $statement->execute();

        if ($statement->rowCount() > 0) {
            // Insertion was successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function updateData($table, $data, $condition)
    {


        $setClause = '';
        foreach ($data as $column => $value) {
            $setClause .= "$column = :$column, ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE $table SET $setClause WHERE $condition";
        $statement = $this->connection->prepare($sql);

        foreach ($data as $column => $value) {
            $statement->bindValue(":$column", $value);
        }

        $statement->execute();

        if ($statement->rowCount() > 0) {
            // Update was successful
            return true;
        } else {
            // Update failed
            return false;
        }
    }

    public function selectData($table, $condition = '')
    {


        $sql = "SELECT * FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }


    public function deleteData($table, $condition)
    {


        $sql = "DELETE FROM $table WHERE $condition";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            // Deletion was successful
            return true;
        } else {
            // Deletion failed
            return false;
        }
    }
}
