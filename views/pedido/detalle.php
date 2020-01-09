<h1>Detalle del pedido</h1>
<?php if( isset($ped) ): ?>
  <?php if( isset($_SESSION['admin']) ): ?>
    <h3>Cambiar estado del pedido</h3>
    <form action="<?=BASE_URL?>pedido/estado" method="post">
      <input type="hidden" name="pedido_id" value="<?=$ped->id?>" />
      <input type="hidden" name="old_status" value="<?=$ped->estado?>" />
      <select name="estado">
        <!--<option value="" selected>- Seleccione estado si quiere cambiar -</option>-->
        <option value="confirm" <?=( $ped->estado == "confirm" ) ? 'selected' : ''?>>Pendiente</option>
        <option value="preparation" <?=( $ped->estado == "preparation" ) ? 'selected' : ''?>>En preparación</option>
        <option value="ready" <?=( $ped->estado == "ready" ) ? 'selected' : ''?>>Preparado para enviar</option>
        <option value="sended" <?=( $ped->estado == "sended" ) ? 'selected' : ''?>>Enviado</option>
      </select>
      <input type="submit" value="Cambiar estado" />
    </form><br/>
  <?php endif; ?>

  <?php if( isset($_SESSION['admin']) && isset($user) ): ?>
    <h3>Datos del cliente:</h3>
      Id: <?=$user->id?><br/>
      Nombre: <?=$user->nombre?><br/>
      Apellidos: <?=$user->apellidos?><br/>
      Email: <?=$user->email?><br/>
      Password: **********<br/>
      Rol: <?=$user->rol?><br/>
      Ruta imagen: <?=$user->imagen?><br/><br/>
  <?php endif; ?>

  <h3>Direccion de envío:</h3>
    Dirección: <?=$ped->direccion?><br/>
    Ciudad: <?=$ped->localidad?><br/>
    Provincia: <?=$ped->provincia?><br/><br/>
  
  <h3>Datos del pedido:</h3>
    Número de pedido: <?=$ped->id?><br/>
    Estado: <?=Utils::showStatus($ped->estado)?><br/>
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
            <img src="<?=BASE_URL?>assets/img/sin_imagen.png" alt="" class="img-carrito" />
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