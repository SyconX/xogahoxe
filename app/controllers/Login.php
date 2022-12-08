<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

if ($_POST['logout']) {
    session_destroy();
    header("Location:/inicio");
}
// Usuario vacío
if (trim($_POST['username']) == "") {
    include_once(BASE_PATH . VIEWS_PATH . '/components/newUser.php');
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
    // Usuario no existe en BD y se pide registro
    if ($user === false && isset($_POST['newUser'])) {
        // Crea usuario
        $userCreate = new Create();
        $data = array(
            $_POST['email'],
            $_POST['username'],
            $_POST['password'],
            $_POST['name'],
            $_POST['last_name'],
        );
        $result = $userCreate->query(USER_TABLE, USER_TABLE_COLS, $data);

        if ($result == 1) {
            $_SESSION['loginMsg'] = "Usuario creado con éxito";
        } else {
            $_SESSION['loginMsg'] = $result;
        }
        header('Location: /inicio#formLogin');
        // Usuario no existe en BD
    } else if ($user === false) {
        include_once(BASE_PATH . VIEWS_PATH . '/components/newUser.php');
    } else {
        // Agregar password_hash() tanto para encriptar y guardar como para 
        // desencriptar y comprobar con la contraseña en login

        // Comprueba contraseña
        if ($user[0]->password == $_POST['password']) {
            $_SESSION['userLogin'] = $user[0];
            include(BASE_PATH . CONTROLLERS_PATH . '/Events.php');
        } else {

            $_SESSION['loginMsg'] = "Contraseña incorrecta";
            header('Location: /inicio#formLogin');
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