<?php
    require_once('../../models/login.php');
    require_once('../../models/usuario.php');
    Login::validarSesion();
    Login::validarRolComprador();
    $usuario = new Usuario("prueba", "prueba", 1);
    if(isset($_GET['id'])){
        $vendedor = $usuario->consultarUsuarioPorId(htmlspecialchars($_GET['id']));
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos vendedor</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- /Boostrap -->

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/dca352768f.js" crossorigin="anonymous"></script>
    <!-- /Fontawesome -->
</head>

<body>

    <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="verDatosVendedor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Datos del vendedor</h5>
                    <button class="close bg-transparent border-0" id="closeModal" data-dismiss="modal">
                        <i class="fas fa-times text-white"></i>
                    </button>
                </div>
                <div class="p-4">
                    <p><span class="fw-bold">Nombre:</span> <?php echo $vendedor['datos_nombre'] . " " . $vendedor['datos_apellido'];?></p>
                    <p><span class="fw-bold">Telefono:</span> <?php echo $vendedor['datos_telefono'];?></p>
                    <p><span class="fw-bold">Email:</span> <?php echo $vendedor['datos_email'];?></p>
                    <div class="text-center mt-3">
                        <a href="../comprador" class="text-center"><button class="btn btn-primary">Volver a consultar vehiculos</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../link-js.php'); ?>

    <script>
        window.$('#verDatosVendedor').modal('show');
        $(document).on('click', '#closeModal', function() {
            location.href="../comprador";
        });
    </script>
</body>

</html>