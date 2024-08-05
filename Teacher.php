<?php
include_once 'includes/conection.php';
session_start();

if (!isset($_SESSION['cedula']) || !isset($_SESSION['rol'])) {
    header('Location: login.php');
    exit();
}

$cedula = $_SESSION['cedula'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="navbar">
        <h4>Bienvenido al Sistema Maestro</h4>
        <a href="Login.php"><img style="width: 40px; height: 40px; margin-right: 20px;"
                src="img/1564535_customer_user_userphoto_account_person_icon.png" class="card-img-top" alt="..."></a>
    </div>
    <div class="table-responsive-xxl mt-3">
        <?php if ($rol === 'maestro'): ?>
            <table id="tableRequest" class="table table-light table-striped table-hover table-bordered"
                style="margin-left: 20px; cursor: pointer; margin-block: 10px;">
                <thead>
                    <tr>
                        <th class="text-center" id="color-th">Curso</th>
                        <th class="text-center" id="color-th">Estudiante</th>
                    </tr>
                </thead>
                <tbody id="tableRequestBody" class="text-center">
                    <?php
                    $query = "SELECT c.Codigo, c.Nombre
                      FROM asignacion a
                      JOIN cursos c ON a.Codigo_curso = c.Codigo
                      WHERE a.Cedula_persona = ?";

                    $stmt = $conex->prepare($query);
                    $stmt->bind_param('s', $cedula);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $cursos = $result->fetch_all(MYSQLI_ASSOC);

                    foreach ($cursos as $curso) {
                        // Obtener estudiantes que tienen el mismo curso
                        $queryEstudiantes = "SELECT p.Nombre
                                     FROM asignacion a
                                     JOIN personas p ON a.Cedula_persona = p.Cedula
                                     JOIN roles r ON p.IdRole = r.Id
                                     WHERE a.Codigo_curso = ? AND r.Nombre = 'estudiante'";

                        $stmtEstudiantes = $conex->prepare($queryEstudiantes);
                        $stmtEstudiantes->bind_param('s', $curso['Codigo']);
                        $stmtEstudiantes->execute();
                        $resultEstudiantes = $stmtEstudiantes->get_result();
                        $estudiantes = $resultEstudiantes->fetch_all(MYSQLI_ASSOC);

                        foreach ($estudiantes as $estudiante) {
                            echo "<tr>
                            <td>" . htmlspecialchars($curso['Nombre']) . "</td>
                            <td>" . htmlspecialchars($estudiante['Nombre']) . "</td>
                          </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Acceso denegado. Solo los maestros pueden ver esta página.</p>
        <?php endif; ?>

    </div>
</body>

</html>