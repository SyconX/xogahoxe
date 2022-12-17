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
        <h5> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet libero sit amet odio convallis
            dictum a vel sem. Fusce tempus metus orci, id accumsan arcu pharetra nec. Morbi et orci felis. Quisque
            dignissim dui sapien, eu scelerisque est convallis nec. Sed facilisis pellentesque dignissim.
            Pellentesque
            lacus augue, faucibus eget ante eu, hendrerit ullamcorper ex. Nullam et iaculis nisi, sed condimentum
            dolor.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In a metus
            lacinia, maximus nibh ac, tincidunt sapien. Curabitur sodales purus dolor, id fringilla dui feugiat a.
        </h5>
    </div>
    <div class="parallax second"></div>
    <div class="text">
        <h5> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet libero sit amet odio convallis
            dictum a vel sem. Fusce tempus metus orci, id accumsan arcu pharetra nec. Morbi et orci felis. Quisque
            dignissim dui sapien, eu scelerisque est convallis nec. Sed facilisis pellentesque dignissim.
            Pellentesque
            lacus augue, faucibus eget ante eu, hendrerit ullamcorper ex. Nullam et iaculis nisi, sed condimentum
            dolor.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In a metus
            lacinia, maximus nibh ac, tincidunt sapien. Curabitur sodales purus dolor, id fringilla dui feugiat a.
        </h5>
    </div>
    <div class="parallax third"></div>
    <div class="text">
        <h5> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet libero sit amet odio convallis
            dictum a vel sem. Fusce tempus metus orci, id accumsan arcu pharetra nec. Morbi et orci felis. Quisque
            dignissim dui sapien, eu scelerisque est convallis nec. Sed facilisis pellentesque dignissim.
            Pellentesque
            lacus augue, faucibus eget ante eu, hendrerit ullamcorper ex. Nullam et iaculis nisi, sed condimentum
            dolor.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In a metus
            lacinia, maximus nibh ac, tincidunt sapien. Curabitur sodales purus dolor, id fringilla dui feugiat a.
        </h5>
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