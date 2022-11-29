<?php
//***********************************************************CRUD**************************************** ********************************/

//Ejemplo para insertar (CREATE)-------------------------------------------------------------------------------------------------------------


function crearUsuarios($id, $contrasena, $correo, $nombre)
{ //Debe corresponder con los campos de la BBDD
    global $conexion;
    $consulta = "INSERT INTO usuarios (id, contrasena, correo, nombre)
                    VALUES ('$id','$contrasena','$correo','$nombre')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        return true;
    } else {
        echo $conexion->error;
        return false;
    }
}
//He quitado variable salida y total porque son nulas
function crearActividadEnDBEntrada($id, $fecha, $entrada, $usuario)
{ //Debe corresponder con los campos de la BBDD
    global $conexion;
    $consulta = "INSERT INTO actividades (id, fecha, entrada, usuario)
                    VALUES ('$id','$fecha','$entrada', '$usuario')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        return true;
    } else {
        echo $conexion->error;
        return false;
    }
}

function recuperarActividadEnDB($fecha, $usuario)
{ //Debe corresponder con los campos de la BBDD
    global $conexion;
    $consulta = "SELECT * FROM actividades WHERE fecha='$fecha' AND usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_assoc($resultado);

    return $fila;
}

// Meto variable de horas totales
function modificarActividadEnDB($id,  $salida, $horasTotales)
{ //Debe corresponder con los campos de la BBDD
    global $conexion;
    $consulta = "UPDATE actividades
                        SET salida = '$salida'
                        ,total = '$horasTotales'
                        WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        return true;
    } else {
        echo $conexion->error;
        return false;
    }
}

//Ejemplo para realizar una consulta (READ)---------------------------------------------------------------------------------------
function listarUsuarios()
{
    global $conexion;
    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conexion, $consulta);
    // while($fila = mysqli_fetch_row($resultado)){
    //     print_r($fila);//Este while me mostrara todas las filas metidas en un array
    //     echo "<br>";
    // };

    $usuarios = array();
    if ($resultado) { //control de errores
        //Este while es mejor porque con el assoc asigna directamnete con los valores de las columnas
        // while($fila = mysqli_fetch_assoc($resultado)){
        //     echo $fila["email"];//
        //     echo "<br>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($usuarios, $fila); //En lugar imprimimrlos, los devuelvo en un array
        }
        return $usuarios;
    } else {
        echo $conexion->error; //Acedo directamente al error del objeto.
    }
}


//Ejemplo para actializar (UPDATE)--------------------------------------------------------------------------------------------
function actualizarUsuarios($id, $contrasena, $correo, $nombre)
{ //Debe corresponder con los campos de la BBDD
    global $conexion;
    $consulta = "UPDATE usuarios
                    SET contrasena = '$contrasena', 
                        correo = '$correo',
                        nombre = '$nombre'
                    WHERE id = '$id'
                    ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        return true;
    } else {
        echo $conexion->error;
        return false;
    }
}

//Ejemplo para borrar (DELETE)-------------------------------------------------------------------------------------------------------------
function borrarUsuarios($id)
{ //Solo necesito el id
    global $conexion;
    $consulta = "DELETE FROM usuarios
                    WHERE id = '$id'
                    ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        return true;
    } else {
        echo $conexion->error;
        return false;
    }
}
