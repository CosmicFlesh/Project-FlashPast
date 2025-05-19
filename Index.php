<!DOCTYPE html>
<html lang="es">
<?php
include ("conexion.php");;
//$pdo = new PDO("mysql:host=localhost;dbname=flash", "root", "");

$stmt = $pdo->query("SELECT * FROM juegos ORDER BY fechasubi DESC LIMIT 3");
$recientes = $stmt->fetchAll();
?>

<head>
    <meta charset="UTF-8" />
    <title>Flashing Past</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: rgb(206, 206, 206);
            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        nav a {
            color: rgb(234, 255, 42);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.2s;
        }

        nav a:hover {
            color: #3538fb;
            text-decoration: underline;
        }

        .carousel {
            max-width: 800px;
            margin: 40px auto;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .imgs {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .imagen {
            min-width: 100%;
            height: 400px;


        }

        .slide {
            position: relative;
            min-width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .slide img.imagen {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
            color: rgb(234, 255, 42);
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 1px 1px 5px black;
        }

        main {
            flex: 1;
            padding: 40px 20px;
        }

        .bysite {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
            text-align: center;
        }

        .bysite a {
            text-decoration: none;
            color: #000;
            transition: transform 0.2s;
        }

        .recientes {
            align-self: center;
            justify-content: center;
        }
        .reci{
             align-self: center;
            justify-self: center;
            flex: content;
        }

        .bysite img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 15px;
            object-fit: contain;
        }

        .bysite a:hover img {
            transform: translateY(-5px);
        }

        .site {
            margin-top: 10px;
            font-weight: bold;
        }

        .section_sitios {
            height: 400px;
        }

        .section_tags {
            height: 400px;
        }

        .section {
            margin-top: 40px;
            text-align: center;
        }

        .section h2,
        .section h3 {
            font-size: 1.5rem;
            color: #111;
        }

        footer {
            background: #000;
            color: rgb(253, 253, 46);
            text-align: center;
            padding: 20px 0;
            font-style: italic;
            border-radius: 10px 10px 0 0;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
            }

            .carousel {
                width: 90%;
            }

            .imagen {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="./Proyecto.html">
            <img src="./views/admin/img/flash.png" alt="Flashing Past Logo">
        </a>
        <nav>
            <ul>
                <li><a href="./index.php">Index</a></li>
                <li><a href="./views/juegos/juegos.php">juegos</a></li>
                <li><a href="./Proyecto.html">Tags</a></li>
                <li><a href="./views/admin/adcrearjuego.php">upload</a></li>
            </ul>
        </nav>
    </header>

    <div class="carousel">
        <div class="imgs">
            <?php foreach ($recientes as $juego): ?>
                <a href="/abprogra/views/juegos/jugar.php?id=<?= $juego['id'] ?>" class="slide">
                    <img class="imagen" src="<?= htmlspecialchars($juego['imagen']) ?>" alt="<?= htmlspecialchars($juego['nombre']) ?>">
                    <div class="overlay"><?= htmlspecialchars($juego['nombre']) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <hr>
    <main>
        <h2 class="reci">Juegos recientes</h2>
        <div class="recientes" style="display: flex; gap: 20px; flex-wrap: wrap;">
            <?php foreach ($recientes as $juego): ?>
                <div style="width: 200px; border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <img src="<?= $juego['imagen'] ?>" alt="Imagen de <?= htmlspecialchars($juego['nombre']) ?>" style="width: 100%; height: auto;"><br>
                    <strong><?= htmlspecialchars($juego['nombre']) ?></strong><br>
                    <a href="/abprogra/views/juegos/jugar.php?id=<?= $juego['id'] ?>">Ver juego</a>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <section class="bysite">
            <a href="./views/juegos/juegos.php">
                <img src="./views/admin/img/Cartoon_Network_1992.svg" alt="Cartoon Network">
                <p class="site">Cartoon Network Games</p>
            </a>
            <a href="./views/juegos/juegos.php">
                <img src="./views/admin/img/icon-384435334.png">
                <p class="site">ArmorGames</p>
            </a>

        </section>

        <hr>
        <section class="section_tags">
            <h3>se complicaron mucho los tags :(</h3>
        </section>
    </main>

    <footer>
        <h2>2025 Flashing Past</h2>
    </footer>

    <script>
        let index = 0;
        const slides = document.querySelector('.imgs');
        const totalSlides = document.querySelectorAll('.imagen').length;

        function showNextSlide() {
            index = (index + 1) % totalSlides;
            slides.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(showNextSlide, 3000);
    </script>

</body>

</html>