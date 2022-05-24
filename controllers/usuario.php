<?php
    require_once('../models/login.php');
    require_once('../models/usuario.php');
    require_once('validacion.php');

    if(isset($_POST['btnInsertUsuario'])){
        $user = limpiarTexto($_POST['user']);
        $pass = limpiarTexto($_POST['pass']);
        $rol = limpiarTexto($_POST['rol']);
        $passwordAdmin = "JA5lW_dB1fT^oA6cP757";
        $rolDefinitivo = 1;

        if(campoNull($user) || campoNull($pass) || campoNull($rol) || $rol <= 0 || $rol > 3){
            echo "<script>alert('Datos erroneos')</script>";
        }else{
            if($rol != 1){
                if(limpiarTexto($_POST['passAdmin']) == $passwordAdmin){
                    $usuario = new Usuario($user, $pass, $rol);
                    $seInsertoCorrectamente = $usuario->insertarUsuario();
                }else{
                    $seInsertoCorrectamente = false;
                    echo "<script>alert('La contraseña de administrador es incorrecta, intente nuevamente')</script>";
                }
            }else{
                $usuario = new Usuario($user, $pass, 1);
                $seInsertoCorrectamente = $usuario->insertarUsuario();
            }
            if($seInsertoCorrectamente){
                echo "<script>alert('Usuario agregado exitosamente')</script>";
            }else{
                echo "<script>alert('Ocurrió un error al agregar el usuario, intente nuevamente')</script>";
                echo $seInsertoCorrectamente;
            }
        }
    }

    if(isset($_POST['btnUpdateVendedor'])){
        $rol = limpiarTexto($_SESSION['datos']['rol_usuario']);
        $nombre = limpiarTexto($_POST['nombre']);
        $apellido = limpiarTexto($_POST['apellido']);
        $email = limpiarTexto($_POST['email']);
        $telefono = limpiarTexto($_POST['telefono']);
        $idUsuario = limpiarTexto($_SESSION['datos']['id_usuario']);

        if(campoNull($rol) || campoNull($nombre) || campoNull($apellido) || campoNull($email) || campoNull($telefono) || campoNull($idUsuario)){
            echo "<script>alert('Datos erroneos')</script>";
        }else{
            $usuario = new Usuario($_SESSION['datos']['nombre_usuario'], $_SESSION['datos']['pass_usuario'], $rol);
            $seInsertoCorrectamente = $usuario->actualizarUsuario($nombre, $apellido, $telefono, $email, $idUsuario);
            if($seInsertoCorrectamente){
                echo "<script>
                alert('Usuario actualizado exitosamente');
                location.href='../views/menu.php';
                </script>";
            }else{
                echo "<script>alert('Ocurrió un error al actualizar el usuario, intente nuevamente')</script>";
            }
        }
    }
?>