<?php if( isset($prod) && is_object($prod) ): ?>
  <h1><?=$prod->nombre?></h1>

  <?php if( $prod->imagen != null ): ?>  
    <img src="<?=BASE_URL?>uploads/images/<?=$prod->imagen?>" alt="">
  <?php else: ?>
    <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="">
  <?php endif; ?>
 
  <p><?=$prod->descripcion?></p>
  <p><?=$prod->precio?></p>
  <a href="#" class="button">Comprar</a>

<?php else: ?>
  <h1>El producto no existe</h1>
<?php endif; ?>