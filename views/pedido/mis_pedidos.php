<h1>Mis pedidos</h1>
<table>
  <tr>
    <th>Nº Pedido</th>
    <th>Coste</th>
    <th>Fecha</th>
  </tr>
    
  <?php if( isset($pedidos) ): ?>
    <?php while( $pedido = $pedidos->fetch_object() ): ?>
      <tr>
        <td><a href="<?=BASE_URL?>pedido/detalle&id=<?=$pedido->id?>"><?=$pedido->id?></a></td>
        <td><?=$pedido->coste?> €</td>
        <td><?=$pedido->fecha?></td>
      </tr>
    <?php endwhile;?>
  <?php endif; ?>
</table>