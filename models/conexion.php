<?php
    class Conexion{
        private $host;
        private $bdName;
        private $charset;
        private $user;
        private $pass;

        public function __construct() {
            $this->host = "localhost";
            $this->bdName = "control_vehiculos";
            $this->charset = "utf8mb4";
            $this->user = "root";
            $this->pass = "";
        }

        public function startUp() {
            self::__construct();
            // Conectarse
            try{
                $connection = 'mysql:host=' . $this->host . ';dbname=' . $this->bdName . ';charset=' . $this->charset;
                $pdo = new PDO($connection, $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch(PDOException $e){
                echo "Error al conectarse con la base de datos";
                die($e->getMessage());
        }
    }
}

?>