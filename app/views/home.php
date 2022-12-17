<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?= BOOTSTRAP_LINK ?>
        <link rel="stylesheet" href=<?= CSS_PATH . "/home.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
</head>

<body>

    <div class="parallax first">
        <div class="mainTitle">
            <a href="/eventos">
                <span>xoga hoxe</span>
            </a>
        </div>
        <a href="#footer">
            <i class="fa fa-arrow-down" aria-hidden="true"></i>
        </a>
    </div>
    <div class="text">
        <h4> 
        Planea tus partidas, organiza eventos y aprovisiónate de los mejores juegos
        </h4>
        <h4> 
        ¡Xoga Hoxe!
        </h4>
        
    </div>
    <div class="parallax second"></div>
    <div class="text">
        <h4> ¿Te faltan jugadores para estrenar tu ejemplar de la Herencia de Tia Agata?
        </h4>
        <h4> ¿Tienes claro tu juego pero no encuentras gente?
        </h4>
        <h4> ¿Tus amigos son más de playa?
        </h4>
        <h4> Haz planes, juega y conoce gente en Xoga Hoxe, tu comunidad de juegos.
        </h4>
    </div>
    <div class="parallax third"></div>
    <div class="text">
        <h4> Soy jugador asiduo de juegos de mesa de todos los estilos, colores y sabores, con amigos y familia. Desde que soy pequeño he jugado a una gran variedad de juegos.
        </h4>
        <h4> Mi ilusión es que disfrutes de este proyecto tanto como yo he disfrutado de todas esas partidas al Risk, Monopoly, ajedrez, oca y parchís.
        </h4>
        <h4> (Obviamos los juegos de cartas, a los que siempre me ganaba mi madre)
        </h4>
    </div>
    <?php if (!isset($_SESSION['userLogin'])) { ?>
    <div class="container" id="formLogin">
        <p class='loginMsg<?= $_SESSION['loginMsg']['class'] ?? "" ?>'>
            <?= $_SESSION['loginMsg']['msg'] ?? "" ?>
        </p>
        <form action=<?= CONTROLLERS_PATH . "/Login.php" ?> method="post">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <input type="submit" class="btn btn-outline-dark" value="Regístrate o inicia sesión">
        </form>
        <?php } ?>
    </div>

    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>
<?php $_SESSION['loginMsg'] = "" ?>