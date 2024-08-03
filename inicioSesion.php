<?php
session_start();
require_once 'includes/conection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cedula = $_POST['cedula'];
    $password = $_POST['password'];
    $query = "SELECT * FROM personas WHERE cedula = ? AND contrasena = ? AND idRole = (SELECT Id FROM roles WHERE nombre = 'administrador')";
    $stmt = $conex->prepare($query);
    $stmt->bind_param("ss", $cedula, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $cedula;
        header('Location: Admin.php');
        echo "<script type='text/javascript'>alert('Inicio de sesión exitoso');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Credenciales incorrectas o no es administrador.');</script>";
    }
}
?>