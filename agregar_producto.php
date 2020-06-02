<?php require_once 'includes/header.php'; ?>
<?php $query = mysqli_query($database, "SELECT * FROM marcas;");?>
<body>
	<div class="box">
        <img class="logo" src="assets/img/logo2.png" alt="Logo de SDS">	
                <h1 class="titulo">Agregar producto</h1>
                <hr class="subrayado" style="background:#cfd1f7; margin-top: -12px; width: 71%; margin-bottom:8%;">   
                <?php if(isset($_SESSION['registrado'])):?>
                        <div style="background:green;color:#fff; text-align:center;margin:2px; width: 101.7%;"class="SESSION-REG">
                            <?=$_SESSION['registrado'];?>
                        </div>    
                    <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div style="background:red; color:#fff;text-align:center;margin:2px;"class="SESSION-REG">
                            <?=$_SESSION['errores']['general'];?>
                        </div>  
                    <?php endif;?>
                <form action="registrar_producto.php" method="POST">		
                        <div class="box2" style="width:450px;">
                                <label for="producto" class="etiqueta">Producto:</label>
                                <input class="inputt" type="text" name="producto"  placeholder="Producto" />
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'producto'):''; ?>

                                <label for="cod_producto" class="etiqueta">Código:</label>
                                <input class="inputt" type="text" name="cod_producto"  placeholder="Código de Producto" />
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cod_producto'):''; ?>

                                <label for="tamanio" class="etiqueta">Tamaño:</label>
                                <input class="inputt" type="text" name="tamanio"  placeholder="Tamaño en m3" />
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'tamanio'):''; ?>
                                
                                <label for="marca" class="etiqueta marca">Marca:</label>
                                <select class="select" name="marca" style="width:38%; padding:5px; ">
                                        <?php 
                                       
                                        while($datos = mysqli_fetch_array($query)) 
                                        {                                                
                                        ?>
                                                <option value="<?php echo $datos['id_marca']?>"><?php echo $datos['nombre']?></option>
                                        <?php 
                                        }
                                        ?>
                                </select>
                         
                                <div style="clear:both;"></div>
                                <div class="checkboxs" > 
                                        <p class="izquierda">Caracteristicas: </p>        
                                        <label class="izquierda checkbox" ><input type="checkbox" id="cubierto" value="cubierto" name="cubierto"> Cubierto</label>
                                        <label class="izquierda checkbox"><input type="checkbox" id="fragil" value="fragil" name="fragil"> Frágil</label>
                                </div>
                                <div style="clear:both;"></div>
                                <div class="dosinputs">
                                <div clas="temperatura">
                                        <label for="temperatura">Temperatura °C</label>
                                        <input type="number" id="temperatura" name="temperatura">
                                <div>
                                <!-- <div clas="vencimiento">
                                        <label for="vencimiento">Vencimiento:</label> -->
                                        <?php //$fecha = date("d-m-y");?> 
                                <!-- <input class="vencimiento" type="date" id="vencimiento" name="vencimiento" value="<?php echo $fecha;?>"/>	
                                </div> --> 
                        </div>
                        <input class="btn btn-danger registrar " type="submit" value="Registrar"/>
                        
                </form> 
                <a class="enlace enlace-agregar" style="float:left; " href="menu_principal.php">Menú Principal</a>  
                <a style="float:right; "class="enlace enlace-agregar" href="salir.php">Salir</a>
        <?php borrarError(); ?>                        
        </div>  
        <div style="clear:both;"></div>
</body>

