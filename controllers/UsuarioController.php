<?php

require_once 'models/Usuario.php';

class UsuarioController{

  public function index(){
    echo "Controlador Usuarios, Acción index";
  }

  public function registro(){
    // Render view
    require_once 'views/usuario/registro.php';
  }

  public function save(){
    if(isset($_POST)){
      //var_dump($usuario);
      $usuario = new Usuario();
      $usuario->setNombre($_POST['nombre']);
      $usuario->setApellidos($_POST['apellidos']);
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);

      $save = $usuario->save();

      if( $save ){
        //echo "Registro completado";
        $_SESSION['register']="completed";
      }else{
        //echo "Registro fallido";
        $_SESSION['register']="failed";
      }

    }else{
      $_SESSION['register']="failed";
    }

    header("Location:" . BASE_URL . 'usuario/registro');

  }

}

?>