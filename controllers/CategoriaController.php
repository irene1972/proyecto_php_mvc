<?php

require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController{

  public function index(){
    Utils::isAdmin();
    $categoria = new Categoria();
    $categorias = $categoria->getAll();

    require_once 'views/categoria/index.php';
  
  }

  public function ver(){
    Utils::isAdmin();

    if( isset($_GET['id']) ){
      //var_dump($_GET);

      $id = $_GET['id'];

      // Conseguir categoría
      $categoria = new Categoria();
      $categoria->setId($id);
      $categ = $categoria->getById();

      // Conseguir productos

      $producto = new Producto();
      $producto->setCategoria_id($id);
      $productos = $producto->getAllByCategory();

    }

    require_once 'views/categoria/ver.php';
  }


  public function crear(){
    Utils::isAdmin();
    require_once 'views/categoria/crear.php';
  }

  public function save(){
    Utils::isAdmin();

    // Guardar la categoría en bd
    if( isset($_POST) && isset($_POST['nombre']) ){

      $categoria = new Categoria();
      $categoria->setNombre($_POST['nombre']);
      $result_save = $categoria->save();

    }

    header("Location:" . BASE_URL. "categoria/index");

  }

}

?>