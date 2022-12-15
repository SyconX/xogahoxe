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
        <link rel="stylesheet" href=<?= CSS_PATH . "/userModal.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= SCRIPTS_PATH . "/asideArrow.js" ?>"></script>
        <script type="text/javascript" src="<?= SCRIPTS_PATH . "/events.js" ?>"></script>
        <?php if ($openModal) {
            echo $openModal;
        } ?>
</head>

<body>
    <a name="top"></a>
    <header class="cont-header flex">
        <form action=<?= CONTROLLERS_PATH . "/Finder.php" ?> method="post" class="finder flex">
            <input type="hidden" name="eventFinder">
            <input type="text" name="search" id="search" placeholder="Buscar por nombre o ciudad">
        </form>
        <?php include_once(BASE_PATH . VIEWS_PATH . '/components/nav.php'); ?>
    </header>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/asideArrow.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/userModal.php'); ?>

    <!-- New event Modal -->
    <div class="modal fade" id="newEventModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        <?= $_POST['readEvent'] ? 'Modificar el evento' : 'Crear un nuevo evento' ?>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <label for="game">Nombre del Juego</label>
                        <input type="text" name="game" id="game" value="<?= $eventReadData->game ?? '' ?>" required>
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" value="<?= $eventReadData->address ?? '' ?>"
                            required>
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" id="city" value="<?= $eventReadData->city ?? '' ?>" required>
                        <label for="date">Fecha</label>
                        <input type="datetime-local" name="date" id="date" min="2023-01-01T00:00:00"
                            max="2030-01-01T00:00:00" value="<?= $eventReadData->date ?? '' ?>" required>
                        <label for="max_players">Jugadores máximos</label>
                        <input type="number" name="max_players" id="max_players" min="1" max="20"
                            value="<?= $eventReadData->max_players ?? '' ?>" required>
                        <label for="description">Descripción</label>
                        <input type="text" name="description" id="description"
                            value="<?= $eventReadData->description ?? '' ?>">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <?php if (isset($eventReadData)) { ?>
                        <input type="hidden" name="eventID" value="<?= $eventReadData->id ?>">
                        <input type="hidden" name="editEvent" value="editEvent">
                        <input type="submit" class="btn btn-outline-dark" value="Modificar">
                        <?php } else { ?>
                        <input type="hidden" name="newEvent" value="newEvent">
                        <input type="submit" class="btn btn-outline-dark" value="Crear">
                        <?php } ?>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <main>
        <?php if (isset($_SESSION['userLogin'])) { ?>
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newEventModal">
            Nueva partida
        </button>
        <?php }
        if ($eventResponse === false) { ?>
        <p class="notFound">No se han encontrado eventos</p>
        <?php } else { ?>
        <div class="grid-container">
            <?php foreach ($eventResponse as $e) {
                include(BASE_PATH . VIEWS_PATH . "/components/event.php");
            }
        }
            ?>
        </div>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/aside.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>