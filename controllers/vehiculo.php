<?php
    require_once('../../models/vehiculos.php');
    require_once('validacion.php');

    if(isset($_POST['btnVehiculo'])){
        $placa = limpiarTexto($_POST['placa']);
        $marca = limpiarTexto($_POST['marca']);
        $modelo = limpiarTexto($_POST['modelo']);
        $color = limpiarTexto($_POST['color']);
        $estado = limpiarTexto($_POST['estado']);
        $precio = limpiarTexto($_POST['precio']);
        $idVendedor = $_SESSION['datos']['id_usuario'];
        $idCategoria = limpiarTexto($_POST['idCategoria']);

        if($estado > 2 || $estado < 1){$estado = 1;}

        if(campoNull($placa) || campoNull($marca) || campoNull($modelo) || campoNull($color) || campoNull($estado) || campoNull($precio) || campoNull($idVendedor) || campoNull($idCategoria)){
            echo "<script>alert('Datos erroneos')</script>";
        }else{
            $vehiculo = new Vehiculo();
            $busqueda = $vehiculo->insertarVehiculo($placa, $marca, $modelo, $idCategoria, $color, $estado, $precio, $idVendedor);
            // if($busqueda == false){
            //     echo "<script>alert('Ocurrió un error al agregar el vehiculo, recargue la página e intente nuevamente')</script>";
            // }elseif($busqueda == 'categoriaNoValida'){
            //     echo "<script>alert('La categoria no existe')</script>";
            // }elseif($busqueda == 'placaNoValida'){
            //     echo "<script>alert('El vehiculo con la placa " . $placa . " ya se encuentra registrado')</script>";
            // }

            if($busqueda){
                echo "<script>
                        alert('Vehiculo agregado exitosamente');
                        location.href='../menu.php';
                    </script>";
            }elseif($busqueda == false){
                echo "<script>alert('Ocurrió un error al agregar el vehiculo, recargue la página e intente nuevamente')</script>";
            }else{
                echo $busqueda;
            }
        }
    }

    if(isset($_POST['buscarVehiculo'])){
        $idCategoria = limpiarTexto($_POST['idCategoria']);
        $nombreCategoria = 'campero';
        $num = 1;
        if($idCategoria == 2){
            $nombreCategoria = 'automovil';
        }elseif($idCategoria == 3){
            $nombreCategoria = 'camioneta';
        }elseif($idCategoria == 4){
            $nombreCategoria = 'tractor';
        }

        if(campoNull($idCategoria)){
            echo "<script>alert('Datos erroneos')</script>";
        }else{
            $vehiculo = new Vehiculo();
            $busqueda = $vehiculo->consultarVehiculosPorCategoria($idCategoria);
            if($busqueda == null){
                echo "<script>alert('Por el momento no existe ningún vehiculo con esta categoria')</script>";
            }elseif($busqueda){
?>
            <p class="fw-bold">Vehiculos tipo <?php echo $nombreCategoria; ?></p>
            <table class="table table-striped mb-5 text-center mx-0">
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Color</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Vendedor</th>
                </tr>
<?php
                foreach($busqueda as $b){
                    include('../listar-vehiculo.php');
                }
?>
            </table>
<?php
            }else{
                echo "<script>alert('Ocurrió un error al agregar el vehiculo, recargue la página e intente nuevamente')</script>";
            }
        }
    }
?>