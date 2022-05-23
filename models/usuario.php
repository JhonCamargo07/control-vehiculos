<?php
    require_once('conexion.php');
    
    class Usuario extends Conexion{
        private $idUser;
        private $user;
        private $pass;
        private $rol;
        private $pdo;

        public function __construct($user, $pass, $rol) {
            $this->pdo = Conexion::startUp();
            $this->user = $user;
            $this->pass = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 11]);
            $this->rol = $rol;
        }

        public function esUsuarioValido(){
            $query = $this->pdo->prepare('SELECT * FROM usuario WHERE BINARY nombre_usuario = :usuario');
            $query->bindParam(':usuario', $this->user);
            $query->execute();
            if($query->rowCount() == 0){
                return true;
            }else{
                return false;
            }
        }

        public function insertarUsuario(){
            if(self::esUsuarioValido()){
                $insert = $this->pdo->prepare('INSERT INTO usuario (nombre_usuario, pass_usuario, rol_usuario) VALUES (:usuario, :pass, :rol)');
                $insert->bindParam(':usuario', $this->user);
                $insert->bindParam(':pass', $this->pass);
                $insert->bindParam(':rol', $this->rol);
                return $insert->execute();
            }else{
                return 'existe';
            }
        }

        public function actualizarUsuario($nombre, $apellido, $telefono, $email, $id){
            $update = $this->pdo->prepare('UPDATE datos_personales 
                                        SET datos_nombre = :nombre, datos_apellido = :apellido, datos_telefono = :telefono, datos_email = :email
                                        WHERE id_usuario_FK = :id');
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':apellido', $apellido);
            $update->bindParam(':telefono', $telefono);
            $update->bindParam(':email', $email);
            $update->bindParam(':id', $id);

            return $update->execute();
        }

        public function consultarUsuarioPorId($id){
            $query = $this->pdo->prepare('SELECT * FROM datos_personales INNER JOIN usuario ON id_usuario = id_usuario_FK WHERE id_usuario = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch();
        }
    }
?>