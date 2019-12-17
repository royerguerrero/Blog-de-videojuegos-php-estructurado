<?php

if(isset($_POST)){

    include_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) :  false;

    //Manejo de errores
    $errores = array();

    //validar los datos
    if(!empty($nombre)){
        $nombre_validado = true;
    }else{
        $nombre_false = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $categoria = mysqli_query($db, $sql);
    }

}

header('Location: index.php');