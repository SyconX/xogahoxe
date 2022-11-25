<div class="card">
    <img src=<?= IMAGES_PATH . "/background3.jpg" ?> class=" card-img-top" alt="">
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
        <input type="hidden" name="idProduct" value="<?= $p->id ?>">
        <a href="#" class="btn btn-dark">Comprar</a>
    </div>
</div>