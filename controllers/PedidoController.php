<?php

require_once 'models/Pedido.php';

class PedidoController{

  public function index(){
    require_once 'views/pedido/index.php';
  }

  public function add(){
    
    //var_dump($_POST);
    echo "Pedido Realizado!!";

    if( isset($_SESSION['identity']) ){
      if( isset( $_SESSION['carrito'] ) && isset($_POST['provincia']) && isset($_POST['localidad']) && isset($_POST['direccion']) ){

        $identity = $_SESSION['identity'];

        $user_id = $identity->id;

        $provincia = $_POST['provincia'];
        $localidad = $_POST['localidad'];
        $direccion = $_POST['direccion'];

        $pedido = new Pedido();

        //seteamos parametros
        $coste_pedido = Utils::estadisticasCarrito();
        
        $pedido->setUsuario_id($user_id);

        $pedido->setProvincia($provincia);
        $pedido->setLocalidad($localidad);
        $pedido->setDireccion($direccion);
        $pedido->setCoste($coste_pedido['total']);

        $save = $pedido->save();

        if( $save ){
          $_SESSION["pedido"] = "completed";
        }else{
          $_SESSION["pedido"] = "failed";
        }

      }else{
        $_SESSION["pedido"] = "failed";
        header( "Location:" . BASE_URL );
      }
    }else{
      $_SESSION["pedido"] = "failed";
      header( "Location:" . BASE_URL );
    }

  }

}

?>