<?php
  require_once 'models/Producto.php';
  class CarritoController{
   
    public function index(){

      $carrito = $_SESSION['carrito'] ;

      require_once "views/carrito/index.php";
      
    }
  
    public function add(){

      if( isset( $_GET['id'] ) ){
        $producto_id = $_GET['id'];
      }else{
        header( "Location: " . BASE_URL );
      }

      if( $_SESSION['carrito'] ){

        $counter = 0;

        foreach( $_SESSION['carrito'] as $indice => $elemento ){
          if( $elemento['id_producto'] == $producto_id ){
            $_SESSION['carrito'][$indice]['unidades']++;
            $counter++;
          }
        }

      }
      if( !isset($counter) || $counter == 0 ){
        // Conseguir producto
        $producto = new Producto();
        $producto->setId($producto_id);
        $prod = $producto->getById();

        if( is_object($prod) ){
          $_SESSION['carrito'][]=array(
            'id_producto' => $prod->id,
            'precio' => $prod->precio,
            'unidades' => 1,
            'producto' => $prod
          );
        }

      }

      header("Location: " . BASE_URL . "carrito/index");

    }

    public function remove(){
      
    }

    public function delete_session(){
      unset( $_SESSION['carrito'] );
      header("Location: " . BASE_URL . "carrito/index");
    }

  }

?>