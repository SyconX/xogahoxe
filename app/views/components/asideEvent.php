<aside>
    <div class="filter">
        <p class="btn">Filtros: </p>
        <p class="btn">Precio</p>
        <p class="btn">Tipo envío</p>
        <p class="btn">Ciudad</p>
    </div>
    <div class="addProduct">
        <form action=<?= VIEWS_PATH . "/components/newProduct.php" ?> method="post">
            <input type="text" name="newProduct" id="newProduct" value="newProduct" disabled hidden>
            <button type="submit" class="btn btn-dark">Añadir</button>
        </form>
    </div>
</aside>