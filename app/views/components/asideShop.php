<aside>
    <?php if (isset($_SESSION['userLogin'])) { ?>
    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newEventModal">
        Nuevo producto
    </button>
    <?php } ?>
    <div class="filters">
        <form action=<?= CONTROLLERS_PATH . "/Shop.php" ?> method="post">
            <div class="ciudades">
                <label for="ciudad">Ciudad</label>
                <select type="select" name="ciudad">
                    <?php foreach ($ciudades as $ciudad) { ?>
                    <option value="<?= $ciudad->city ?>">
                        <?= $ciudad->city ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="entrega">
                <label for="tipoEntrega">Tipo de entrega</label>
                <select type="select" name="tipoEntrega">
                    <option value="En mano">En mano</option>
                    <option value="Envío a domicilio">Envío a domicilio</option>
                </select>
            </div>
            <div class="precios">
                <label for="precio">Precio</label>
                <input name="precio" type="range" min="1" max="12" value="1" class="slider">
            </div>
            <input type="hidden" name="filter" value="filter">
            <button type="submit" class="btn btn-outline-dark">Filtrar</button>
        </form>
    </div>
    <a href="#top" rel="noopener noreferrer"><i class="fa-sharp fa-solid fa-arrow-up"></i></a>
</aside>