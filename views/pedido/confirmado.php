<?php if( isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'confirmed' ): ?>
  <h1>Tu peido se ha confirmado</h1>
  <p>Tu pedido ha sido guardado con exito, una vez que realizes la transferencia bancaria con el coste del pedido será procesado y enviado.</p>
<?php elseif( isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'confirmed' ): ?>
  <h1>Tu pedido NO ha sido procesado. Para más detalles contacta con 627023398</h1>
<?php endif; ?>