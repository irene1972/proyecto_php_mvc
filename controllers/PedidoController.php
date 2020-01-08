<?php

require_once 'models/Pedido.php';

class PedidoController{

  public function index(){
    require_once 'views/pedido/index.php';
  }

  public function add(){

    if( isset($_SESSION['identity']) ){
      if( isset( $_SESSION['carrito'] ) && isset($_POST['provincia']) && isset($_POST['localidad']) && isset($_POST['direccion']) ){

        $identity = $_SESSION['identity'];
        $carrito = $_SESSION['carrito'];
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

        //Guardar linea pedido
        $save_lineas = $pedido->save_linea($carrito);

        if( $save && $save_lineas ){
          $_SESSION["pedido"] = "completed";
        }else{
          $_SESSION["pedido"] = "failed";
        }

      }else{
        $_SESSION["pedido"] = "failed";
      }

      header( "Location:" . BASE_URL . "pedido/confirmado" );
    
    }else{
      header( "Location:" . BASE_URL );
    }

  }

  public function confirmado(){

    if( isset($_SESSION['identity']) ){

      $identity = $_SESSION['identity'];

      $pedido = new Pedido();
      $pedido->setUsuario_id( $identity->id );
      $ped = $pedido->getOneByUser();

      $ped_id = $ped->num_pedido;

      $pedido_prods = new Pedido();
      $pedido_prods->setId( $ped_id );
      $prods = $pedido_prods->getProductosByPedido();


    }
    

    require_once 'views/pedido/confirmado.php';
  }

  public function mis_pedidos(){
    
    $id_user = Utils::isIdentity();

    $pedido = new Pedido();

    // Extraemos los pedidos del usuario
    $pedido->setUsuario_id($id_user);
    $pedidos = $pedido->getAllByUser();

    require_once 'views/pedido/mis_pedidos.php';

  }

}

?>