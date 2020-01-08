
<?php if( isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completed' ): ?>

  <h1>Tu pedido se ha confirmado</h1>
  <p>Tu pedido ha sido guardado con exito, una vez que realizes la transferencia bancaria a la cuenta 78548524717458147ADD con el coste del pedido será procesado y enviado.</p>

  <br/>
  <?php if( isset($ped) ): ?>
    <h3>Datos del pedido:</h3>
    Número de pedido: <?=$ped->num_pedido?><br/>
    Total a pagar: <?=$ped->coste?> €<br/>
    Productos:<br/>
  <table>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Unidades</th>
    </tr>
    <?php if( isset($prods) ): ?>
      <?php while( $producto = $prods->fetch_object() ): ?>
      <tr>
        <td>
          <?php if( $producto->imagen != null ): ?>  
            <img src="<?=BASE_URL?>uploads/images/<?=$producto->imagen?>" alt="" class="img-carrito" />
          <?php else: ?>
            <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="" class="img-carrito" />
          <?php endif; ?>
        </td>
        <td><a href="<?=BASE_URL?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
        <td><?=$producto->precio?></td>
        <td><?=$producto->unidades?></td>
      </tr>
      <?php endwhile; ?>
    <?php endif; ?>
  </table>
  <?php endif; ?>

  <?php elseif( isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'completed' ): ?>
  <h1>Tu pedido NO ha sido procesado. Para más detalles contacta con 627023398</h1>
<?php endif; ?>