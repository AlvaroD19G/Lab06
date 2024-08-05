<?php
session_start();
require_once 'includes/conection.php';
require_once 'ViewStudents.php';

if (isset($_SESSION['cedula'])) {
    $cedula = $_SESSION['cedula'];
    $cursos = obtenerCursosAsignados($conex, $cedula);
} else {
    echo "Usuario no autenticado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="navbar">
        <h4>Bienvenido al Sistema Estudiante</h4>
        <a href="Login.php"><img style="width: 40px; height: 40px; margin-right: 20px;"
                src="img/1564535_customer_user_userphoto_account_person_icon.png" class="card-img-top" alt="..."></a>
    </div>
    <div class="table-responsive-xxl mt-3">
        <table class="table table-light table-striped table-hover table-bordered" id="TableAppointment"
            style="margin-left: 20px; cursor: pointer; margin-block: 10px;">
            <thead>
                <tr>
                    <th class="text-center" id="color-th">Código del Curso</th>
                    <th class="text-center" id="color-th">Nombre del Curso</th>
                </tr>
            </thead>
            <tbody id="tableRequestBody" class="text-center">
                <?php if (!empty($cursos)): ?>
                    <?php foreach ($cursos as $curso): ?>
                        <tr>
                            <td><?= htmlspecialchars($curso['codigo']) ?></td>
                            <td><?= htmlspecialchars($curso['nombre']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No se encontraron cursos asignados.</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</body>

</html>