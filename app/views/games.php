<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <?= BOOTSTRAP_LINK ?>
        <link rel="stylesheet" href=<?= CSS_PATH . "/games.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/header.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/userModal.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
</head>

<body>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/header.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/userModal.php'); ?>
    <main>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/aside.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>