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

    public function querySearch($table, $columns, $search)
    {
        $this->connect();
        $where = "";
        for ($i = 0; $i < count($columns); $i++) {
            if ($i == (count($columns) - 1)) {
                $where .= "(" . $columns[$i] . " LIKE :search" . ($i + 1) . ")";
            } else {
                $where .= "(" . $columns[$i] . " LIKE :search" . ($i + 1) . ") OR ";
            }
        }
        $sql = "SELECT * FROM $table WHERE " . $where;
        $stmt = $this->pdo->prepare($sql);
        for ($i = 1; $i <= count($columns); $i++) {
            $stmt->bindParam(':search' . $i, $search);
        }
        return $stmt;
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