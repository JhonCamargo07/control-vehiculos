<?php
    require_once('../models/usuario.php');
    require_once('validacion.php');

    if(isset($_POST['btnInsertUsuario'])){
        $user = limpiarTexto($_POST['user']);
        $pass = limpiarTexto($_POST['pass']);
        $rol = limpiarTexto($_POST['rol']);

        if(campoNull($user) || campoNull($pass) || campoNull($rol)){
            echo "<script>alert('Datos erroneos')</script>";
        }else{
            $usuario = new Usuario($user, $pass, $rol);
            $seInsertoCorrectamente = $usuario->insertarUsuario();
            if($seInsertoCorrectamente){
                echo "<script>alert('Usuario agregado exitosamente')</script>";
            }else{
                echo "<script>alert('Ocurrió un error al agregar el usuario, intente nuevamente')</script>";
            }
        }
    }

    if(isset($_POST['btnUpdateUsuario'])){
        $user = htmlspecialchars($_POST['user']);
        $pass = htmlspecialchars($_POST['pass']);
        $rol = htmlspecialchars($_POST['rol']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $email = htmlspecialchars($_POST['email']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $idUsuario = htmlspecialchars($_POST['idUsuario']);

        if(empty($user) || empty($pass) || empty($rol) || empty($nombre) || empty($apellido) || empty($email) || empty($telefono) || empty($idUsuario)){
            echo "<script>alert('Datos erroneos')</script>";
        }else{
            $usuario = new Usuario($user, $pass, $rol);
            $seInsertoCorrectamente = $usuario->actualizarUsuario($nombre, $apellido, $telefono, $email, $idUsuario);
            if($seInsertoCorrectamente){
                echo "<script>alert('Usuario actualizado exitosamente')</script>";
            }else{
                echo "<script>alert('Ocurrió un error al actualizar el usuario, intente nuevamente')</script>";
            }
        }
    }
?>