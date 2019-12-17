<?php
include_once 'includes/redireccion.php';
include_once 'includes/cabecera.php';
include_once 'includes/sidebar.php';
?>
<div id="princiapl">
    <h2>Crear Nueva Categoria</h2>
    <p>Añade nuevas categorias al blog para que otros usuario puedan usar al crear sus entradas.</p>
    <?php echo isset($_SESSION['errores']) ? mostraError($_SESSION['errores'], 'nombre'): '' ; ?>
    <form action="guardar-categoria.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="ejemplo: RPG">
        <input type="submit" value="Crear" name="submit" class="btn btn-green">
    </form>
</div>

<?php require_once 'includes/pie.php' ?>
