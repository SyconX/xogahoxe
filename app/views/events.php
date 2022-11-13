<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <?= BOOTSTRAP_LINK ?>
        <link rel="stylesheet" href=<?= CSS_PATH . "/events.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/header.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/aside.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
</head>

<body>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/header.php'); ?>
    <main>
        <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
            <input type="submit" value="Cargar eventos">
        </form>
        <form action=<?= VIEWS_PATH . "/createEvent.php" ?> method="post">
            <input type="text" name="newEvent" id="newEvent" value="newEvent" disabled hidden>
            <input type="submit" value="Crear evento">
        </form>
        <? 
        foreach ($events as $event) {
            echo $event;
        }
        ?>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/aside.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>