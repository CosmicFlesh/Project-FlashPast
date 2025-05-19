<?php



function getConexion()
{
    $host = "localhost";
    $dbname = "flash";
    $username = "root";
    $password = "";
    $conn = "";
    try {
        //  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $username, $password);
        //  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  return $pdo;
        $conn = mysqli_connect(
            $host,
            $dbname,
            $username,
            $password
        );
    }


    //catch(PDOException $er)
    catch (mysqli_sql_exception) {
        echo "error de conexion";
        // die("Error de conexion". $er->getMessage());
    }
}
