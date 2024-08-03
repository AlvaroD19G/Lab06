<?php
session_start();
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_persona = $_SESSION['id_persona'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    // Consulta para obtener la contraseña actual del usuario
    $sql = "SELECT password FROM personas WHERE id_persona = ?";
    $stmt = mysqli_prepare($conex, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_persona);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password);
    mysqli_stmt_fetch($stmt);

    if (password_verify($currentPassword, $hashed_password)) {
        // Actualizar la contraseña
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE personas SET password = ? WHERE id_persona = ?";
        $stmtUpdate = mysqli_prepare($conex, $sqlUpdate);
        mysqli_stmt_bind_param($stmtUpdate, "si", $newHashedPassword, $id_persona);
        mysqli_stmt_execute($stmtUpdate);

        // Redirigir al login
        header('Location: login.html');
    } else {
        echo 'La contraseña actual es incorrecta';
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmtUpdate);
    mysqli_close($conex);
}
?>
