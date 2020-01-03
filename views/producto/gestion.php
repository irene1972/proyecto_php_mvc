<h1>Gestionar productos</h1>

<a href="<?=BASE_URL?>producto/crear" class="button button-small">Crear producto</a>

<?php if( isset($_SESSION['producto']) && $_SESSION['producto'] == 'completed' ): ?>
  <strong class="alert_green">El Producto se ha creado correctamente</strong>
<?php elseif ( isset( $_SESSION['producto']) && $_SESSION['producto'] == 'failed' ): ?>
  <strong class="alert_red">El Producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

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
        <a href="#" class="button button-gestion">Editar</a>
        <a href="#" class="button button-gestion button-red">Eliminar</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table> 