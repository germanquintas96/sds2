<?php
require_once 'includes/conexion.php';

if(!isset($_SESSION)){
    session_start();
}

if(isset($_GET)){ 
    $id = htmlspecialchars($_GET['id_producto']);
    $producto = mysqli_query($database,"SELECT *  FROM productos WHERE id_producto = $id;");
                                       
                   
    $activo = mysqli_fetch_assoc($producto);
    

    $sql = "UPDATE productos SET 
    activo = 0
    WHERE id_producto = $id; ";

    $guardar = mysqli_query($database,$sql);

    if($guardar){
        $_SESSION['borrado']="Se elimino el producto ".$activo['nombre']."";
    }else{
        $_SESSION['falloborrado']="Fallo al eliminar el producto ".$activo['nombre']."";
    }

    header('Location: busqueda_de_productos.php');
}      


?>