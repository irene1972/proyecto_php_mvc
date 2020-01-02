<?php
  require_once 'autoload.php';
  require_once 'config/parameters.php';
  require_once 'views/layout/header.php';
  require_once 'views/layout/sidebar.php';

  function show_error(){
    $error = new ErrorController();
    $error->index();
  }

  $nombre_controlador = "";

  if( !isset($_GET['controller']) && !isset($_GET['action']) ){
    $nombre_controlador = CONTROLLER_DEFAULT;
  }

  if( isset($_GET['controller']) || $nombre_controlador == CONTROLLER_DEFAULT ){
  
    $nombre_controlador = ( $nombre_controlador == CONTROLLER_DEFAULT ) ? $nombre_controlador : $_GET['controller'] . 'Controller';

    if( class_exists( $nombre_controlador ) ){
      $controlador = new $nombre_controlador();

      if( isset($_GET['action']) && method_exists( $controlador, $_GET['action']) ){
      
        $action = $_GET['action'];
        $controlador->$action();
      
      }elseif( !isset($_GET['controller']) && !isset($_GET['action']) ){
        
        $action_default = ACTION_DEFAULT;
        $controlador->$action_default();

      }else{
        //echo "La página que buscas no existe 001";
        show_error();
      }
    }else{
      //echo "La página que buscas no existe 002";
      show_error();  
    }
    
  }else{
    //echo "La página que buscas no existe 003";
    show_error();
  }

  

  require_once 'views/layout/footer.php';


?>