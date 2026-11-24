<?php

require_once __DIR__ . "/../conexion/db.php";

class TfgModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = obtenerConexion();
    }

    public function obtenerTodos() {
        try {
            $sql = "SELECT * FROM notas";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en consulta SQL: " . $e->getMessage());
        }
    }
}
