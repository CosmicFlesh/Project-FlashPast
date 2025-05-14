<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO("mysql:host=localhost;dbname=flash", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Carpetas reales en el servidor
    $carpeta_juegos = __DIR__ . "/biblidejuegos/";
    $carpeta_imagenes = __DIR__ . "/img/";

    // Archivos
    $swf = $_FILES['archivo_swf'];
    $img = $_FILES['imagen'];

    $swf_nombre = basename($swf['name']);
    $img_nombre = basename($img['name']);

    $ruta_archivo_juego = $carpeta_juegos . $swf_nombre;
    $ruta_archivo_img = $carpeta_imagenes . $img_nombre;

    // Mover archivos
    move_uploaded_file($swf['tmp_name'], $ruta_archivo_juego);
    move_uploaded_file($img['tmp_name'], $ruta_archivo_img);

    // Rutas web (URL que se guarda en la base)
    $url_juego = "http://localhost/abProgra/views/admin/biblidejuegos/" . $swf_nombre;
    $url_img = "http://localhost/abProgra/views/admin/img/" . $img_nombre;

    // Insertar en la base de datos
    $stmt = $pdo->prepare("INSERT INTO juegos (nombre, descripcion, imagen, rutajuego) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $descripcion, $url_img, $url_juego]);

    echo "Juego subido exitosamente. <a href='http://localhost/abProgra/index.php'>Volver</a>";
}
?>
