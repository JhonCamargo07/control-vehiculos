<?php
    require_once('login.php');
    Login::validarSesion();
    session_destroy();
    echo "<script>
            alert('Sesión cerrada exitosamente');
            location.href='../';
        </script>";
?>