<?php
    require_once('../models/login.php');
    require_once('validacion.php');

    if(isset($_POST['ingresar'])){
        $user = limpiarTexto($_POST['user']);
        $pass = limpiarTexto($_POST['pass']);

        if(campoNull($user) || campoNull($pass)){
            echo "<script>alert('Datos erroneos, campo null')</script>";
        }else{
            $login = new Login($user, $pass);
            $existeEnBD = $login->login();
            if($existeEnBD != false){
                echo "<script>location.href='menu.php'</script>";
            }else{
                echo "<script>alert('Error en los datos')</script>";
            }
        }
    }
?>