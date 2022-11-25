<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

class Update extends ConnectionDB
{

    public function query($table, $cols, $data, $where, $comparison = "=", $compared)
    {
        $setData = array();
        for ($i = 0; $i < count($cols); $i++) {
            $setData[$i] = str_replace(':', '', $cols[$i]) . "=" . $cols[$i];
        }
        $this->connect();
        $sql = "UPDATE $table SET " . implode(',', $setData) . "WHERE  $where $comparison :u";
        $stmt = $this->pdo->prepare($sql);
        for ($i = 0; $i < count($cols); $i++) {
            $stmt->bindParam($cols[$i], $data[$i]);
        }
        $stmt->bindParam(":u", $compared);
        try {
            $stmt->execute();
            return ($stmt->rowCount() > 0) ? $stmt->fetchAll(PDO::FETCH_OBJ) : false;
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}