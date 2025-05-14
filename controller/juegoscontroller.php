<?php
require_once '../models/juegos.php';

class juegoscontroller{

   
 public function mostrarTodos(){
    $usuario = new usuario(); //instancia clase usuario
    $usuarios = $usuario->mostrarTodos();//llamamos al metodo obtener todos
    $contenido = '../Views/usuario/listarusuarios.php';//creamos variable llamada contenido
    require '../Views/admin/Plantilla';//incluimos la plantilla

 }
  public function crearjuego(){
   $contenido = '../Views/juegos/crear.php';//creamos variable llamada contenido
   require '../Views/admin/Plantilla';//incluimos la plantilla
  }


}


?>