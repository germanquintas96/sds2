<?php require_once 'includes/header.php'; ?>

<body>
	<div class="box">
        <img class="logo" src="assets/img/logo2.png" alt="Logo de SDS">	
        <h1 class="titulo">System Digital Stock</h1>
        <hr class="subrayado" style="background:#cfd1f7; margin-top: -14px; width: 89%;">   
        <?php $tipo=$_SESSION['usuario']['tipo']?>  
            <?php if($tipo=='ADMIN'): ?>
            <div class="usuario" >          
                <span>Usuario: <?= $_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos'] ?> </span>         
            </div>  
        <?php endif;?>                                     
        <div  class="opcion-menu uno">
            <a   id="busqueda_productos" style="width:100%; height:100px;" ><p>BÚSQUEDA DE<br> PRODUCTOS</p></a>
            <img id="lupa" src="assets/img/lupa2.png" >	
        </div>    
        <div class="opcion-menu dos">
            <a id="gestion_productos" href="gestion_almacenamiento.php" > <p>GESTIÓN DE ALMACENAMIENTO</p></a>
            <img id="gestion" src="assets/img/gestion.png" >
        </div>
        <div class="" >        
            <a class="enlace salir-menu-principal" href="salir.php">Salir</a>
        </div>
    </div> 
    <script>
      $(function(){ 
            $('#busqueda_productos').mouseover(function() {
                $('#lupa').css('visibility','visible');
                $('#lupa').css('cursor','pointer');
                $('#lupa').click(function(){
                    window.open('busqueda_de_productos.php','_self');
                })
            });
            $('#busqueda_productos').mouseleave(function() {
                $('#lupa').css('visibility','hidden');
            });
        });

        $(function(){ 
            $('#gestion_productos').mouseover(function() {
                $('#gestion').css('visibility','visible');
                $('#gestion').css('cursor','pointer');
                $('#gestion').click(function(){
                    window.open('gestion_almacenamiento.php','_self');
                })
            });
            $('#busqueda_productos').mouseleave(function() {
                $('#gestion').css('visibility','hidden');
            });
        });
    </script>
</body>
<?php require_once 'includes/footer.php'; ?>