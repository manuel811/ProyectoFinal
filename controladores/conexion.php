<?php
    require "functionsCRUD.php";
    
    //Conexion---------------------------------------------------------------------------------------------
    $server = "localhost";
    $userDB = "root";
    $passwordDB = "";
    $nameDataBAse = "fichajedb";

    $conexion = mysqli_connect($server, $userDB, $passwordDB, $nameDataBAse);

    if(!$conexion){//Control de error para la conexion con DB
        echo  "Error en la conexion con la base de datos";
    }
    //-----------------------------------------------------------------------------------------------------

    //Crear usuario---------------------------------------------------------------------------------------------
    
    //  if(isset($_POST['registrar'])){
    //      //echo "entra";
    //      $id = $_POST["user"];
    //      $nombre = $_POST["name"];
    //      $email = $_POST["email"];
    //      $password =  $_POST["password"];
    //  }
