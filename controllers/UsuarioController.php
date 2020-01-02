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

      $nombre = ( isset($_POST['nombre']) ) ? $_POST['nombre'] : false;
      $apellidos = ( isset($_POST['apellidos']) ) ? $_POST['apellidos'] : false;
      $email = ( isset($_POST['email']) ) ? $_POST['email'] : false;
      $password = ( isset($_POST['password']) ) ? $_POST['password'] : false;

      if( $nombre && $apellidos && $email && $password ){
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setEmail($email);
        $usuario->setPassword($password);

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

    }else{
      $_SESSION['register']="failed";
    }

    header("Location:" . BASE_URL . 'usuario/registro');

  }

  public function login(){
    if(isset($_POST)){
      // IDENTIFICAR USUARIO:
      // Consulta a la base de datos
      $usuario = new Usuario();

      $usuario->setEmail( $_POST['email'] );
      $usuario->setPassword( $_POST['password'] );

      $identity = $usuario->login();

      // Crear sesion
      if( $identity && is_object($identity) ){
        //var_dump($identity);
        
        $_SESSION['identity'] = $identity;

        if( $identity->role == 'admin' ){
          $_SESSION['admin'] = true; 
        }

      }else{
        $_SESSION['error_login'] = 'Identificación fallida';
      }

    }

    header( 'Location:' . BASE_URL );

  }

  public function logout(){

    if( isset($_SESSION['identity']) ){
      unset( $_SESSION['identity'] );
    }

    if( isset($_SESSION['admin']) ){
      unset( $_SESSION['admin'] );
    }

    header( 'Location:' . BASE_URL );

  }

}

?>