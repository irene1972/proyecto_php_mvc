<h1>Gestionar productos</h1>

<a href="<?=BASE_URL?>producto/crear" class="button button-small">Crear producto</a>

<?php if( isset($_SESSION['producto']) && $_SESSION['producto'] == 'completed' ): ?>
  <?php 
    
    $texto_success = "El Producto se ha creado correctamente";
    $texto_error = "El Producto NO se ha creado correctamente";

    if( isset($flag_editar) && $flag_editar ){

      $texto_success = "El Producto se ha modificado correctamente";
      $texto_error = "El Producto NO se ha modificado correctamente";

    }

  ?>
  <strong class="alert_green"><?=$texto_success?></strong>
<?php elseif ( isset( $_SESSION['producto']) && $_SESSION['producto'] == 'failed' ): ?>
  <strong class="alert_red"><?=$texto_error?></strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<?php if( isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed' ): ?>
  <strong class="alert_green">El Producto se ha borrado correctamente</strong>
<?php elseif ( isset( $_SESSION['delete']) && $_SESSION['delete'] == 'failed' ): ?>
  <strong class="alert_red">El Producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
  <tr>
    <th>ID</th>
    <!-- <th>CATEGORIA_ID</th> -->
    <th>NOMBRE</th>
    <!-- <th>DESCRIPCIÓN</th> -->
    <th>PRECIO</th>
    <th>STOCK</th>
    <!-- <th>OFERTA</th> -->
    <!-- <th>IMAGEN</th> -->
    <!-- <th>FECHA</th> -->
    <th class="th-acciones">ACCIONES</th>
  </tr>
  <?php while($prod = $productos->fetch_object()): ?>
    <tr>
      <td><?=$prod->id?></td>
      <!-- <td>< ?=$prod->categoria_id?></td> -->
      <td><?=$prod->nombre?></td>
      <!-- <td>< ?=$prod->descripcion?></td> -->
      <td><?=$prod->precio?></td>
      <td><?=$prod->stock?></td>
      <!-- <td>< ?=$prod->oferta?></td> -->
      <!-- <td>< ?=$prod->imagen?></td> -->
      <!-- <td>< ?=$prod->fecha?></td> -->
      <td>
        <!-- *Nota: muuuuy importante el parámetro id no va precedido por un interrogante sino por un & -->
        <a href="<?=BASE_URL?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
        <a href="<?=BASE_URL?>producto/eliminar&id=<?=$prod->id?>" class="button button-gestion button-red">Eliminar</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table> 