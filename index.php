<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/index.php':
        require __DIR__ . VIEWS_PATH . '/home.php';
        break;
    case '/':
        require __DIR__ . VIEWS_PATH . '/home.php';
        break;
    case '':
        require __DIR__ . VIEWS_PATH . '/home.php';
        break;
    case '/inicio':
        require __DIR__ . VIEWS_PATH . '/home.php';
        break;
    case '/tienda':
        require __DIR__ . CONTROLLERS_PATH . '/Shop.php';
        break;
    case '/eventos':
        require __DIR__ . CONTROLLERS_PATH . '/Events.php';
        break;
    case '/juegos':
        require __DIR__ . VIEWS_PATH . '/games.php';
        break;
    case '/perfil':
        require __DIR__ . VIEWS_PATH . '/profile.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . VIEWS_PATH . '/error404.php';
        break;
}