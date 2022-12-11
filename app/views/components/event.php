<div class="event" id="<?= $e->id ?>">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 card-img-top">
                <img src=<?= IMAGES_PATH . "/background3.jpg" ?>
                class="" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-title first-card">
                        <h3 class="title">
                            <?= $e->game ?>
                        </h3>
                        <p class="address">
                            <?= $e->address ?>
                        </p>
                    </div>
                    <div class="card-title second-card">
                        <h4 class="date">
                            <?php
                            echo date_format(date_create($e->date), "H:i");
                            echo
                                " | ";
                            echo date_format(date_create($e->date), "d
                            M"); ?>
                        </h4>
                        <h4 class="city">
                            <?= $e->city ?>
                        </h4>
                    </div>
                    <div class="card-text third-card">
                        <p class="description">
                            <?= $e->description ?>
                        </p>
                    </div>
                    <p class="card-text players">
                        <?= count(unserialize($e->players)) . "/" . $e->max_players ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($_SESSION['userLogin']->username == $e->owner) { ?>
    <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
        <input type="hidden" name="eventID" value="<?= $e->id ?>">
        <input type="hidden" name="readEvent" value="readEvent">
        <input class="btn btn-warning btn-sm" type="submit" value="Modificar" />
    </form>
    <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
        <input type="hidden" name="eventID" value="<?= $e->id ?>">
        <input type="hidden" name="deleteEvent" value="deleteEvent">
        <input class="btn btn-danger btn-sm" type="submit" value="Eliminar" />
    </form>
    <?php } else if (isset($_SESSION['userLogin'])) {
        if (in_array($_SESSION['userLogin']->username, unserialize($e->players))) {
            $_SESSION['playersEvent']['' . $e->id . ''] = unserialize($e->players) ?>
    <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
        <input type="hidden" name="eventID" value="<?= $e->id ?>">
        <input type="hidden" name="leaveEvent" value="leaveEvent">
        <input class="btn btn-outline-dark btn-sm" type="submit" value="Salir" />
    </form>
    <?php } else if (count(unserialize($e->players)) < $e->max_players) {
            $_SESSION['playersEvent']['' . $e->id . ''] = unserialize($e->players) ?>
    <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
        <input type="hidden" name="eventID" value="<?= $e->id ?>">
        <input type="hidden" name="joinEvent" value="joinEvent">
        <input class="btn btn-dark btn-sm" type="submit" value="Unirse" />
    </form>
    <?php } ?>
    <?php } ?>
</div>