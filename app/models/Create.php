<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

class Create extends ConnectionDB
{

    public function query($table, $cols, $data)
    {
        $this->connect();
        $sql = "INSERT INTO $table (" . str_replace(':', '', implode(',', $cols)) . ") VALUES (" . implode(',', $cols) . ")";
        try {
            $stmt = $this->pdo->prepare($sql);
            for ($i = 0; $i < count($cols); $i++) {
                $stmt->bindParam($cols[$i], $data[$i]);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            die("ERROR: No se ha podido crear. " . $e->getMessage() .
                "<br><br><a href='Login.php'>Volver al inicio</a>");
        }
    }
}