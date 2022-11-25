<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

$userCreate = new Create();
$data = array(
    $_POST['email'],
    $_POST['username'],
    $_POST['password'],
    $_POST['name'],
    $_POST['last_name'],
);
$user = $userCreate->query(USER_TABLE, USER_TABLE_COLS, $data);