<div class="modal fade" id="editarPerfilModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Editar mi perfil</h5>
                <button class="close bg-transparent border-0" data-dismiss="modal">
                    <i class="fas fa-times text-white"></i>
                </button>
            </div>
            <form action="../../controllers/usuario.php" method="POST" class="was-validated">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mt-1" name="nombre" value="<?php echo $_SESSION['datos']['datos_nombre'] ?>" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="apellido">Apellido <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mt-1" name="apellido" value="<?php echo $_SESSION['datos']['datos_apellido'] ?>" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Correo <span class="text-danger">*</span></label>
                        <input type="email" class="form-control mt-1" name="email" value="<?php echo $_SESSION['datos']['datos_email'] ?>" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="telefono">Telefono <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control mt-1" name="telefono" value="<?php echo $_SESSION['datos']['datos_telefono'] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="btnUpdateVendedor">actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>