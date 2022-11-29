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
        <link rel="stylesheet" href=<?= CSS_PATH . "/asideEvent.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
</head>

<body>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/header.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/asideEvent.php'); ?>
    <main id="pageStart">
        <?php if (isset($_SESSION['userLogin'])) { ?>
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newEventModal">
            Nueva partida
        </button>

        <!-- The Modal -->
        <div class="modal fade" id="newEventModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Crear una nueva partida</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" name="newEvent" value="newEvent">
                            <label for="game">Nombre del Juego</label>
                            <input type="text" name="game" id="game" required>
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" required>
                            <label for="city">Ciudad</label>
                            <input type="text" name="city" id="city" required>
                            <label for="date">Fecha</label>
                            <input type="datetime-local" name="date" id="date" required>
                            <label for="max_players">Jugadores máximos</label>
                            <input type="number" name="max_players" id="max_players" required>
                            <label for="description">Descripción</label>
                            <input type="text" name="description" id="description">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Crear">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

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