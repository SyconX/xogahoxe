<?php

/* 
* Datos de conexion con la base de datos
*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'xogahoxe');



/* Conexion */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
/* Fallo de la conexion */
if($mysqli === false){
    die("ERROR: No se puede conectar con la base de datos. " . $mysqli->connect_error);
}

?>