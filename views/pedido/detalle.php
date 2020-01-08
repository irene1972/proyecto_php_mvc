<h1>Detalle del pedido</h1>
<?php if( isset($ped) ): ?>
    <h3>Direccion de envío:</h3>
    Dirección: <?=$ped->direccion?><br/>
    Ciudad: <?=$ped->localidad?><br/>
    Provincia: <?=$ped->provincia?><br/><br/>
    <h3>Datos del pedido:</h3>
    Número de pedido: <?=$ped->id?><br/>
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