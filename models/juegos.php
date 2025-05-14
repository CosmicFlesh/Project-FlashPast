<?php
require_once "../config/conexion.php";

class Producto{

    private $pdo;

    public function __construct(){
      $this->pdo = getConexion();
    }

public function Listarjuegos(){
    $query = "SELECT * FROM productos";
    $stmt = $this->pdo->prepare($query);
    $stmt ->excecute();
    return $stmt ->fetchAll(PDO::FETCH_ASSOC);
} //MISMO A LA CLASE DE ABAJO


    public function crearProducto($nombre,$descripcion,$precio,$disponible){
        $query= "INSERT INTO productos (nombre,,descripcion,precio,disponible) VALUES (?,?,?,?)";
        $stmt= $this->pdo->prepare($query);
        return $stmt->excecute([$nombre,$descripcion,$precio,$disponible]);
   
    }
    public function ActualizarProducto($id,$nombre,$descripcion,$precio,$disponible){
        $query= "UPDATE productos SET nombre=? ,descripcion=? ,precio=? ,disponible) WHERE id=?";
        $stmt= $this->pdo->prepare($query);
        return $stmt->excecute([$id,$nombre,$descripcion,$precio,$disponible]);
   
    }
}




?>