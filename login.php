<?php
//iniciar la sesion y la conexion a la bd
require_once 'includes/conexion.php';

//recojer los datos

if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    //Validacion de credenciales para ingreso
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        $usuario  = mysqli_fetch_assoc($login);
        var_dump($usuario);
        //validar contraseña / cifrar
        $verify = password_verify($password, $usuario['password']);
        if($verify){
            //inicializar una sesion para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;

            if(isset($_SESSION['error_login'])){
                session_unset($_SESSION['error_login']);
            }
        }else{
            //Enviar error con fallo
            $_SESSION['error_login'] = "<div class='alerta alerta-error'>Error al iniciar sesión</div>";
        }
    }else{
        //Enviar error con fallo
        $_SESSION['error_login'] = "<div class='alerta alerta-error'>Error al iniciar sesión</div>";
    }

}

//Redirigir al index

header('Location: index.php');