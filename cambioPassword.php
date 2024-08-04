<?php
session_start();
require_once 'includes/conection.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirige si no está logueado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $cedula = $_SESSION['user'];

    // Encriptar la nueva contraseña
    $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);

    // Actualizar la contraseña
    $query = "UPDATE personas SET contrasena = ? WHERE cedula = ?";
    $stmt = $conex->prepare($query);
    $stmt->bind_param("ss", $new_password_hashed, $cedula);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Contraseña cambiada exitosamente.');</script>";
        // Redirigir según el rol del usuario
        if ($_SESSION['role'] == 'administrador') {
            header('Location: Admin.php');
        } elseif ($_SESSION['role'] == 'maestro') {
            header('Location: TeachersView.php');
        } elseif ($_SESSION['role'] == 'estudiante') {
            header('Location: StudentsView.php');
        }
    } else {
        echo "<script type='text/javascript'>alert('Error al cambiar la contraseña.');</script>";
    }
}
?>

<form action="cambioPassword.php" method="POST">
    <input type="password" name="new_password" placeholder="Nueva Contraseña" required>
    <button type="submit">Cambiar Contraseña</button>
</form>