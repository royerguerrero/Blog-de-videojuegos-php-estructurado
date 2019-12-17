<?php
require_once 'conexion.php';
require_once 'helpers.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- HEADER -->
<header id="cabecera">
    <div id="logo">
        <a href="index.php">
            <h1>Blog de Videojuegos</h1>
        </a>
    </div>
</header>
<!-- NAV -->
<nav id="menu">
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <?php
        $categorias = consegirCategorias($db);
        if(!empty($categorias)):
            while($categoria = mysqli_fetch_assoc($categorias)):
        ?>
                <li><a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a></li>
        <?php
            endwhile;
        endif;
        ?>
        <li><a href="#">Sobre mi</a></li>
        <li><a href="#">Contacto</a></li>
    </ul>
</nav>

<div id="contenedor">