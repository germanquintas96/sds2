<?php
        $database = new mysqli("localhost","root","", "systemDigitalStock");
        
        

        $tabla="";
        if (isset($_POST['productos'])){
            $q=$database->real_escape_string($_POST['productos']);
        } else {
            $q = "";
        }
        $query= "SELECT p.cod_producto, p.nombre, m.cod_marca, p.id_producto FROM productos  p 
                INNER JOIN marcas m ON p.id_marca = m.id_marca 
                WHERE 
                p.activo = true  ";
        if( $q!="") {
             $query= "SELECT p.cod_producto, p.nombre, m.cod_marca, p.id_producto FROM productos  p 
                INNER JOIN marcas m ON p.id_marca = m.id_marca 
                WHERE 
                p.activo = true AND (
                p.cod_producto LIKE '%".$q."%' OR
                p.nombre LIKE '%".$q."%' OR
                m.cod_marca LIKE '%".$q."%')" ;
        }    
      
        $buscarProductos=$database->query($query);
            if ($buscarProductos->num_rows > 0)
            {
                $tabla.= 
                '<table class="table">
                    <tr class="bg-cabecera">
                        <td>Codigo de Producto</td>
                        <td>Nombre</td>
                        <td>Marca</td>
                        <td>Acciones</td>
                    </tr>';
                    
                while($filaProductos= $buscarProductos->fetch_assoc())
                {   
                    $tabla.=
                    '<tr>
                        <td>'.$filaProductos['cod_producto'].'</td>
                        <td>'.$filaProductos['nombre'].'</td>
                        <td>'.$filaProductos['cod_marca'].'</td>
                        <td>
                            <div>  
                                
                                <a  value="'.$filaProductos['id_producto'].'" class="enlace" href="editar_producto.php?id_producto='.$filaProductos['id_producto'].'" type="submit"> <i class="fas fa-edit"></i></a>
                                <a  value="'.$filaProductos['id_producto'].'" class="enlace" href="eliminar_producto.php?id_producto='.$filaProductos['id_producto'].'" type="submit"> <i class="fas fa-trash-alt"></i></a>
                           
                            <div>
                        </td>
                    </tr>';
                }
                $tabla.='</table>';
            }else{
                    $tabla='<span class="no-esta">No existe el producto.</span>';
                 }

        echo $tabla;

       
?>