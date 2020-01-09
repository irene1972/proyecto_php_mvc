<h1>Gestionar categorías</h1>

<a href="<?=BASE_URL?>categoria/crear" class="button button-small">Crear categoría</a>

<table>
  <tr class="tr-order">
    <th><a href="<?=BASE_URL?>categoria/index&order=id" class="order">ID</a></th>
    <th><a href="<?=BASE_URL?>categoria/index&order=nombre" class="order">NOMBRE</a></th>
  </tr>
  <?php while($cat = $categorias->fetch_object()): ?>
    <tr>
      <td><?=$cat->id?></td>
      <td><?=$cat->nombre?></td>
    </tr>
  <?php endwhile; ?>

</table> 