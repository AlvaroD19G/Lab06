<?php
require_once 'includes/conection.php'; // Verifica la ruta
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : false;
    $idRole = isset($_POST['idRole']) ? $_POST['idRole'] : false;


    if (!empty($cedula) && !empty($nombre) && !empty($telefono) && !empty($contrasena) && !empty($idRole)) {
        if ($idRole == 2 || $idRole == 3) {
            $pass_encrip = password_hash($contrasena, PASSWORD_BCRYPT);
            $sql = "INSERT INTO personas (cedula, nombre, telefono, contrasena, idRole) VALUES ('$cedula', '$nombre', '$telefono', '$pass_encrip', '$idRole')";
            $insertar = mysqli_query($conex, $sql);

            if ($insertar) {
                $_SESSION['completado'] = "Registro exitoso";
                header('Location: Admin.php');
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
            }
        } else {
            $_SESSION['errores']['general'] = "Rol inválido. Por favor, seleccione un rol válido.";
        }
    } else {
        $_SESSION['errores']['general'] = "Faltan datos obligatorios.";
    }
}
?>