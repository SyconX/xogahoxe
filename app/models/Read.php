<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

class Read extends ConnectionDB
{
    public function queryAllWhere($table, $where, $comparison = '=', $data)
    {
        $this->connect();
        $sql = "SELECT * FROM $table WHERE $where $comparison :u";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':u', $data);
        return $stmt;
    }

    public function queryAll($table)
    {
        $this->connect();
        $sql = "SELECT * FROM $table";
        return $this->pdo->prepare($sql);
    }

    public function response($stmt)
    {
        try {
            $stmt->execute();
            return ($stmt->rowCount() > 0) ? $stmt->fetchAll(PDO::FETCH_OBJ) : false;
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}