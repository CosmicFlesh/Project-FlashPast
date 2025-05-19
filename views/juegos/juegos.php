<?php
include ("conexion.php");

// Eliminar juego
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = ?");
    $stmt->execute([$id]);
    $juego = $stmt->fetch();
    if ($juego) {
        if (file_exists($juego['rutajuego'])) unlink($juego['rutajuego']);
        if (file_exists($juego['imagen'])) unlink($juego['imagen']);
        $pdo->prepare("DELETE FROM juegos WHERE id = ?")->execute([$id]);
    }
    header("Location: juegos.php");
    exit;
}

// Guardar edición
if (isset($_POST['guardar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $pdo->prepare("UPDATE juegos SET nombre = ?, descripcion = ? WHERE id = ?")
        ->execute([$nombre, $descripcion, $id]);
    header("Location: juegos.php");
    exit;
}

// Mostrar juegos
$stmt = $pdo->query("SELECT * FROM juegos ORDER BY fechasubi DESC");
$juegos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Juegos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #000;
            color: rgb(234, 255, 42);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            border-radius: 0 0 20px 20px;
        }

        header img {
            height: 50px;
            object-fit: contain;
        }

        h2 {
            color: #333;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 10px 20px;
            background-color: #3538fb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1a1cd1;
        }

        .grid-juego {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            display: flex;
            gap: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .juego img {
            max-width: 150px;
            border-radius: 8px;
        }

        .juego-info {
            flex-grow: 1;
        }

        .acciones a {
            margin-right: 10px;
            color: #3538fb;
            text-decoration: none;
        }

        .acciones a:hover {
            text-decoration: underline;
        }

        embed {
            max-width: 100%;
            border: 1px solid #ccc;
            margin-top: 10px;
        }

        .editar-form {
            background: #fffbe6;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            border: 1px solid #ccc;
        }

        .grid-juegos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .juego {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .juego img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .juego-info {
            width: 100%;
        }

        embed {
            width: 100%;
            height: 240px;
            margin-top: 10px;
            border-radius: 6px;
        }

        footer {
            background: #000;
            color: rgb(253, 253, 46);
            text-align: center;
            padding: 20px 0;
            font-style: italic;
            border-radius: 10px 10px 0 0;
        }

        .acciones {
            margin-top: 10px;
        }
    </style>


</head>

<body>
    <header>
        <h1>Flashing Past</h1>
        <nav>
            <a href="http://abProgra/index.php">Inicio</a>
            <a href="juegos.php">Administrar Juegos</a>
        </nav>
    </header>
    <h2>Juegos subidos</h2>
    <?php if (isset($_GET['editar'])):
        $id = $_GET['editar'];
        $stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = ?");
        $stmt->execute([$id]);
        $juego = $stmt->fetch();
        if ($juego): ?>
            <div class="editar-form">
                <h3>Editar juego: <?= htmlspecialchars($juego['nombre']) ?></h3>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $juego['id'] ?>">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($juego['nombre']) ?>">

                    <label>Descripción:</label>
                    <textarea name="descripcion"><?= htmlspecialchars($juego['descripcion']) ?></textarea>

                    <button type="submit" name="guardar">Guardar cambios</button>
                </form>
            </div>
    <?php endif;
    endif; ?>
    <div class="grid-juegos">
        <?php foreach ($juegos as $juego): ?>
            <div class="juego">

                <img src="<?= htmlspecialchars($juego['imagen']) ?>" alt="Imagen de juego">
                <div class="juego-info">
                    <h3><?= htmlspecialchars($juego['nombre']) ?></h3>
                    <p><?= htmlspecialchars($juego['descripcion']) ?></p>
                    <embed src="<?= htmlspecialchars($juego['rutajuego']) ?>" width="320" height="240">
                    <div class="acciones">
                        <a href="juegos.php?editar=<?= $juego['id'] ?>">Editar</a>
                        <a href="juegos.php?eliminar=<?= $juego['id'] ?>" onclick="return confirm('¿Eliminar este juego?')">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <footer>
        &copy; 2025 Flashing Past
    </footer>
</body>

</html>