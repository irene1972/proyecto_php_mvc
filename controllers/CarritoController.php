<?php
  require_once 'models/Producto.php';
  class CarritoController{
   
    public function index(){

      $carrito = [];
      if( isset( $_SESSION['carrito'] ) ){
        $carrito = $_SESSION['carrito'] ;
      }

      require_once "views/carrito/index.php";
      
    }
  
    public function add(){

      if( isset( $_GET['id'] ) ){
        $producto_id = $_GET['id'];
      }else{
        header( "Location: " . BASE_URL );
      }

      if( isset($_SESSION['carrito']) ){

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

    public function delete(){
      if( isset($_GET['index']) ){

        $index = $_GET['index'];
        unset( $_SESSION['carrito'][$index] );

        header("Location: " . BASE_URL . "carrito/index");

      }else{
        //Gestionar error
        //echo "ERROR";
      }
    }

    public function delete_session(){
      unset( $_SESSION['carrito'] );
      header("Location: " . BASE_URL . "carrito/index");
    }

    public function up(){
      if( isset($_GET['index']) ){

        $index = $_GET['index'];
        $_SESSION['carrito'][$index]['unidades']++;

        header("Location: " . BASE_URL . "carrito/index");

      }
    }

    public function down(){
      if( isset($_GET['index']) ){

        $index = $_GET['index'];
        $_SESSION['carrito'][$index]['unidades']--;

        if( $_SESSION['carrito'][$index]['unidades'] == 0 )
          unset( $_SESSION['carrito'][$index] );

        header("Location: " . BASE_URL . "carrito/index");

      }
    }

  }

?>