<?php require_once 'includes/header.php'; ?>
<body>
	<div class="box">
    <img class="logo" src="assets/img/logo2.png" alt="Logo de SDS">	
    <h1 class="titulo">System Digital Stock</h1>
    <hr style="background:white; margin-top: -14px; width: 89%;">
     
        <h1 id="login" >Login</h1>
        <?php if(isset($_SESSION['error_login'])): ?> 
            <div class="alerta-error-login">
                <span> <?=$_SESSION['error_login']?></span>
            </div>
        <?php endif;?> 
            <form action="login.php" method="POST">	                        
			    <input type="text" name="id" class="input" placeholder="ID Usuario">				
			    <input type="password" name="password" class="input" placeholder="Contraseña">
			    <input class="btn btn-primary btn-ingresar" type="submit" value="Ingresar">
            </form>
            <a class="enlace recuperar-password" href="recuperar_password.php">Recuperar Contraseña</a>
        <?php borrarError(); ?>       
    </div>
</body>
<?php require_once 'includes/footer.php'; ?>
