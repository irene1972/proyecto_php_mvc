<?php
  require_once 'models/Producto.php';
  class CarritoController{
   
    public function index(){
      echo "Controlador Carrito, Acción index";
      var_dump($_SESSION['carrito']);
    }
  
    public function add(){

      if( isset( $_GET['id'] ) ){
        $producto_id = $_GET['id'];
      }else{
        header( "Location: " . BASE_URL );
      }

      if( $_SESSION['carrito'] ){

      }else{
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