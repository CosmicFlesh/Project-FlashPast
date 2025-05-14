<?php
$conexion = mysqli_connect("localhost", "usuario", "contraseña", "flashing_past");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
$query = "SELECT * FROM juegos";
$result = mysqli_query($conexion, $query);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Juegos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: rgb(206, 206, 206);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgba(0, 0, 0, 0.9);
            color: rgb(234, 255, 42);
            text-align: center;
            padding: 20px;
            border-radius: 0 0 20px 20px;
        }

        main {
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .juego {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .juego:hover {
            transform: translateY(-5px);
        }

        .juego img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .juego h3 {
            color: #000;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .juego p {
            font-size: 0.95rem;
            color: #333;
            margin-bottom: 15px;
        }

        .jugar-btn {
            background-color: #000;
            color: rgb(234, 255, 42);
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .jugar-btn:hover {
            background-color: #3538fb;
            color: white;
        }

        footer {
            background: #000;
            color: rgb(253, 253, 46);
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Flashing Past - Juegos</h1>
    </header>

    <main>
        <?php while ($juego = mysqli_fetch_assoc($result)): ?>
            <div class="juego">
                <img src="<?= htmlspecialchars($juego['imagen']) ?>" alt="Imagen del juego">
                <h3><?= htmlspecialchars($juego['nombre']) ?></h3>
                <p><?= htmlspecialchars($juego['descripcion']) ?></p>
                <a class="jugar-btn" href="jugar.php?id=<?= $juego['id'] ?>">Jugar</a>
            </div>
        <?php endwhile; ?>
    </main>

    <footer>
        <p>Flashing Past Nostalgia</p>
    </footer>
</body>
</html>
