<?php
require_once 'conexion.php';


function mostrarErrores($errores, $campo){
    $alerta='';
    
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div style=' background:red;color:#fff; text-align:center; font-size:14px;justify-content: center; margin-top:-7px; margin-bottom:2px;float:right;width:76%; ' class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    
    return $alerta;
}


function borrarError(){
    $borrado = false;
    
    if(isset($_SESSION['registrado'])){
        $_SESSION['registrado'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['errores']['general'])){
        $_SESSION['errores']['general'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['errores']['cod_producto'])){
        $_SESSION['errores']['cod_producto'] = null;
        $borrado = true;
    }
    if(isset($_SESSION['errores']['tamanio'])){
        $_SESSION['errores']['tamanio'] = null;
        $borrado = true;
    }
    
    if(isset($_SESSION['errores']['producto'])){
        $_SESSION['errores']['producto'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['error_login'])){
        $_SESSION['error_login'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['borrado'])){
        $_SESSION['borrado'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['falloborrado'])){
        $_SESSION['fallobrrado'] = null;
        $borrado = true;
    }


    
     return $borrado;
}