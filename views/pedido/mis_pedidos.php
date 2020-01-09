<?php if( isset($gestion) && $gestion ): ?>
  <h1>Gestión de pedidos</h1>
<?php else: ?>
  <h1>Mis pedidos</h1>
<?php endif;?>

<table>
  <tr>
    <th>Nº Pedido</th>
    <?php if( isset($gestion) && $gestion ): ?>
      <th>Id Usuario</th>
    <?php endif; ?>
    <th>Coste</th>
    <th>Fecha</th>
    <?php if( isset($gestion) && $gestion ): ?>
      <th>Estado</th>
    <?php endif; ?>
  </tr>
    
  <?php if( isset($pedidos) ): ?>
    <?php while( $pedido = $pedidos->fetch_object() ): ?>
      <tr>
        <td><a href="<?=BASE_URL?>pedido/detalle&id=<?=$pedido->id?>"><?=$pedido->id?></a></td>
        <?php if( isset($gestion) && $gestion ): ?>
          <td><a href="#"><?=$pedido->usuario_id?></a></td><!--< ?=BASE_URL?>usuario/detalle&id=< ?=$pedido->usuario_id?>-->
        <?php endif; ?>
        <td><?=$pedido->coste?> €</td>
        <td><?=$pedido->fecha?></td>
        <?php if( isset($gestion) && $gestion ): ?>
          <td><?=Utils::showStatus($pedido->estado)?></td>
        <?php endif; ?>
      </tr>
    <?php endwhile;?>
  <?php endif; ?>
</table>