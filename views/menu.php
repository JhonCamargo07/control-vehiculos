<?php
    require_once('../models/login.php');

    $sesion = Login::validarSesion();

    if(isset($_SESSION['datos'])){
        if($_SESSION['datos']['rol_usuario'] == 1){
            // header('location: comprador/');
            echo "<script>location.href='comprador/'</script>";
        }elseif($_SESSION['datos']['rol_usuario'] == 2 || $_SESSION['datos']['rol_usuario'] == 3){
            // header('location: vendedor');
            echo "<script>location.href='vendedor/'</script>";
        }
    }else{
        echo "<script>location.href='../controllers/logout.php'</script>";
    }
?>