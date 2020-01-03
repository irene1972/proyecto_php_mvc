<?php
  require_once 'models/Producto.php';
  class ProductoController{

      public function index(){
        
        //renderizar vista
        require_once 'views/producto/destacados.php';
      
      }

/*
      public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
      }
      */

      public function gestion(){

        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';

      }
    
    }

?>