<?php
require_once '../models/juegos.php';

class juegoscontroller{

   
 public function mostrarTodos(){
    $juego = new juegos(); //instancia clase juegos
    $juegos = $juego->mostrarTodos();//llamamos al metodo obtener todos
    $contenido = '../Views/juegos/listarjuegos.php';//creamos variable llamada contenido
    require '../Views/admin/Plantilla';//incluimos la plantilla

 }
  public function crearjuego(){
   $contenido = '../Views/juegos/crear.php';//creamos variable llamada contenido
   require '../Views/admin/Plantilla';//incluimos la plantilla
  }


}


?>