<?php
include ("conexion.php");
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = ?");
$stmt->execute([$id]);
$juego = $stmt->fetch();

if (!$juego) {
    die("Juego no encontrado.");
}

$urlJuego = htmlspecialchars($juego['rutajuego']);
$nombreJuego = htmlspecialchars($juego['nombre']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $nombreJuego ?></title>
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
    <style>
        body {
            background: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .game-container {
            width: 800px;
            height: 600px;
            background: #111;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px #000;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <embed src="<?= $urlJuego ?>" width="100%" height="100%">
    </div>
</body>
</html>
