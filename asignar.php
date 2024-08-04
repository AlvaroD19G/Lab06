<?php
require_once 'includes/conection.php'; 

function getPersonas($conex) {
    $query_personas = "SELECT cedula FROM personas";
    $result_personas = mysqli_query($conex, $query_personas);

    if (!$result_personas) {
        die("Error al ejecutar la consulta: " . mysqli_error($conex));
    }

    $personas = [];
    while ($row = mysqli_fetch_assoc($result_personas)) {
        $personas[] = $row;
    }
    
    return $personas;
}

function getCursos($conex) {
    $query_cursos = "SELECT codigo, nombre FROM cursos";
    $result_cursos = mysqli_query($conex, $query_cursos);

    if (!$result_cursos) {
        die("Error al ejecutar la consulta: " . mysqli_error($conex));
    }

    $cursos = [];
    while ($row = mysqli_fetch_assoc($result_cursos)) {
        $cursos[] = $row;
    }
    
    return $cursos;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula_persona = isset($_POST['persona']) ? $_POST['persona'] : false;
    $codigo_curso = isset($_POST['curso']) ? $_POST['curso'] : false;

    if (!empty($cedula_persona) && !empty($codigo_curso)) {
        $sql_asignacion = "INSERT INTO asignacion (Cedula_Persona, Codigo_Curso) VALUES ('$cedula_persona', '$codigo_curso')";
        $insertar_asignacion = mysqli_query($conex, $sql_asignacion);

        if ($insertar_asignacion) {
            $_SESSION['completado'] = "Curso asignado exitosamente";
            header('Location: Admin.php');
        } else {
            $_SESSION['errores']['general'] = "Fallo al asignar el curso";
        }
    } else {
        $_SESSION['errores']['general'] = "Faltan datos obligatorios.";
    }
}
?>
