<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Login.css">

    <title>Document</title>
</head>

<body>
    <div class="Container">
        <form action="inicioSesion.php" method="POST" class="form">
            <div class="title">SCHOOL SYSTEM<br></div>
            <img style="width: 50px; height:50px;" src="img/5258525_blackboard_classroom_study_teacher_writing_icon.png"
                alt="">
            <input id="cedula" class="input" name="cedula" placeholder="Usuario" type="text">
            <input id="password" class="input" name="password" placeholder="Password" type="password">
            <button class="button-confirm">iniciar</button>
            
        </form>

    </div>
</body>
</html>