<?php require_once 'includes/header.php'; ?>
<body>
	<div class="box-busqueda">
    <img class="logo" src="assets/img/logo2.png" alt="Logo de SDS">	
        <h1 class="largo titulo" style="color:black;">Búsqueda de Productos</h1>
        <hr class="subrayado" style="background:#000; margin-top: -12px; width: 39%;">   
        
        <section>
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar Producto">
            <a style="margin-left:76px;color:black;"href="agregar_producto.php">Agregar Producto<i style="color:green;width:40px;height:30px;margin-top:3px!important; margin-left:0px!important;"class="far fa-plus-square"></i></a>
            <?php if(isset($_SESSION['borrado'])):?>
                        <div style="background:green;color:#fff; text-align:center;margin:2px; width: 95.7%;height:33px;font-size:20px;"class="SESSION-REG">
                            <?=$_SESSION['borrado'];?>
                        </div>    
                    <?php elseif(isset($_SESSION['falloborrado'])):?>
                        <div style="background:red; color:#fff;text-align:center;margin:2px;  width: 95.7%;height:33px;font-size:20px;"class="SESSION-REG">
                            <?=$_SESSION['falloborrado'];?>
                        </div>  
                    <?php endif;?>
        </section>
        <div id="tabla_resultado">
            <!-- tabla de busqueda -->
        </div>
        
    
        
        <a style="float:left;"class="enlace enlace-menu-principal" href="menu_principal.php">Menú Principal</a>  
        <a style="float:right;margin-right:40px;"class="enlace enlace-menu-principal" href="salir.php">Salir</a>
       
      
        <?php borrarError(); ?>     
    </div> 
</body>
<?php require_once 'includes/footer.php'; ?>