<?php

session_start();
include_once 'includes/conection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];

    $sql = "SELECT p.Cedula, p.Contrasena, r.Nombre as Rol
            FROM personas p
            JOIN roles r ON p.IdRole = r.Id
            WHERE p.Cedula = ?";

    if ($stmt = $conex->prepare($sql)) {
        $stmt->bind_param("s", $cedula);
        $stmt->execute();
        $stmt->bind_result($dbCedula, $dbPassword, $dbRol);
        $stmt->fetch();
        $stmt->close();


        if ($dbCedula && password_verify($password, $dbPassword)) {
            $_SESSION['cedula'] = $dbCedula;
            $_SESSION['rol'] = $dbRol;
            if ($dbRol == 'administrador') {
                header('Location: Admin.php');
            } elseif ($dbRol == 'maestro') {
                header('Location: Teacher.php');
            } elseif ($dbRol == 'estudiante') {
                header('Location: Students.php');
            } else {
                echo "Rol no reconocido.";
            }
        } else {
            echo "Credenciales incorrectas.";
        }
    } else {
        echo "Error en la consulta: " . $conex->error;
    }
    $conex->close();
} else {
    echo "Método de solicitud no permitido.";
}
