<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

if ($_POST['productName'] && $_POST['productName'] != "") {
    $productCreate = new Create();
    $data = array(
        $_POST['productName'],
        $_POST['price'],
        $_POST['status'],
        $_POST['delivery'],
        $_POST['address'],
        $_POST['city'],
        $_POST['description'],
        // Tanto para jugadores como owner, recoger
        // el usuario logueado en ese momento
        serialize(array($_SESSION['userLogin']->username)),
            $_SESSION['userLogin']->username,
    );
    $products = $productCreate->query(PRODUCT_TABLE, PRODUCT_TABLE_COLS, $data);
}

$productRead = new Read();
// Consulta usuario BD
$productResponse = $productRead->response(
    $productRead->queryAll(PRODUCT_TABLE)
);

include_once BASE_PATH . VIEWS_PATH . '/shop.php';