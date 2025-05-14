<?php
$pdo = new PDO("mysql:host=localhost;dbname=flash", "root", "");

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = ?");
    $stmt->execute([$id]);
    $juego = $stmt->fetch();

    if ($juego) {
        if (file_exists($juego['rutajuego'])) unlink($juego['rutajuego']);
        if (file_exists($juego['imagen'])) unlink($juego['imagen']);
        $stmt = $pdo->prepare("DELETE FROM juegos WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: juegos.php");
        exit;
    }
}

if (isset($_POST['guardar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stmt = $pdo->prepare("UPDATE juegos SET nombre = ?, descripcion = ? WHERE id = ?");
    $stmt->execute([$nombre, $descripcion, $id]);
    header("Location: juegos.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM juegos ORDER BY fecha_subida DESC");
$juegos = $stmt->fetchAll();
?>
<h2>Juegos disponibles</h2>

<?php foreach ($juegos as $juego): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?= htmlspecialchars($juego['nombre']) ?></h3>
        <img src="<?= $juego['imagen'] ?>" width="150"><br>
        <p><?= htmlspecialchars($juego['descripcion']) ?></p>
        <embed src="<?= $juego['rutajuego'] ?>" width="640" height="480"><br>
        <a href="juegos.php?editar=<?= $juego['id'] ?>">Editar</a> | 
        <a href="juegos.php?eliminar=<?= $juego['id'] ?>" onclick="return confirm('¿Seguro que quieres eliminar este juego?')">Eliminar</a>
    </div>
<?php endforeach; ?>

