<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

// Usuario vacío
if (trim($_POST['username']) == "") {
    include_once(BASE_PATH . VIEWS_PATH . '/register.php');
} else {
    $userRead = new Read();
    // Consulta usuario BD
    $user = $userRead->response(
        $userRead->queryAllWhere(
            USER_TABLE,
            'username',
            'LIKE',
            trim($_POST['username'])
        )
    );
    $err = "";
    // Usuario no existe en BD
    if ($user === false) {
        include_once(BASE_PATH . VIEWS_PATH . '/register.php');
    } else {
        // Agregar password_hash() tanto para encriptar y guardar como para 
        // desencriptar y comprobar con la contraseña en login

        // Comprueba contraseña
        if ($user[0]->password == $_POST['password']) {
            include_once(BASE_PATH . VIEWS_PATH . '/events.php');
        } else {
            $error = "Contraseña incorrecta";
            include_once(BASE_PATH . VIEWS_PATH . '/events.php');
        }
    }
}


/** Generar datos y cargar vista. En la vista se usan los datos.
 * Se pueden encadenar. En este caso se llama a eventos
 * que a su ver llama a tienda, que es la vista que usa el array.
 * 
 * $user = array ('username' => $_POST['username'], 'lastname' => 'fraga');
 * include_once BASE_PATH . VIEWS_PATH . '/events.php';
 */