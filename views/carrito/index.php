<h1>Carrito de la compra</h1>
  <?php if( isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0 ): ?>

    <table>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
      </tr>
      
      <?php 
        foreach( $carrito as $indice => $elemento ):
          $producto = $elemento['producto']; 
      ?>
        <tr>
          <td>
            <!-- <img src="< ?=BASE_URL?>uploads/images/< ?=$producto->imagen?>" alt="" style="width:20px;"> -->
            <?php if( $producto->imagen != null ): ?>  
              <img src="<?=BASE_URL?>uploads/images/<?=$producto->imagen?>" alt="" class="img-carrito" />
            <?php else: ?>
              <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="" class="img-carrito" />
            <?php endif; ?>
          </td>
          <td><a href="<?=BASE_URL?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
          <td><?=$producto->precio?></td>
          <td><?=$elemento['unidades']?></td>
          <td class="delete"><a href="<?=BASE_URL?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a></td>
        </tr>
      <?php endforeach;?>

    </table>
    <?php $estadisticas = Utils::estadisticasCarrito(); ?>
    <br/>

    <div class="delete-carrito">
      <a href="<?=BASE_URL?>carrito/delete_session" class="button button-delete button-red">Vaciar carrito</a>
    </div>

    <div class="total-carrito">
      <h3>Precio total: <?=$estadisticas['total']?> €</h3>
      <a href="<?=BASE_URL?>pedido/index" class="button button-pedido">Hacer pedido</a>
    </div>

  <?php else: ?>
    <p>El carrito está vacío, añade algún producto</p>
  <?php endif; ?>