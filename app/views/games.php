<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <link rel="stylesheet" href=<?= CSS_PATH . "/games.css" ?>>
    <link rel="stylesheet" href=<?= CSS_PATH . "/header.css" ?>>
    <link rel="stylesheet" href=<?= CSS_PATH . "/userModal.css" ?>>
    <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
    <?= BOOTSTRAP_LINK ?>

</head>

<body>
    <header class="cont-header flex">
        <?php include_once(BASE_PATH . VIEWS_PATH . '/components/nav.php'); ?>
    </header>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/userModal.php'); ?>
    <main>
        <form action=<?= CONTROLLERS_PATH . "/Games.php" ?> method="post" class="finder flex">
            <input type="hidden" name="gamesFinder">
            <input type="text" name="search" id="search" placeholder=" Buscar información..">
        </form>
        <?php if (isset($hotGames)) { ?>
        <h3 class="gamesTitle">Lo más buscado</h3>
        <?php for ($i = 1; $i <= count($hotGames); $i++) { ?>
        <div class="games">
            <div class="image">
                <form action=<?= CONTROLLERS_PATH . "/Games.php" ?> method="post">
                    <input type="hidden" name="gameID" value="<?= $hotGames[$i]['id'] ?>">
                    <input type="image" name="submit" src="<?= $hotGames[$i]['image'] ?>"
                        alt="<?= $hotGames[$i]['name'] ?>">
                </form>
            </div>
            <p class="text">
                <?="&laquo;" . $i . "&raquo; " . $hotGames[$i]['name'] ?>
            </p>
        </div>
        <?php } ?>
        <?php } else if (isset($searchGames)) { ?>
        <h3 class="gamesTitle">Resultados de la búsqueda</h3>
        <?php foreach ($searchGames as $game) { ?>
        <div class="games">
            <div class="image">
                <form action=<?= CONTROLLERS_PATH . "/Games.php" ?> method="post">
                    <input type="hidden" name="gameID" value="<?= $game['id'] ?>">
                    <input type="image" name="submit" src="<?= $game['image'] ?>" alt="<?= $game['name'] ?>">
                </form>
            </div>
            <p class="text">
                <?= $game['name'] ?>
            </p>
        </div>
        <?php } ?>
        <?php } else if (isset($gameInfo) && $gameInfo != '') { ?>
        <div class="game">
            <div class="image">
                <img src="<?= $gameInfo['image'] ?>" alt="<?= $gameInfo['name'] ?>">
            </div>
            <h3 class="name">
                <?= $gameInfo['name'] ?> <span>(<?= $gameInfo['year'] ?>)</span>
            </h3>
            <p class="rating" style="background-color: whitesmoke;">
                <?= $gameInfo['rating'] ?>
            </p>
            <p class="rank">
                <span>Ranking</span>
                <?= $gameInfo['rank'] ?>
            </p>
            <p class="players">
                <span>Jugadores</span>
                <?= $gameInfo['minplayers'] . ' / ' . $gameInfo['maxplayers'] ?>
            </p>
            <p class="playtime">
                <span>Tiempo de partida</span>
                <?= $gameInfo['minplaytime'] ?>
                    <?=($gameInfo['maxplaytime'] !='' && $gameInfo['maxplaytime'] !=0) ? ' / ' .
                        $gameInfo['maxplaytime'] : '' ?> min
            </p>
            <p class="age">
                <span>Edad</span>
                +<?= $gameInfo['age'] ?>
            </p>
            <p class="weight">
                <span>Dificultad</span>
                <?= $gameInfo['weight'] ?>
            </p>
            <p class="publisher">
                <span>Editorial</span>
                <?= $gameInfo['publisher'] ?>
            </p>
            <div class="gameBottom">
                <p class="description">
                    <?= $gameInfo['description'] ?>
                </p>
                <h6 class="categories">Categorías</h6>
                <ul class="categories">
                    <?php foreach ($gameInfo['categories'] as $category) { ?>
                    <li>
                        <?= $category ?>
                    </li>
                    <?php } ?>
                </ul>
                <h6 class="mechanics">Mecánicas</h6>
                <ul class="mechanics">
                    <?php foreach ($gameInfo['mechanics'] as $mechanic) { ?>
                    <li>
                        <?= $mechanic ?>
                    </li>
                    <?php } ?>
                </ul>
                <a href="<?= $gameInfo['url'] ?>" target="_blank" rel="noopener noreferrer">
                    <button type="button" class="btn btn-outline-dark btn-bgg">
                        Ver en BGG
                    </button>
                </a>
            </div>
        </div>
        <?php } ?>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/aside.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>