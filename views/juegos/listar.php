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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Juegos</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #000;
            color: #fffc3f;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 15px 15px;
        }

        h2 {
            margin-top: 40px;
            text-align: center;
        }

        .juegos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: 40px auto;
        }

        .juego-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            width: 220px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s;
        }

        .juego-card:hover {
            transform: translateY(-5px);
        }

        .juego-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .juego-info {
            padding: 15px;
        }

        .juego-info h3 {
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .jugar-btn {
            display: inline-block;
            background-color: #3538fb;
            color: #fff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .jugar-btn:hover {
            background-color: #2a2cd1;
        }

        .volver {
            text-align: center;
            margin-top: 40px;
        }

        .volver a {
            text-decoration: none;
            color: #3538fb;
            font-weight: bold;
        }

        .volver a:hover {
            color: #000;
        }
    </style>
</head>
<body>

    <header>
        <h1>Flashing Past - Juegos disponibles</h1>
    </header>

    <h2>Catálogo</h2>

    <div class="juegos-container">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="juego-card">
                <img src="<?= htmlspecialchars($row['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($row['nombre']) ?>">
                <div class="juego-info">
                    <h3><?= htmlspecialchars($row['nombre']) ?></h3>
                    <a class="jugar-btn" href="jugar.php?id=<?= $row['id'] ?>">Jugar</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="volver">
        <a href="index.php">← Volver al inicio</a>
    </div>

</body>
</html>
