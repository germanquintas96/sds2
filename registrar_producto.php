<?php
//si recibe info por POST
if(isset($_POST)){
    
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
         session_start();
    }
   
    //recoger los valores del registro y asignarlo a variables si existen
    $producto = isset($_POST['producto']) ? mysqli_real_escape_string($database, $_POST['producto']) : false;
    $cod_producto =  isset($_POST['cod_producto']) ? mysqli_real_escape_string($database,$_POST['cod_producto']) : false; 
    $tamanio =  isset($_POST['tamanio']) ? mysqli_real_escape_string($database,$_POST['tamanio']) : false;
    $id_marca =  $_POST['marca'];
    $cubierto = isset($_POST['cubierto']);
    $fragil = isset($_POST['fragil']);
    $temperatura = $_POST['temperatura'];

    $errores = array();
    
    
    if(!empty($producto)){
        $producto_valido = true;
    }else {
        $producto_valido = false;
        $errores['producto'] = "Ingrese el nombre del producto";
    }

    if(!empty($cod_producto)){
        $cod_valido = true;
    }else {
        $cod_valido = false;
        $errores['cod_producto'] = "Ingrese el código del producto";
    }

    if(!empty($tamanio) && is_numeric($tamanio)){
        $tamanio_valido = true;
    }else {
        $tamanio_valido = false;
        $errores['tamanio'] = "Ingrese el tamaño en metros cuadrados";
    }



    if($cubierto){
        $cubierto=1;
    }else{
        $cubierto=0;
    }

    if($fragil){
        $fragil=1;
    }else{
        $fragil=0;
    }

    if(strlen($temperatura)==0){
        $temperatura=0;
    }
   
    if(count($errores)==0){
 
        $sql = "INSERT INTO productos VALUES(null, '$cod_producto', '$producto', $id_marca, $temperatura, $cubierto, $fragil, $tamanio, 1);";
       
        $guardar = mysqli_query($database,$sql);
      
    
        if($guardar){
            $_SESSION['registrado']="Se registró con exito el producto";
        }else{
            $_SESSION['errores']['general']="Fallo al registrar el producto";
        }
    }else{
        // si hay errores se guardan en una session para mostrar en agregar_producto.php
        $_SESSION['errores']=$errores;
    }    

    
}
header('Location: agregar_producto.php');    
?>
