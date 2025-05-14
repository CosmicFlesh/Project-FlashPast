<?php
$pdo = new PDO("mysql:host=localhost;dbname=flash", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Manejar el archivo SWF
    $swf = $_FILES['archivo_swf'];
    $swf_nombre = basename($swf['name']);
    $rutajuego = "http://localhost/abProgra/views/admin/biblidejuegos/" . $swf_nombre;
    move_uploaded_file($swf['tmp_name'], $rutajuego);

    // Manejar la imagen
    $img = $_FILES['imagen'];
    $img_nombre = basename($img['name']);
    $ruta_img = "http://localhost/abProgra/views/admin/img/" . $img_nombre;
    move_uploaded_file($img['tmp_name'], $ruta_img);

    // Guardar en la base de datos
    $stmt = $pdo->prepare("INSERT INTO juegos (nombre, descripcion, imagen, rutajuego) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $descripcion, $ruta_img, $rutajuego]);

    echo "Juego subido exitosamente. <a href='http://localhost/abProgra/index.php'>Volver</a>";
}
?>
