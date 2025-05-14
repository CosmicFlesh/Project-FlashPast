<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "flash");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta
$query = "SELECT * FROM juegos";
$result = mysqli_query($conexion, $query);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>