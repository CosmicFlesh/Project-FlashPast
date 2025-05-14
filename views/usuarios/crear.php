<?php 
require_once "./conexion.php";

$usuario = $_POST['user'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$query = "INSERT INTO usuarios VALUES(NULL, '".$usuario."','".$email."','".$pass."') ";

if (mysqli_query($pdo, $query)) {
        echo "Insertado correctamente";
    echo "<a href='./listarusuarios.php'>volver a administracion</a>";
    
} else {
    echo "Error al ingresar: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conexion);
?>
