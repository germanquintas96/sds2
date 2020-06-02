<?php
//Incluye la conexion
require_once 'includes/conexion.php';

if(isset($_POST)){
    //Asigna valores traidos por POST a variables
    $id_usuario =($_POST['id']);
    $password = ($_POST['password']);
    
    //Hace la consulta al servidor
    $sql = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
   
    //Asigna la query a la variable $login
    $login = mysqli_query($database, $sql);
    
    if($login && mysqli_num_rows($login) ==1){
        //Asocia el sql a un objeto
        $usuario = mysqli_fetch_assoc($login);
        
       //Verificar la password con el objeto $usuario y arra passsword y asignarlo a una variable 
        $verify = password_verify($password, $usuario['password']);       
         
        if($verify){
            //mensaje de inicio de usuario
            $_SESSION['usuario']=$usuario;
            header('Location: menu_principal.php');           
            
        }else{
            //mensaje de serror
            $_SESSION['error_login'] = "Login incorrecto!";
            header('Location: index.php');
        }
    }   
}




