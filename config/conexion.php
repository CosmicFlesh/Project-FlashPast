<?php



function getConexion()
{
    $host = "localhost";
    $dbname ="flash";
    $username = "root";
    $password = "";

    try
    {
     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $pdo;
    }
    catch(PDOException $er)
    {
        die("Error de conexion". $er->getMessage());
    }
    
}

?>