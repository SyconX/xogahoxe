<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

class Delete extends ConnectionDB
{
    public function query($table, $id)
    {
        $this->connect();
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}