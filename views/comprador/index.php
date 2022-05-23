<?php
    require_once('../../models/login.php');
    require_once('../../models/vehiculos.php');
    Login::validarSesion();
    Login::validarRolComprador();
    $vehiculo = new Vehiculo();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Vista comprador</title>

    <script src="https://kit.fontawesome.com/dca352768f.js" crossorigin="anonymous"></script>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- /Boostrap -->
</head>

<body>
    <div class="">
        <?php include('../navbar.php'); ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3 class="text-center mt-2 mb-4 fw-bold">Consultar vehiculo</h3>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="was-validated">

                            <div class="form-outline mb-2">
                                <select class="form-select" name="idCategoria" aria-label="Default select example" required>
                                    <?php
                                    $categorias = $vehiculo->consultarCategorias();
                                    if ($categorias != null) {
                                        foreach ($categorias as $c) {
                                            echo '<option value="' . $c['id_categoria'] . '">' . $c['nombre_categoria'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <label class="form-label" for="form6Example5">Tipo de vehiculo <span class="text-danger">*</span></label>
                            </div>

                            <div class="text-center mb-5">
                                <button type="submit" name="buscarVehiculo" class="btn btn-primary btn-block">Buscar vehiculo</button>
                            </div>
                        </form>

                        <?php
                        include('../../controllers/vehiculo.php');
                        ?>

                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>

        <?php include('../footer.php'); ?>
    </div>

    <?php include('../link-js.php'); ?>
</body>

</html>