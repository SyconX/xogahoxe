<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
?>
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
        <?php if (isset($_SESSION['userLogin'])) { ?>
        <form action=<?= VIEWS_PATH . "/components/newEvent.php" ?> method="post">
            <input type="submit" class="btn btn-dark" value="Crear evento">
        </form>
        <?php
        }
        foreach ($eventResponse as $e) {
            include(BASE_PATH . VIEWS_PATH . "/components/event.php");
        }
        ?>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/aside.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>