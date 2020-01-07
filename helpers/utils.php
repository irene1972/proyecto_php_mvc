<?php

  class Utils{
    public static function deleteSession( $name ){
      
      if( isset($_SESSION[$name]) ){
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
      }      

      return $name;
      
    }

    public static function isAdmin(){
      if( !isset($_SESSION['admin']) ){
        header("Location:" . BASE_URL);
      }else {
        return true;
      }
    }

    public static function showCategorias(){
      require_once 'models/Categoria.php';
      $categoria = new Categoria();
      $categorias = $categoria->getAll();
      return $categorias;
    }

    public static function estadisticasCarrito(){

      $estadisticas = array(
        'count' => 0,
        'total' => 0
      );

      if( isset($_SESSION['carrito']) ){

        $estadisticas['count'] = count( $_SESSION['carrito'] );

        $cantidad = 0;

        foreach( $_SESSION['carrito'] as $elemento ){
          $prod = $elemento['producto'];
          $cantidad += $elemento['unidades'] * $prod->precio;
        }

        $estadisticas['total'] = $cantidad;

      }

      return $estadisticas;

    }

  }

?>

