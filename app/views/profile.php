<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <?= BOOTSTRAP_LINK ?>
        <link rel="stylesheet" href=<?= CSS_PATH . "/profile.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/header.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
</head>

<body>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/nav.php'); ?>
    <main>

        <div class="user-data">
            <form action=<?= CONTROLLERS_PATH . "/" ?> method="post">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" value="<?= $_SESSION['userLogin']->mail ?>" required>
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" id="username" value="<?= $_SESSION['userLogin']->username ?>"
                    required>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="<?= $_SESSION['userLogin']->password ?>"
                    required>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="<?= $_SESSION['userLogin']->name ?>" required>
                <label for="last_name">Apellidos</label>
                <input type="text" name="last_name" id="last_name" value="<?= $_SESSION['userLogin']->last_name ?>"
                    required>
                <label for="age">Edad</label>
                <input type="number" name="age" id="age" value="<?= $_SESSION['userLogin']->age ?>">
                <label for="city">Ciudad</label>
                <input type="text" name="city" id="city" value="<?= $_SESSION['userLogin']->city ?>">
                <label for="phone">Teléfono</label>
                <input type="number" name="phone" id="phone" value="<?= $_SESSION['userLogin']->phone ?>">
                <input type="submit" class="btn btn-outline-dark" value="Modificar">
            </form>
            <form action="<?= CONTROLLERS_PATH . "/Login.php" ?>" method="post">
                <input type="hidden" name="logout" value="logout">
                <input type="submit" class="btn btn-outline-danger" value="Cerrar sesión">
            </form>
        </div>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>