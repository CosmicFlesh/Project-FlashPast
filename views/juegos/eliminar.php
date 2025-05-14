<?php
// Conexión a la base de datos
$pdo = new PDO("mysql:host=localhost;dbname=flash", "root", "");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la información del juego para eliminar el archivo
    $stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = ?");
    $stmt->execute([$id]);
    $juego = $stmt->fetch();

    if ($juego) {
        // Borrar el archivo SWF y la imagen
        $ruta_swf = $juego['rutajuego'];
        $ruta_img = $juego['imagen'];

        if (file_exists($ruta_swf)) {
            unlink($ruta_swf);  // Elimina el archivo SWF
        }

        if (file_exists($ruta_img)) {
            unlink($ruta_img);  // Elimina la imagen
        }

        // Eliminar el juego de la base de datos
        $stmt = $pdo->prepare("DELETE FROM juegos WHERE id = ?");
        $stmt->execute([$id]);

        echo "Juego eliminado exitosamente. <a href='http://abprogra/index.php'>Volver a la lista de juegos</a>";
    } else {
        echo "Juego no encontrado.";
    }
} else {
    echo "No se ha proporcionado un ID de juego.";
}
?>
