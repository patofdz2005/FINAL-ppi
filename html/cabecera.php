<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FISH SHOP - <?= $titulo ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

<!-- BANNERS DE ARRIBA -->
<header class="container text-center py-3">
  <div class="d-flex flex-wrap justify-content-center gap-2 mb-2">
    <div class="banner">⚓︎ ¡Peces frescos!</div>
    <div class="banner">⚓︎ Sombreros nuevos</div>
    <div class="banner">⚓︎ Envíos al acuario</div>
  </div>
  <br>
  <h1 class="titulo-sitio">FISH SHOP</h1>
  <marquee class="aviso">★ AVISO MENSUAL: Nuestros peces no emiten ningun olor, porfavor dejen de quejarse o tomaremos acción legal. ★         ★ Los peces payaso SON VENENOSOS, intenten NO tocarlos fisicamente. ★ </marquee>
</header>

<div class="container">
  <div class="row g-3">

    <!-- COLUMNA IZQUIERDA -->
    <aside class="col-12 col-lg-2">
      <div class="caja">
        <h6 class="caja-titulo">Menú</h6>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action" href="index.php">🐟︎ Inicio</a>
          <a class="list-group-item list-group-item-action" href="catalogo.php">🐟︎ Catálogo</a>
          <a class="list-group-item list-group-item-action" href="acuario.php">🐟︎ Acuario</a>
          <a class="list-group-item list-group-item-action" href="carrito.php">🐟︎ Carrito</a>
          <a class="list-group-item list-group-item-action" href="historial.php">🐟︎ Mis compras</a>
        </div>
      </div>

      <div class="caja mt-3">
        <h6 class="caja-titulo">Cuenta</h6>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action" href="login.php">👤 Log In</a>
          <a class="list-group-item list-group-item-action" href="registro.php">🔑 Registro</a>
        </div>
      </div>
    </aside>

    <!-- COLUMNA CENTRAL -->
    <main class="col-12 col-lg-8">