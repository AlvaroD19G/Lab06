<?php
$servidor = "localhost";
$usuario = "root";
$pass = "";
$bd = "Matricula";
$conex = mysqli_connect($servidor, $usuario, $pass, $bd);
mysqli_query($conex, "SET NAMES 'UTF8'");
if ($conex) {
}else{
    echo 'conexion fallida';
}

?>