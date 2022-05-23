<?php
    require_once('conexion.php');
    
    session_start();

    class Login extends Conexion{
        private $user;
        private $pass;
        private $pdo;

        public function __construct($user, $pass) {
            $this->pdo = Conexion::startUp();
            $this->user = $user;
            $this->pass = $pass;
        }

        // Simulacion de un otro metodo constructor
        public static function __construct1($validarSesion = true, $validarRolVendedor = false, $validarRolComprador = false){
            if($validarSesion){
                self::validarSesion();
            }elseif($validarRolVendedor){
                self::validarRolVendedor();
            }elseif($validarRolComprador){
                self::validarRolComprador();
            }
        }

        public function login(){
            $query = $this->pdo->prepare('SELECT * FROM usuario WHERE BINARY nombre_usuario = :usuario');
            $query->bindParam(':usuario', $this->user);
            $query->execute();

            if($query->rowCount() == 1){
                $result = $query->fetch();

                if(password_verify($this->pass, $result['pass_usuario'])){
                    return $_SESSION['datos'] = $result;
                }else{
                    return false;
                }
            }else{
                return false; 
            }
        }

        public static function validarSesion(){
            if($_SESSION['datos']['id_usuario'] == null){
                echo "<script>location.href='../'</script>";
            }
        }

        public static function validarRolVendedor(){
            if($_SESSION['datos']['rol_usuario'] != 2 && $_SESSION['datos']['rol_usuario'] != 3){
                echo "<script>location.href='../comprador/'</script>";
                // echo "<script>location.href='" . $_SERVER['DOCUMENT_ROOT'] . "'</script>";
            }
        }

        public static function validarRolComprador(){
            if($_SESSION['datos']['rol_usuario'] != 1 && $_SESSION['datos']['rol_usuario'] != 3){
                echo "<script>location.href='../vendedor/'</script>";
            }
        }
    }
?>