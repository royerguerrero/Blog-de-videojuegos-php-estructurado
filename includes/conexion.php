<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "blog";

$db = mysqli_connect($server, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciando la sesion para el control de errores
if(!isset($_SESSION)){
    session_start();
}


