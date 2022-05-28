<?php
    require_once('../../models/login.php');
    require_once('../../models/vehiculos.php');
    Login::validarSesion();
    Login::validarRolVendedor();
    $vehiculo = new Vehiculo();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Vista vendedor</title>

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
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h3 class="text-center mt-2 mb-4">Registrar vehiculo</h3>
                        <?php require('../../controllers/vehiculo.php'); ?>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="was-validated">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example1" name="placa" class="form-control" value="<?php echo isset($placa) ? $placa : ''; ?>" required />
                                        <label class="form-label" for="form6Example1">Placa <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example2" name="marca" class="form-control" value="<?php echo isset($marca) ? $marca : ''; ?>" required />
                                        <label class="form-label" for="form6Example2">Marca <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="number" id="form6Example3" name="modelo" class="form-control" value="<?php echo isset($modelo) ? $modelo : ''; ?>" required />
                                        <label class="form-label" for="form6Example3">Modelo <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="number" id="form6Example6" name="precio" step="any" class="form-control" value="<?php echo isset($precio) ? $precio : ''; ?>" required />
                                        <label class="form-label" for="form6Example6">Precio <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="text" id="form6Example4" name="color" class="form-control" value="<?php echo isset($color) ? $color : ''; ?>" required />
                                <label class="form-label" for="form6Example4">Color <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-outline mb-2">
                                <select class="form-select" name="estado" aria-label="Default select example" required>
                                    <option <?php if(isset($estado) && $estado == 1){echo 'selected';} ?> value="1">Nuevo</option>
                                    <option <?php if(isset($estado) && $estado == 2){echo 'selected';} ?> value="2">Usado</option>
                                </select>
                                <label class="form-label" for="form6Example5">Estado <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-outline mb-2">
                                <select class="form-select" name="idCategoria" aria-label="Default select example" required>
                                    <?php
                                        $categorias = $vehiculo->consultarCategorias();
                                        if($categorias != null){
                                            foreach($categorias as $c){
                                                echo '<option value="' . $c['id_categoria'] . '">' . $c['nombre_categoria'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                                <label class="form-label" for="form6Example5">Categoria <span class="text-danger">*</span></label>
                            </div>

                            <div class="text-center mb-5">
                                <button type="submit" name="btnVehiculo" class="btn btn-primary btn-block">Registrar vehiculo</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>

        <?php include('../footer.php'); ?>
    </div>
    
    <?php include('../link-js.php'); ?>
</body>

</html>