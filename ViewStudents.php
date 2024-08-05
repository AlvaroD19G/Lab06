<?php
// functions.php
function obtenerCursosAsignados($conex, $cedula) {
    $query = "SELECT c.codigo, c.nombre 
              FROM asignacion a 
              JOIN cursos c ON a.Codigo_Curso = c.codigo 
              WHERE a.Cedula_Persona = ?";
    $var = $conex->prepare($query);
    $var->bind_param("s", $cedula);
    $var->execute();
    $result = $var->get_result();

    $cursos = [];
    while ($row = $result->fetch_assoc()) {
        $cursos[] = $row;
    }

    $var->close();
    return $cursos;
}
?>