<?php
    require "controladores/controladorUsuarios.php";

    session_start();//Siempre iniciar la session
    if(isset($_POST["login"])){//si le da al boton de entrar...

        $obtenerUser = obtenerUsuario($_POST["user"], $_POST["password"]);

        if($obtenerUser){
            hacerLogin($obtenerUser);
        }else{
            $errorLogin= "";
        }
    }
    if(isset($_POST["registro"])){
        header("Location: registro.php");//Y lo mandamos al registro
        exit();
        //echo 'Entra aqui';
    }    
?>


<?php

function hacerLogin($usuario){
    //Si el usuario y contraseña es correcto, la sseion del index va a tener un valor y si no lo va a mandar al login
    $idUsuario = $usuario["id"];
    $_SESSION["usuario"] = $usuario;

    //Asignar cookie, le paso un nombre y el usuario y tambn tiempo (300s) corto para ir probando 
    setcookie("ifpUser", $idUsuario, time()+300);
    
    header("Location: index.php");//Y lo mandamos al index
    exit();
}

?>
