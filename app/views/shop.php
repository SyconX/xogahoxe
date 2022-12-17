<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <?= BOOTSTRAP_LINK ?>
        <link rel="stylesheet" href=<?= CSS_PATH . "/shop.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/header.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/aside.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/userModal.css" ?>>
        <link rel="stylesheet" href=<?= CSS_PATH . "/footer.css" ?>>
</head>

<body>
    <header class="cont-header flex">
        <form action=<?= CONTROLLERS_PATH . "/Finder.php" ?> method="post" class="finder flex">
            <input type="hidden" name="shopFinder">
            <input type="text" name="search" id="search" placeholder="Buscar por nombre o descripción">
        </form>
        <?php include_once(BASE_PATH . VIEWS_PATH . '/components/nav.php'); ?>
    </header>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/asideShop.php'); ?>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/userModal.php'); ?>

    <?php if (isset($_SESSION['userLogin'])) { ?>
    <!-- The Modal -->
    <div class="modal fade" id="newEventModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Añadir un nuevo producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action=<?= CONTROLLERS_PATH . "/Shop.php" ?> method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" name="newProduct" value="newProduct">
                        <label for="productName">Juego</label>
                        <input type="text" name="productName" id="productName" required>
                        <label for="price">Precio</label>
                        <input type="number" step="0.1" min="1" name="price" id="price" required>
                        <div>
                            <label for="status">Estado del producto</label>
                            <label for="delivery">Método entrega</label>
                        </div>
                        <div>
                            <select type="select" name="status" id="status" required>
                                <option value="Nuevo">Nuevo</option>
                                <option value="Buen estado">Buen estado</option>
                                <option value="Usado">Usado</option>
                            </select>
                            
                            <select type="select" name="delivery" id="delivery" required>
                                <option value="Entrega en mano">Entrega en mano</option>
                                <option value="Envío a domicilio">Envío a domicilio</option>
                            </select>
                        </div>
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" required>
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" id="city" required>
                        <label for="description">Descripción</label>
                        <input type="text" name="description" id="description">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-dark" value="Añadir">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    <h4>Funcionalidad en construcción.</h4>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <main>
        <?php
        if ($productResponse === false) { ?>
        <p class="notFound">No se han encontrado productos</p>
        <?php } else { ?>
        <div class="grid-container">
            <?php foreach ($productResponse as $p) {
                include(BASE_PATH . VIEWS_PATH . "/components/product.php");
            }
        }
            ?>
        </div>
    </main>
    <?php include_once(BASE_PATH . VIEWS_PATH . '/components/footer.php'); ?>
</body>

</html>