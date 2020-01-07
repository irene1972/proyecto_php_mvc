<?php if( isset($categ) && is_object($categ) ): ?>
  <h1><?=$categ->nombre?></h1>
  <?php if($productos->num_rows == 0): ?>
    <p>No hay productos para mostrar</p>
  <?php else: ?>
    <?php while( $product = $productos->fetch_object() ): ?>
      <div class="product">
        <?php if( $product->imagen != null ): ?>  
          <img src="<?=BASE_URL?>uploads/images/<?=$product->imagen?>" alt="">
        <?php else: ?>
          <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="">
        <?php endif; ?>
        <h2><?=$product->nombre?></h2>
        <p><?=$product->precio?></p>
        <a href="#" class="button">Comprar</a>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
<?php else: ?>
  <h1>La categoría no existe</h1>
<?php endif; ?>
