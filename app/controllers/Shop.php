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

if (isset($_POST['ciudad']) || isset($_POST['tipoEntrega']) || ($_POST['precio'][0] != "" && $_POST['precio'][1] != "")) {

    $cityFilter = $_POST['ciudad'];
    $deliveryFilter = $_POST['tipoEntrega'];
    $priceFilter = $_POST['precio'];

    $where = " WHERE ";

    if ($cityFilter != "") {
        $where .= "(city LIKE '%$cityFilter%')";
    }
    if ($deliveryFilter != "") {
        $where .= (isset($cityFilter)) ? " AND " : "";
        $where .= "(delivery LIKE '%$deliveryFilter%')";
    }
    if ($_POST['precio'][0] != "" && $_POST['precio'][1] != "") {
        $where .= (isset($cityFilter) || isset($deliveryFilter)) ? " AND " : "";
        $where .= "(price BETWEEN $priceFilter[0] AND $priceFilter[1])";
    }
    $prueba = $where;
}

$productRead = new Read();
// Consulta usuario BD
$productResponse = $productRead->response(
    $productRead->queryAll(PRODUCT_TABLE, "*", $where)
);

$ciudadesRead = new Read();
$ciudades = $ciudadesRead->response(
    $ciudadesRead->queryAll(PRODUCT_TABLE, 'DISTINCT city')
);

include_once BASE_PATH . VIEWS_PATH . '/shop.php';