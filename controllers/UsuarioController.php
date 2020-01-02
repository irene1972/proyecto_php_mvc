<?php

class UsuarioController{

  public function index(){
    echo "Controlador Usuarios, Acción index";
  }

  public function registro(){
    // Render view
    require_once 'views/usuario/registro.php';
  }

  public function save(){
    if(isset($_POST)){
      var_dump($_POST);
    }  
  }

}

?>