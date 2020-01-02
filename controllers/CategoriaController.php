<?php

require_once 'models/Categoria.php';

class CategoriaController{

  public function index(){

    $categoria = new Categoria();
    $categorias = $categoria->getAll();

    require_once 'views/categoria/index.php';
  
  }

}

?>