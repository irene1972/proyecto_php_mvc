<?php
  require_once 'models/Producto.php';
  class ProductoController{

      public function index(){
        
        //renderizar vista
        require_once 'views/producto/destacados.php';
      
      }

      public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
      }

      public function save(){
        Utils::isAdmin();
 
        // Guardar el producto en bd
        if( isset($_POST) ){
          if( isset($_POST['nombre']) && strlen($_POST['nombre']) > 0 && isset($_POST['categoria']) && isset($_POST['precio']) && isset($_POST['stock']) ){
      
            //var_dump($_POST);
            
            $producto = new Producto();

            // CAMPOS OBLIGATORIOS
            $producto->setCategoria_id($_POST['categoria']);
            $producto->setNombre($_POST['nombre']);
            $producto->setPrecio($_POST['precio']);
            $producto->setStock($_POST['stock']);

            // CAMPOS NO OBLIGATORIOS
            $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : false;
            // $oferta = (isset($_POST['oferta'])) ? $_POST['oferta'] : false;
            // $imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : false;

            if( $descripcion )
              $producto->setDescripcion($_POST['descripcion']);

            // if( $oferta )
            //   $producto->setOferta($_POST['oferta']);

            // if( $imagen )
            //   $producto->setImagen($_POST['imagen']);

            $result_save = $producto->save();
            
            if( $result_save ){
              $_SESSION['producto'] = "completed";
            }else{
              $_SESSION['producto'] = "failed";
            }
          }else{
            $_SESSION['producto'] = "failed";
          }
        }else{
          $_SESSION['producto'] = "failed";
        }

        header("Location:" . BASE_URL. "producto/gestion");
    
      }

      public function gestion(){

        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';

      }
    
    }

?>