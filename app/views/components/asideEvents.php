<aside>
    <div class="filters">
        <form action=<?= CONTROLLERS_PATH . "/Events.php" ?> method="post">
            <div class="ciudades">
                <label for="ciudad[]">Ciudad</label>
                <?php foreach ($ciudades as $ciudad) { ?>
                <div>
                    <input type="checkbox" name="ciudad[]" id="<?= $ciudad->city ?>" value="<?= $ciudad->city ?>" <?php
                        if (isset($cityFilter)) { echo (in_array($ciudad->city, $cityFilter)) ? "checked" : "";
                    } ?>
                    >
                    <label for="<?= $ciudad->city ?>">
                        <?= $ciudad->city ?>
                    </label>
                </div>
                <?php } ?>
            </div>
            <div class="fechas">
                <label for="fecha[]">Fecha inicio y fin</label>
                <input type="datetime-local" name="fecha[]" id="fechaInicio" min="2023-01-01T00:00:00"
                    max="2030-01-01T00:00:00" value="<?= $dateFilter[0] ?? "" ?>">
                <input type="datetime-local" name="fecha[]" id="fechaFin" min="2023-01-01T00:00:00"
                    max="2030-01-01T00:00:00" value="<?= $dateFilter[1] ?? "" ?>">
            </div>
            <input type="hidden" name="filter" value="filter">
            <button type="submit" class="btn btn-outline-dark">Filtrar</button>
        </form>
    </div>
    <a href="#top" rel="noopener noreferrer"><i class="fa-sharp fa-solid fa-arrow-up"></i></a>
</aside>