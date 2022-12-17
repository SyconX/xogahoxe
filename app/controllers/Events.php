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
        // Tanto para jugadores como owner, recoger
        // el usuario logueado en ese momento
        serialize(array($_SESSION['userLogin']->username)),
            $_SESSION['userLogin']->username,
    );
    $events = $eventCreate->query(EVENT_TABLE, EVENT_TABLE_COLS, $data);

} else if ($_POST['readEvent']) {
    $eventRead = new Read();
    $eventReadData = $eventRead->response($eventRead->queryAllWhere(EVENT_TABLE, 'id', '=', $_POST['eventID']));
    $eventReadData = $eventReadData[0];
    $openModal = "<script>
        $(() => {
            $('#newEventModal').modal('show');
         });
    </script>";
} else if ($_POST['editEvent']) {
    $data = array(
        $_POST['game'],
        $_POST['address'],
        $_POST['city'],
        $_POST['date'],
        $_POST['max_players'],
        $_POST['description'],
    );
    $cols = EVENT_TABLE_COLS;
    $colsTable = array_splice($cols, 0, 6);
    $eventEdit = new Update();
    $response = $eventEdit->query(EVENT_TABLE, $colsTable, $data, 'id', '=', $_POST['eventID']);
} else if ($_POST['deleteEvent']) {
    $eventDelete = new Delete();
    $eventDelete->query(EVENT_TABLE, $_POST['eventID']);
} else if ($_POST['joinEvent']) {
    $eventJoin = new Update();
    if (array_search($_SESSION['userLogin']->username, $_SESSION['playersEvent']['' . $_POST['eventID'] . '']) === false) {
        array_push($_SESSION['playersEvent']['' . $_POST['eventID'] . ''], $_SESSION['userLogin']->username);
        $response = $eventJoin->userJoinEvent(serialize($_SESSION['playersEvent']['' . $_POST['eventID'] . '']), $_POST['eventID']);
    }
    $_SESSION['playersEvent']['' . $_POST['eventID'] . ''] = "";
} else if ($_POST['leaveEvent']) {
    $eventLeave = new Update();
    $position = array_search($_SESSION['userLogin']->username, $_SESSION['playersEvent']['' . $_POST['eventID'] . '']);
    unset($_SESSION['playersEvent']['' . $_POST['eventID'] . ''][$position]);
    $response = $eventLeave->userJoinEvent(serialize($_SESSION['playersEvent']['' . $_POST['eventID'] . '']), $_POST['eventID']);
    $_SESSION['playersEvent']['' . $_POST['eventID'] . ''] = "";
} else if ($_POST['filter']) {

}

$eventRead = new Read();
// Consulta usuario BD
$eventResponse = $eventRead->response(
    $eventRead->queryAll(EVENT_TABLE)
);

$ciudadesRead = new Read();
$ciudades = $ciudadesRead->response(
    $ciudadesRead->queryAll(EVENT_TABLE, 'DISTINCT city')
);

include_once BASE_PATH . VIEWS_PATH . '/events.php';