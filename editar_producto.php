<?php require_once 'includes/header.php'; ?>
<?php $query = mysqli_query($database, "SELECT * FROM marcas;");?>
<body>
	<div class="box">
        <img class="logo" src="assets/img/logo2.png" alt="Logo de SDS">		
                <h1 class="titulo">Modificar Producto</h1>
                <hr class="subrayado" style="background:#cfd1f7; margin-top: -12px; width: 80%; margin-bottom:8%;"> 
                <?php if(isset($_SESSION['registrado'])):?>
                        <div style="background:green;color:#fff; text-align:center;margin:2px; width: 101.7%;height:33px;font-size:20px;"class="SESSION-REG">
                            <?=$_SESSION['registrado'];?>
                        </div>    
                    <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div style="background:red; color:#fff;text-align:center;margin:2px;  width: 101.7%;height:33px;font-size:20px;"class="SESSION-REG">
                            <?=$_SESSION['errores']['general'];?>
                        </div>  
                    <?php endif;?>

                <?php if(isset($_GET)){ //ME ENCANTA
                        $id = htmlspecialchars($_GET['id_producto']);
                        $producto = mysqli_query($database,"SELECT p.id_producto,
                                                                   p.cubierto,
                                                                   p.fragil,
                                                                   p.nombre, 
                                                                   p.cod_producto,
                                                                   p.tamanio, 
                                                                   p.temperatura, 
                                                                   m.id_marca, 
                                                                   m.nombre AS nombre_marca 
                                                            FROM productos p 
                                                            INNER JOIN marcas m ON p.id_marca = m.id_marca
                                                            WHERE id_producto = $id;         
                                                         " );  
                        $array_producto = mysqli_fetch_assoc($producto);
                }         
                ?>    
                <form action="modificar_producto.php" method="POST">		
                        <div class="box2" style="width:450px;">
                                <input class="inputt" type="text" name="id_producto" hidden value="<?php echo $array_producto['id_producto'];?>" />
                               
                                <label for="producto" class="etiqueta">Producto:</label>
                                <input class="inputt" type="text" name="producto"  value="<?php echo $array_producto['nombre'];?>" />
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'producto'):''; ?>

                                <label for="cod_producto" class="etiqueta">Código:</label>
                                <input class="inputt" type="text" name="cod_producto"  value="<?php echo $array_producto['cod_producto'];?>" />
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cod_producto'):''; ?>

                                <label for="tamanio" class="etiqueta">Tamaño:</label>
                                <input class="inputt" type="text" name="tamanio"  value="<?php echo $array_producto['tamanio'];?>" />
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'tamanio'):''; ?>                        
                                <label for="marca" class="etiqueta marca">Marca:</label>
                                <select class="select" name="marca" style="width:38%; padding:5px; background:white; color:black;" >
                                        <!-- el primer option muestra la marca del producto y dps ene l while muestra todas las demas marcas -->
                                        <option value="<?php echo $array_producto['id_marca'];?>"><?php echo $array_producto['nombre_marca'];?></option>
                               
                                        <?php while($marca_producto = mysqli_fetch_array($query)){
                                                if($marca_producto['id_marca']!= $array_producto['id_marca']){
                                        ?>
                                                <option value="<?php echo $marca_producto['id_marca'];?>"><?php echo $marca_producto['nombre'];?></option>
                                        <?php
                                                        }
                                                }
                                        ?>        
                                </select>
                                <div style="clear:both;"></div>

                                <div class="checkboxs" > 
                                        <p class="izquierda">Caracteristicas: </p>        
                                        <label class="izquierda checkbox" ><input type="checkbox" 
                                                <?php if($array_producto['cubierto']==1){?> 
                                                        checked 
                                                <?php } ?>
                                                id="cubierto" value="<?php echo $array_producto['cubierto'];?>" name="cubierto">Cubierto
                                        </label>
                                        
                                        <label class="izquierda checkbox"><input type="checkbox" 
                                                <?php if($array_producto['cubierto']==1){?> 
                                                        checked 
                                                <?php } ?>
                                                id="fragil" value="<?php echo $array_producto['fragil'];?>" name="fragil"> Frágil
                                        </label>
                                </div>
                        
                                <div style="clear:both;"></div>
                                <div clas="temperatura">
                                        <label for="temperatura" style="font-size:15px;">Temperatura °C</label>
                                        <input type="number" id="temperatura" name="temperatura" value="<?php echo $array_producto['temperatura'];?>">
                                <div>

                                <!-- <input class="inputt" type="text" name="producto"  value="<?php echo $array_producto['nombre_marca'];?>" /> -->
                                
                           
                               
                        </div>
                        <input class="btn btn-danger registrar " type="submit" value="Modificar"/>
                        
                </form> 
                <a class="enlace enlace-agregar" style="float:left; " href="menu_principal.php">Menú Principal</a>  
                <a style="float:right; "class="enlace enlace-agregar" href="salir.php">Salir</a>
        <?php borrarError(); ?>                        
        </div>  
        <div style="clear:both;"></div>
</body>

