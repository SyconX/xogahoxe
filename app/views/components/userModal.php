<div class="modal fade" id="userModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Accede o regístrate</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action=<?= CONTROLLERS_PATH . "/Login.php" ?> method="post">
                <!-- Modal body -->
                <div class="modal-body flex-col">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-dark" value="Acceder">
                </div>
            </form>
        </div>
    </div>
</div>