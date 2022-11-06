<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/app/views/index.php';
        break;
    case '' :
        require __DIR__ . '/app/views/index.php';
        break;
    case '/tienda' :
        require __DIR__ . '/app/views/shop.php';
        break;
    case '/eventos' :
        require __DIR__ . '/app/views/events.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/app/views/error404.php';
        break;
}