<?php
require_once 'includes/conection.php';
require_once 'asignar.php';

$personas = getPersonas($conex);
$cursos = getCursos($conex);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Principal</title>
  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="navbar">
    <h4>Bienvenido al Sistema Administrador</h4>
    <a href="Login.php"><img style="width: 40px; height: 40px; margin-right: 20px;"
        src="img/1564535_customer_user_userphoto_account_person_icon.png" class="card-img-top" alt="..."></a>
  </div>
  <div class="card-group">
    <div class="card">
      <img style="width: 70px; height: 70px; " src="img/172626_user_male_icon.png" class="card-img-top"
        alt="...">
      <div class="card-body">
        <h5 class="card-title">Agregar Usuarios</h5>
        <button data-bs-toggle="modal" data-bs-target="#registroUser" class="btn btn-primary">Crear</button>
      </div>
    </div>
    <div class="card">
      <img style="width: 70px; height: 70px; "
        src="img/6599571_achievement_complete_completion_course_e-learning_icon.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Agregar Cursos</h5>
        <button data-bs-toggle="modal" data-bs-target="#addCourseModal" class="btn btn-primary">Crear</button>
      </div>
    </div>
    <div class="card">
      <img style="width: 70px; height: 70px;" src="img/ima.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Asignar Cursos</h5>
        <button data-bs-toggle="modal" data-bs-target="#assignCourseModal" class="btn btn-primary">Asignar</button>
      </div>
    </div>
  </div>
  </div>

  <!-- Modal -->
  <div id="registroUser" class="modal fade" tabindex="-1" aria-labelledby="registroUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registroUserLabel">Registrar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="inserts.php" method="POST" id="userForm">
            <div class="mb-3">
              <label for="cedula" class="form-label">Cédula</label>
              <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
              <label for="contrasena" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <div class="mb-3">
              <label for="idRole" class="form-label">Rol</label>
              <select class="form-select" id="idRole" name="idRole" required>
                <option value="" disabled selected>Seleccionar rol</option>
                <option value="2">Maestro</option>
                <option value="3">Estudiante</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para Agregar Cursos -->
  <div id="addCourseModal" class="modal fade" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCourseLabel">Agregar Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="registroCurso.php" method="POST" id="cursoForm">
            <div class="mb-3">
              <label for="courseCode" class="form-label">Código del Curso</label>
              <input type="text" class="form-control" id="courseCode" name="codigo" required>
            </div>
            <div class="mb-3">
              <label for="courseName" class="form-label">Nombre del Curso</label>
              <input type="text" class="form-control" id="courseName" name="nombre" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="assignCourseModal" class="modal fade" tabindex="-1" aria-labelledby="assignCourseLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignCourseLabel">Asignar Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="asignar.php" method="POST" id="assignCourseForm">
            <div class="mb-3">
              <label for="persona" class="form-label">Persona</label>
              <select class="form-select" id="persona" name="persona" required>
                <option value="" disabled selected>Seleccionar persona</option>
                <?php foreach ($personas as $persona): ?>
                  <option value="<?= htmlspecialchars($persona['cedula']) ?>">
                    <?= htmlspecialchars($persona['cedula']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="curso" class="form-label">Curso</label>
              <select class="form-select" id="curso" name="curso" required>
                <option value="" disabled selected>Seleccionar curso</option>
                <?php foreach ($cursos as $curso): ?>
                  <option value="<?= htmlspecialchars($curso['codigo']) ?>">
                    <?= htmlspecialchars($curso['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>