<h1>Carrito de la compra</h1>
<table>
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
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
    </tr>
  <?php endforeach;?>

</table>
<?php $estadisticas = Utils::estadisticasCarrito(); ?>
<br/>
<div class="total-carrito">
  <h3>Precio total: <?=$estadisticas['total']?> €</h3>
  <a href="#" class="button button-pedido">Hacer pedido</a>
</div>