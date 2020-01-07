<?php if( isset($editar) && isset($prod) && is_object($prod) ): ?>
  <h1>Editar producto: <?=$prod->nombre?></h1>
  <?php $url_action = BASE_URL . "producto/save&id=$prod->id"; ?>
<?php else: ?>
  <h1>Crear nuevo producto</h1>
  <?php $url_action = BASE_URL . "producto/save"; ?>
<?php endif; ?>

<div class="form_container">
  <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
    <label for="nombre">*Nombre</label>
    <input type="text" name="nombre" value="<?= (isset($prod) && is_object($prod)) ? $prod->nombre : '' ?>" required />

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"><?= (isset($prod) && is_object($prod)) ? $prod->descripcion : '' ?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?= (isset($prod) && is_object($prod)) ? $prod->precio : '' ?>" required />

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= (isset($prod) && is_object($prod)) ? $prod->stock : '' ?>" required />

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" class="class-add-padding" required>
      <option value="">-- SELECCIONE CATEGORIA --</option>
      
      <?php while( $cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>" <?= (isset($prod) && is_object($prod)) && ( $cat->id == $prod->categoria_id ) ? 'selected' : '' ?>><?=$cat->nombre?></option>
      <?php endwhile; ?>
    </select> 

    <label for="imagen">Imagen</label>
    <?php if( isset($prod) && is_object($prod) && !empty($prod->imagen) ): ?>
      <img src="<?=BASE_URL?>uploads/images/<?=$prod->imagen?>" class="thumb" /><br/>
    <!-- < ?php else: ?> -->
      <input type="file" name="imagen" />
    <?php endif; ?>
    

    <input type="submit" value="Guardar" class="button-prod" />
  </form>
</div>