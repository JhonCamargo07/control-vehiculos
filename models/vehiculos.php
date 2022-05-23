<?php
    require_once('conexion.php');

    class Vehiculo extends Conexion{
        private $placa;
        private $marca;
        private $modelo;
        private $idCategoria;
        private $color;
        private $estado;
        private $precio;
        private $idVendedor;

        public function __construct() {
            $this->pdo = Conexion::startUp();
            $this->placa = " ";
            $this->marca = " ";
            $this->modelo = " ";
            $this->idCategoria = " ";
            $this->color = " ";
            $this->estado = " ";
            $this->precio = " ";
            $this->idVendedor = " ";
        }

        public function laPlacaExisteEnBD($placa){
            $query = $this->pdo->prepare('SELECT * FROM vehiculo WHERE placa_vehiculo = :placa');
            $query->bindParam(':placa', $placa);
            $query->execute();
            if($query->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        public function insertarVehiculo($placa, $marca, $modelo, $idCategoria, $color, $estado, $precio, $idVendedor){
            if(!self::laPlacaExisteEnBD($placa)){
                if(self::laCategoriaExiste($idCategoria)){
                    $insert = $this->pdo->prepare('INSERT INTO vehiculo (placa_vehiculo, marca_vehiculo, modelo_vehiculo, color_vehiculo, estado_vehiculo, precio_vehiculo, id_usuario_vendedor_FK, id_categoria_FK) VALUES (:placa, :marca, :modelo, :color, :estado, :precio, :idVendedor, :idCategoria)');
                    $insert->bindParam(':placa', $placa);
                    $insert->bindParam(':marca', $marca);
                    $insert->bindParam(':modelo', $modelo);
                    $insert->bindParam(':color', $color);
                    $insert->bindParam(':estado', $estado);
                    $insert->bindParam(':precio', $precio);
                    $insert->bindParam(':idVendedor', $idVendedor);
                    $insert->bindParam(':idCategoria', $idCategoria);
        
                    return $insert->execute();
                }else{
                    return "<script>alert('La categoria no existe')</script>";
                }
            }else{
                return "<script>alert('El vehiculo con la placa " . $placa . " ya se encuentra registrado')</script>";
            }
        }

        public function consultarCategorias(){
            $rows = null;
            $query = $this->pdo->prepare('SELECT * FROM categoria');
            $query->execute();
            while($result = $query->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function laCategoriaExiste($id){
            $query = $this->pdo->prepare('SELECT * FROM categoria WHERE id_categoria = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            if($query->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        public function consultarVehiculosPorCategoria($idCategoria){
            $rows = null;
            $query = $this->pdo->prepare('SELECT * FROM vehiculo INNER JOIN categoria ON id_categoria = id_categoria_FK WHERE id_categoria = :idCategoria');
            $query->bindParam(':idCategoria', $idCategoria);
            $query->execute();
            while($result = $query->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }
    }
?>