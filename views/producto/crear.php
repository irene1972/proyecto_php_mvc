<h1>Crear nuevo producto</h1>

<div class="form_container">
  <form action="<?=BASE_URL?>producto/save" method="post">
    <label for="nombre">*Nombre</label>
    <input type="text" name="nombre" required />

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" required />

    <label for="stock">Stock</label>
    <input type="number" name="stock" required />

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" class="class-add-padding" required>
      <option value="">-- SELECCIONE CATEGORIA --</option>
      
      <?php while( $cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
      <?php endwhile; ?>
    </select> 

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" />
    

    <input type="submit" value="Guardar" class="button-prod" />
  </form>
</div>