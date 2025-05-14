<?php
require_once '../models/usuario.php';

class Usuariocontroller{

 public function mostrarTodos(){
    $usuario = new usuario(); //instancia clase usuario
    $usuarios = $usuario->mostrarTodos();//llamamos al metodo obtener todos
    $contenido = '../Views/usuario/listarusuarios.php';//creamos variable llamada contenido
    require '../Views/admin/Plantilla';//incluimos la plantilla

 }

  public function crearusuario(){
   $contenido = '../Views/usuario/crear.php';//creamos variable llamada contenido
   require '../Views/admin/Plantilla';//incluimos la plantilla
  }


}


?>