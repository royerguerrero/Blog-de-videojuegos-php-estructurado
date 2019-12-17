<?php

if(isset($_POST)){

    if(!isset($_SESSION)){
        session_start();
    }
    require_once 'includes/conexion.php';

   $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
   $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
   $email = isset($_POST['email']) ? mysqli_real_escape_string(trim($db, $_POST['email'])) : false;
   $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

   //Manejo de errores
    $errores = array();

   //validar los datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_false = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    if(!empty($apellidos) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña esta vacia";
    }

}

    $guardar_usuario = false;
    if(count($errores) === 0){
        $guardar_usuario = true;

        //cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        //var_dump($password_segura);
        //insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURRENT_DATE())";
        $registro = mysqli_query($db, $sql);

        if($registro){
            $_SESSION['completado'] = "<div class='alerta alerta-ok'>El registro ha sido exitoso!</div>";
        }else{
            $_SESSION['errores']["general"] = "<div class='alerta alerta-error'>Fallo al registrar el usuario</div>" . mysqli_error($db);
        }

    }else{
        $_SESSION['errores'] = $errores;
        var_dump($_SESSION['errores']);
    }

header('Location: index.php');


