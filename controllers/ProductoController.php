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
        if( isset($_POST) && isset($_POST['nombre']) ){
    
          //var_dump($_POST);
          
          $producto = new Producto();
          $producto->setCategoria_id($_POST['categoria']);
          $producto->setNombre($_POST['nombre']);
          // FALTAN EL RESTO DE CAMPOS NO OBLIGATORIOS
          $result_save = $producto->save();
    
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