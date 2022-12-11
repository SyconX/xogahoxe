<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';


if (isset($_POST['eventFinder'])) {
    $eventRead = new Read();
    $columnSearch = ["game", "city", "description"];
    $search = '%' . trim($_POST['search']) . '%';
    // Consulta usuario BD
    $eventResponse = $eventRead->response(
        $eventRead->querySearch(
        EVENT_TABLE,
            $columnSearch,
            $search
        )
    );
    include_once BASE_PATH . VIEWS_PATH . '/events.php';
} else if (isset($_POST['shopFinder'])) {
    $productRead = new Read();
    $columnSearch = ["name", "description"];
    $search = '%' . trim($_POST['search']) . '%';
    // Consulta usuario BD
    $productResponse = $productRead->response(
        $productRead->querySearch(
        PRODUCT_TABLE,
            $columnSearch,
            $search
        )
    );
    // $productResponse = $productRead->response();
    include_once BASE_PATH . VIEWS_PATH . '/shop.php';
} else {

}