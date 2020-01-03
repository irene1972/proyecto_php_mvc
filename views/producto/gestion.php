<h1>Gestionar productos</h1>

<a href="<?=BASE_URL?>producto/crear" class="button button-small">Crear producto</a>

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
    </tr>
  <?php endwhile; ?>

</table> 