<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir Juego</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      background-color: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    h1 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      color: #555;
      font-weight: 500;
    }

    input[type="text"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 0.6rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      background-color: #fdfdfd;
      transition: border-color 0.2s ease;
    }

    input:focus,
    textarea:focus {
      border-color: #0077cc;
      outline: none;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
    }

    button {
      padding: 0.7rem 1.5rem;
      border: none;
      border-radius: 8px;
      background-color:rgb(204, 0, 0);
      color: white;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    button:hover {
      background-color:rgb(255, 0, 0);
      
    }

    .success {
      color: green;
      text-align: center;
      margin-bottom: 1rem;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Subir juego SWF</h1>

    <?php
    if (isset($_GET['error'])) {
        echo '<p class="error">Error al subir el juego.</p>';
    } elseif (isset($_GET['success'])) {
        echo '<p class="success">Juego subido correctamente.</p>';
    }
    ?>

    <form action="./subir.php" method="POST" enctype="multipart/form-data">
      <label for="nombre">Nombre del juego:</label>
      <input type="text" name="nombre" id="nombre" required>

      <label for="descripcion">Descripción:</label>
      <textarea name="descripcion" id="descripcion" required></textarea>

      <label for="swf">Archivo del juego (.swf):</label>
      <input type="file" name="archivo_swf" id="swf" accept=".swf" required>

      <label for="imagen">Imagen del juego (.jpg, .png):</label>
      <input type="file" name="imagen" id="imagen" accept="image/*" required>

      <div class="buttons">
        <button type="submit">Subir juego</button>
        <button type="button" onclick="window.location.href='../abProgra/index.php'">Salir</button>
      </div>
    </form>
  </div>
</body>
</html>
