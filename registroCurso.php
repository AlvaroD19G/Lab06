<?php
require_once 'includes/conection.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $sql = "INSERT INTO cursos (codigo, nombre) VALUES ('$codigo', '$nombre')";
            $insertar = mysqli_query($conex, $sql);

            if ($insertar) {
                $_SESSION['completado'] = "Registro exitoso";
                header('Location: Admin.php');
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el curso";
            }
        } 
?>