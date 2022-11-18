<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevo Evento</title>
</head>

<body>
    <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
        <label for="game">Juego</label>
        <input type="text" name="game" id="game">
        <label for="address">Dirección</label>
        <input type="text" name="address" id="address">
        <label for="city">Ciudad</label>
        <input type="text" name="city" id="city">
        <label for="date">Fecha</label>
        <input type="datetime-local" name="date" id="date">
        <label for="min_players">Jugadores minimos</label>
        <input type="number" name="min_players" id="min_players">
        <label for="max_players">Jugadores máximos</label>
        <input type="number" name="max_players" id="max_players">
        <label for="description">Descripción</label>
        <input type="text" name="description" id="description">
        <label for="info">Información</label>
        <input type="text" name="info" id="info">
        <input type="submit" value="Crear evento">
    </form>
</body>

</html>