<h1>Algunos de nuestros productos</h1>

<?php while( $product = $productos->fetch_object() ): ?>
  <div class="product">
    <a href="<?=BASE_URL?>producto/ver&id=<?=$product->id?>">
      <?php if( $product->imagen != null ): ?>  
        <img src="<?=BASE_URL?>uploads/images/<?=$product->imagen?>" alt="">
      <?php else: ?>
        <img src="<?=BASE_URL?>assets/img/sin_imagen.png" alt="">
      <?php endif; ?>
      <h2><?=$product->nombre?></h2>
    </a>
    <p><?=$product->precio?> €</p>
    <a href="<?=BASE_URL?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
  </div>
<?php endwhile; ?>