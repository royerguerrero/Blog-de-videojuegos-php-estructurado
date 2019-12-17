<?php require_once 'includes/cabecera.php' ?>

    <?php require_once 'includes/sidebar.php'; ?>
    <!-- MAIN -->
        <div id="princiapl">
            <h2>Ultimas Entradas</h2>
            <?php
            $entradas = consegirUltimasEntradas($db);
            if(!empty($entradas)):
            while ($entrada = mysqli_fetch_assoc($entradas)):
            ?>
            <article class="entrada">
                <a href="">
                    <h3><?= $entrada['titulo'] ?></h3>
                    <span class="metadata"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                    <p><?= substr($entrada['descripcion'],0, 200) . "..."?></p>
                </a>
            </article>
            <?php  endwhile; ?>
            <a href="" class="btn">Ver todas las entradas</a>
            <?php endif; ?>
        </div>
    <!-- END MAIN -->

<?php require_once 'includes/pie.php' ?>

