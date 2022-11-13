<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/app/config/config.php';

if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href=<?= CSS_PATH."home.css" ?>>
</head>
<body>
    <picture>
        <img src=<?= IMAGES_PATH . "home-background.jpg" ?> alt="Imagen de fondo">
    </picture>
    <div class="container">
            
        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet libero sit amet odio convallis dictum a vel sem. Fusce tempus metus orci, id accumsan arcu pharetra nec. Morbi et orci felis. Quisque dignissim dui sapien, eu scelerisque est convallis nec. Sed facilisis pellentesque dignissim. Pellentesque lacus augue, faucibus eget ante eu, hendrerit ullamcorper ex. Nullam et iaculis nisi, sed condimentum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In a metus lacinia, maximus nibh ac, tincidunt sapien. Curabitur sodales purus dolor, id fringilla dui feugiat a. Sed semper et nisl id varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur at nisi ante. Fusce vel dapibus sem, id mollis massa. Etiam at justo vitae augue efficitur cursus vitae aliquam purus. Duis aliquet nibh leo, ut condimentum metus luctus quis.
        In scelerisque ante enim, a accumsan nunc faucibus nec. Vivamus sed risus non erat venenatis sodales. Nam tempus convallis suscipit. Cras euismod est a luctus iaculis. Quisque felis metus, eleifend in posuere vel, mattis sollicitudin lectus. Sed ut mi euismod, sagittis ante commodo, imperdiet ipsum. Nulla quis egestas mauris. Phasellus cursus, enim molestie viverra malesuada, lorem diam tempus nibh, eu euismod ante magna et ligula. Duis sit amet consequat ligula, et gravida tortor. </h3>
        
        <form action=<?= CONTROLLERS_PATH . "homeController.php" ?> method="post">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Regístrate o inicia sesión">
        </form>
    </div>    
</body>
</html>