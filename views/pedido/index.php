
<?php if( isset($_SESSION['identity']) ): ?>
<?php if( isset($_SESSION['pedido']) ) Utils::deleteSession('pedido'); ?>

  <h1>Hacer pedido</h1>
  <p><a href="<?=BASE_URL?>carrito/index">Ver los productos y el precio del pedido</a></p><br/>

  <h3>Dirección para el envío</h3>
  <form action="<?=BASE_URL?>pedido/add" method="post">

    <label for="provincia">Provincia</label>
    <input type="text" name="provincia" required />

    <label for="localidad">Ciudad</label>
    <input type="text" name="localidad" required />

    <label for="direccion">Dirección</label>
    <input type="text" name="direccion" required />

    <input type="submit" value="Confirmar"/>

  </form>

<?php else: ?>
  <h1>Debes estar identificado</h1>
  <p>Debes identificarte en la web antes de realizar tu pedido.</p>
<?php endif; ?>