<?php


function mostraError($errores, $campo){
    $alerta = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>". $errores[$campo] ."</div>";
    }

    return $alerta;
}

function borrarErrores(){
    $_SESSION['errores'] = NULL;
    if(isset($_SESSION['errores']) || $_SESSION['errores'] = NULL){
        //$borrado = session_unset();
    }else{
        $borrado = '';
    }

    return $borrado;
}


function consegirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC ";
    $categorias = mysqli_query($conexion, $sql);

    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }


    return $resultado;
}

function consegirUltimasEntradas($conexion){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id ORDER BY e.id DESC LIMIT 4";
    $entradas = mysqli_query($conexion, $sql);

    $resultado =  array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $resultado;
}
