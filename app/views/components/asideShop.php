<aside>
    <?php if (isset($_SESSION['userLogin'])) { ?>
    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newEventModal">
        Nuevo producto
    </button>
    <?php } ?>
    <div class="filter">
        <p class="btn">Filtros: </p>
        <p class="btn">Precio</p>
        <p class="btn">Tipo envío</p>
        <p class="btn">Ciudad</p>
    </div>
</aside>