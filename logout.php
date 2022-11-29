<?php
    //Se cierra destruye la session y cookie, pero primero debe de estar creada.
    session_start();

    setcookie("ifpUser", $nombreUsuario, time()-300);//elimino la cookie, seteandola con su tiempo de vida en negativo 
    session_destroy();//se destruye  la sesion
    

    //luego despues de cerrar la session que se regrese autumaticamente al index
    header("Location: index.php");
    exit();
?>