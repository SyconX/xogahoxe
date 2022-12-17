<div class="card">
    <div class="card-img-top">
        <img src=<?= IMAGES_PATH . "/background3.jpg" ?>
        alt="">
    </div>
    <div class="card-body">
        <h4 class="card-price">
            <?= $p->price ?>€
                <?= $p->delivery == 'Envío a domicilio' ? '<i class="icon fa-solid fa-truck"></i>' : '' ?>
        </h4>
        <h5 class="card-title">
            <?= $p->name ?>
        </h5>
        <p class="card-description">
            <?= $p->description ?>
        </p>
        <?php if ($_SESSION['userLogin']->username == $p->owner) { ?>
        <form action=<?= CONTROLLERS_PATH . "/Shop.php" ?> method="post">
            <input type="hidden" name="productID" value="<?= $p->id ?>">
            <input type="hidden" name="deleteProduct" value="deleteProduct">
            <input class="btn btn-danger" type="submit" value="Eliminar" />
        </form>
        <?php } else if (isset($_SESSION['userLogin'])) { ?>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#errorModal">
            Comprar
        </button>
        <?php } ?>
    </div>
</div>