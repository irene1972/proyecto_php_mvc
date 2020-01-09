<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tienda de Camisetas</title>
  <link rel="stylesheet" href="<?=BASE_URL?>assets/css/styles.css">
</head>
<body>
  <div id="container">
      
    <!-- CABECERA -->
    <header id="header">
      <div id="logo">
        <img src="<?=BASE_URL?>assets/img/logo.png" alt="Artesania Logo">
        <a href="<?=BASE_URL?>">
          Tienda de Artesanía
        </a>
      </div>
    </header>

    <!-- MENU -->
    <?php $categorias = Utils::showCategorias(); ?>
    <nav id="menu">
      <ul>
        <li><a href="<?=BASE_URL?>">Inicio</a></li>
        <?php while($cat = $categorias->fetch_object()): ?>
          <li><a href="<?=BASE_URL?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
        <?php endwhile; ?>
      </ul>
    </nav>

    
    <div id="content">