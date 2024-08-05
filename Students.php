<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="navbar">
        <h4>Bienvenido al Sistema Estudiante</h4>
        <a href="Login.php"><img style="width: 40px; height: 40px; margin-right: 20px;"
                src="img/1564535_customer_user_userphoto_account_person_icon.png" class="card-img-top" alt="..."></a>
    </div>
    <div class="table-responsive-xxl mt-3">
        <table id="tableRequest" class="table table-light table-striped table-hover table-bordered"
            id="TableAppointment" style="margin-left: 20px; cursor: pointer; margin-block: 10px;">
            <thead>
                <tr>
                    <th class="text-center" id="color-th">ID</th>
                    <th class="text-center" id="color-th">Cursos</th>
                </tr>
            </thead>
            <tbody id="tableRequestBody" class="text-center">
                <th>-----</th>
                <th>-----</th>
            </tbody>
        </table>
    </div>
</body>

</html>