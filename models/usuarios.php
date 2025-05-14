<?php
require_once "../config/conexion.php";

class Usuario
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = getConexion();
    }

    public function mostrartodos()
    {
        $consulta = "SELECT * FROM Usuario";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->excecute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } //MISMO A LA CLASE DE ABAJO



    public function crear($nombre, $descripcion)
    {
        $query = "INSERT INTO Usuario (nombre,descripcion) VALUES (?,?)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->excecute([$nombre, $descripcion]);
    }
}
