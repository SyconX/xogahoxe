<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link rel="stylesheet" href=<?= CSS_PATH . "/newUser.css" ?>>
    <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
    <?= BOOTSTRAP_LINK ?>
</head>

<body>
    <div class="parallax">
        <a class="returnTo" href="/inicio"><i class="fa-solid fa-arrow-left"></i>
            Volver a Inicio</a>
        <h1 class="mainTitle">Regístrate</h1>
        <form action=<?= CONTROLLERS_PATH . "/Login.php" ?> method="post">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" required>
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required>
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" id="last_name" required>
            <input type="hidden" name="newUser" value="newUser">
            <input type="submit" class="btn btn-outline-light" value="Regístrate">
        </form>
    </div>
</body>

</html>