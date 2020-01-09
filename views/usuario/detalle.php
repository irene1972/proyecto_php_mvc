<h1>Detalle del usuario</h1>
  <?php if( isset($usuario) ): ?>
    <b>Id:</b> <?=$usuario->id?><br/>
    <b>Nombre:</b> <?=$usuario->nombre?><br/>
    <b>Apellidos:</b> <?=$usuario->apellidos?><br/>
    <b>Email:</b> <?=$usuario->email?><br/>
    <b>Password:</b> **********<br/>
    <b>Rol:</b> <?=$usuario->rol?><br/>
    <b>Ruta imagen:</b> <?=$usuario->imagen?><br/>
  <?php else: ?>
    <p>No hay datos sobre este Usuario</p>
  <?php endif; ?>