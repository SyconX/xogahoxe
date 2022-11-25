<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

if ($_POST['newEvent']) {
    $eventCreate = new Create();
    $data = array(
        $_POST['game'],
        $_POST['address'],
        $_POST['city'],
        $_POST['date'],
        $_POST['max_players'],
        $_POST['description'],
        $_POST['info'],
        serialize(array($_SESSION['userLogin']->username)),
        // Tanto para jugadores como owner, recoger
        $_SESSION['userLogin']->username, // el usuario logueado en ese momento

    );
    $events = $eventCreate->query(EVENT_TABLE, EVENT_TABLE_COLS, $data);
} else if ($_POST['editEvent']) {

} else if ($_POST['deleteEvent']) {
    $eventDelete = new Delete();
    $eventDelete->query(EVENT_TABLE, $_POST['eventID']);
} else if ($_POST['joinEvent']) {

}

$eventRead = new Read();
// Consulta usuario BD
$eventResponse = $eventRead->response(
    $eventRead->queryAll(EVENT_TABLE)
);

include_once BASE_PATH . VIEWS_PATH . '/events.php';

/** Generar datos y cargar vista. En la vista se usan los datos.
 * Se pueden encadenar. En este caso se llama a eventos
 * que a su ver llama a tienda, que es la vista que usa el array.
 * 
 * $user = array ('username' => $_POST['username'], 'lastname' => 'fraga');
 * include_once BASE_PATH . VIEWS_PATH . '/events.php';
 */