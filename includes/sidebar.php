    <!-- SIDEBAR -->

    <aside id="sidebar">
        <?php if(isset($_SESSION['usuario'])): ?>
            <div class="bloque panel-control">
                <h3>Hola <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] ?></h3><br>
                <!-- Botones -->
                <a href="includes/cerrar.php" class="btn btn-green">Crear Entrada</a>
                <a href="crear-categoria.php" class="btn">Crear Categoria</a>
                <a href="includes/cerrar.php" class="btn btn-yellow">Mis Datos</a>
                <a href="includes/cerrar.php" class="btn btn-red">Cerrar session</a>
            </div>
        <?php  else: ?>
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <?php echo isset($_SESSION['error_login']) && $_SESSION['usuario'] == null ? $_SESSION['error_login'] : ''; ?>
            <form action="login.php" method="post">
            <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Enviar" name="submit" class="btn">
            </form>
        </div>
        <div id="register" class="bloque">
            <h3>Registrate</h3>
            <?php echo isset($_SESSION['completado']) ? $_SESSION['completado'] : '';
              echo isset($_SESSION['errores']['general']) ? $_SESSION['errores']['general'] : ''?>
            <form action="registro.php" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <?php echo isset($_SESSION['errores']) ? mostraError($_SESSION['errores'], 'nombre'): '' ; ?>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos">
                <?php echo isset($_SESSION['errores']) ? mostraError($_SESSION['errores'], 'apellidos'): '' ; ?>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <?php echo isset($_SESSION['errores']) ? mostraError($_SESSION['errores'], 'email'): '' ; ?>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <?php echo isset($_SESSION['errores']) ? mostraError($_SESSION['errores'], 'password'): '' ; ?>
                <input type="submit" value="Enviar" name="submit" class="btn">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <?php endif; ?>
    </aside>
