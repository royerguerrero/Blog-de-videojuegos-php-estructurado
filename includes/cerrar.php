<?php

if(!isset($_SESSION)){
    session_start();
}
var_dump($_SESSION['usuario']);

if(isset($_SESSION['usuario'])){
    session_unset($_SESSION['usuario']);
    session_destroy();
}


header('Location: ../index.php');