<?php
    function limpiarTexto($elemento){
        $input = ltrim(rtrim($elemento));
        $texto = htmlspecialchars($input);
        return ltrim(rtrim($texto));
    }

    function campoNull($input){
        if($input == null){
            return true;
        }else{
            return false;
        }
    }
?>