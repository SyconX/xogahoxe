<!DOCTYPE html>
<html lang="en">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevo Producto</title>
</head>

<body>
    <form action=<?= CONTROLLERS_PATH . "/Shop.php" ?> method="post">
        <label for="productName">Juego</label>
        <input type="text" name="productName" id="productName">
        <label for="price">Precio</label>
        <input type="number" step="0.01" name="price" id="price">
        <label for="status">Estado del producto</label>
        <input type="text" name="status" id="status">
        <label for="delivery">Método entrega</label>
        <input type="text" name="delivery" id="delivery">
        <label for="address">Dirección</label>
        <input type="text" name="address" id="address">
        <label for="city">Ciudad</label>
        <input type="text" name="city" id="city">
        <label for="description">Descripción</label>
        <input type="text" name="description" id="description">
        <input type="submit" value="Añadir producto">
        <input type="reset">
    </form>
</body>

</html>