<?php
error_reporting(E_ERROR | E_PARSE);

// Rutas
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);
define('CONFIG_PATH', '/app/config');
define('CONTROLLERS_PATH', '/app/controllers');
define('MODELS_PATH', '/app/models');
define('VIEWS_PATH', '/app/views');
define('IMAGES_PATH', '/resources/images');
define('CSS_PATH', '/resources/css');
define('SCRIPTS_PATH', '/resources/scripts');

// Links Bootstrap y FontAwesome
define('BOOTSTRAP_LINK', '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/9b80d208ae.js" crossorigin="anonymous"></script>');

// Datos de conexion con la base de datos
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'xogahoxe');

// Datos CRUD
define('USER_TABLE', 'user');
define('EVENT_TABLE', 'event');
define('PRODUCT_TABLE', 'product');

// Configuración datos tablas
define(
    'USER_TABLE_COLS',
    array(
        ':mail',
        ':username',
        ':password',
        ':name',
        ':last_name',
        ':city',
        ':phone',
        ':age',
        ':image'
    )
);
define(
    'EVENT_TABLE_COLS',
    array(
        ':game',
        ':address',
        ':city',
        ':date',
        ':min_players',
        ':max_players',
        ':description',
        ':info',
        ':players',
        ':owner'
    )
);
define(
    'PRODUCT_TABLE_COLS',
    array(
        ':name',
        ':price',
        ':status',
        ':delivery',
        ':address',
        ':city',
        ':description',
        ':sold',
        ':owner',
    )
);



include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
include_once BASE_PATH . MODELS_PATH . '/ConnectionDB.php';
include_once BASE_PATH . MODELS_PATH . '/Read.php';
include_once BASE_PATH . MODELS_PATH . '/Create.php';
include_once BASE_PATH . MODELS_PATH . '/Delete.php';
include_once BASE_PATH . MODELS_PATH . '/Update.php';

?>