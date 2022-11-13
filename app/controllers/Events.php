<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

// $retVal = (condition) ? a : b ;
/* 
if ($_POST['game']) {
    $eventCreate = new Create();
    $data = array(
        $_POST['game'],
        $_POST['direction'],
        $_POST['city'],
        $_POST['date'],
        $_POST['time'],
        $_POST['min_players'],
        $_POST['max_players'],
        'javier',
        $_POST['description'],
        $_POST['info'],
        "",
        'javier'
    );
    $user = $userCreate->query(EVENT_TABLE, EVENT_TABLE_COLS, $data);
    unset($_POST['game']);
} */

$eventRead = new Read();
// Consulta usuario BD
$events = $eventRead->response(
    $eventRead->queryAll(EVENT_TABLE)
);

include_once(BASE_PATH . VIEWS_PATH . '/events.php');

/** Generar datos y cargar vista. En la vista se usan los datos.
 * Se pueden encadenar. En este caso se llama a eventos
 * que a su ver llama a tienda, que es la vista que usa el array.
 * 
 * $user = array ('username' => $_POST['username'], 'lastname' => 'fraga');
 * include_once BASE_PATH . VIEWS_PATH . '/events.php';
 */