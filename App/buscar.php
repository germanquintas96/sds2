<?php
    $mysqli = new mysqli("localhost","root","", "sds_bd");

    $salida = "";
    $query = "SELECT * FROM productos ORDER By Cod_producto";

    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT Cod_producto, Nombre, Marca, Cantidad FROM productos 
        WHERE Nombre LIKE '%".$q."%' OR Marca LIKE '%".$q."%' OR Cod_Producto LIKE '%".$q."%'";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        $salida.="<table class='tabla_datos'>
            <thead>
                <tr>
                    <td>Cod_Producto</td>
                    <td>Nombre</td>
                    <td>Marca</td>
                    <td>Cantidad</td>
                </tr>
            </thead>
            <tbody>";

        while($fila = $resultado->fetch_assoc()){
            $salida.="<tr>
                    <td class='columna-id'>".$fila['Cod_producto']."</td>
                    <td>".$fila['Nombre']."</td>
                    <td>".$fila['Marca']."</td>
                    <td>".$fila['Cantidad']."</td>
                    </tr>";
        }

        $salida.="</tbody></table>";


    } else {
        $salida.="No hay datos :(";

    }

    echo $salida;

    $mysqli->close();

?>