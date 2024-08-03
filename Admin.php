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
    <h4>Bienvenido al Sistema</h4>
  </div>
  <div class="card-group">
    <div class="card">
      <img style="width: 70px; height: 70px; " src="img/8541740_chalkboard_teacher_icon.png" class="card-img-top"
        alt="...">
      <div class="card-body">
        <h5 class="card-title">Agregar Profesores</h5>
        <button data-bs-toggle="modal" data-bs-target="#registroUser" class="btn btn-primary">Crear</button>
      </div>
    </div>
    <div class="card">
      <img style="width: 70px; height: 70px; "
        src="img/6599571_achievement_complete_completion_course_e-learning_icon.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Agregar Cursos</h5>
        <button data-bs-toggle="modal" data-bs-target="#registroUser" class="btn btn-primary">Crear</button>
      </div>
    </div>
    <div class="card">
      <img style="width: 70px; height: 70px;" src="img/9023992_student_fill_icon.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Agregar Estudiantes</h5>
        <button data-bs-toggle="modal" data-bs-target="#registroUser" class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="registroUser" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="saveUser" class="btn btn-primary" title="Guardar"><i class="bi bi-save"></i>
            Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>