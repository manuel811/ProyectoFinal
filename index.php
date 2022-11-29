<?php require "controladores/controladorUsuario.php"; ?>

<!-- -----------------------------------------SESSION--------------------------------------------------------------------------------------- -->
<?php
$mensajePicaje = "";
$picajeCorrecto = "";


session_start(); //Inicializar la session siempre.
comprobarLogin();


function fechaActual()
{
  //si le da al boton de fichar...
  $fecha = date("Y-m-d");
  return $fecha;
}
function horaActual()
{
  //si le da al boton de fichar...
  $entrada = date("H:i:s");
  return $entrada;
}


if (isset($_POST["entrar"])) {
  $fechaActual = fechaActual();
  $horaEntrada = horaActual();
  //Comprobar que no existe picaje de entrada para el usuario logado en la fecha que se realiza
  $actividadActual = recuperarActividadEnDB($fechaActual,  $_SESSION["usuario"]["id"]);
  if ($actividadActual != null) {
    $mensajePicaje = "Ya has realizado un picaje de entrada con el usuario " . $_SESSION["usuario"]["nombre"] . " a fecha " . $fechaActual;
    $errorAlertPicaje = "";
  } else {
    $idActividad = crearActividadEnDBEntrada(NULL, $fechaActual, $horaEntrada, $_SESSION["usuario"]["id"]);

    $picajeCorrecto = "Se ha realizado el picaje de entrada correctamente a la hora " . $horaEntrada;
    $okAlertPicaje = "";
  }
}


//Modificar en base de datos Salida y total poner Null


if (isset($_POST["salir"])) {
  $fechaActual = fechaActual();
  $horaSalida = horaActual();
  //Comprobar que no existe picaje de salida para el usuario logado ni está intentado picar salida antes de entrada
  $actividadActual = recuperarActividadEnDB($fechaActual, $_SESSION["usuario"]["id"]);

  if ($actividadActual == null) {
    $mensajePicaje = "Estás intentando realizar un picaje de salida cuando aún no se ha realizado el picaje de entrada.";
    $errorAlertPicaje = "";
  } else {
    if ($actividadActual['salida'] != null) {

      $mensajePicaje = "Error, ya tienes registrado un picaje de salida a las " . $actividadActual['salida'];
      $errorAlertPicaje = "";
    } else {


      //Calculo de horas entre dos fechas
      $horasTotales = ROUND(abs(strtotime($horaSalida) - strtotime($actividadActual['entrada'])) / (60 * 60), 5);
      modificarActividadEnDB($actividadActual['id'], $horaSalida, $horasTotales);
      $picajeCorrecto = "Se ha realizado el picaje de salida correctamente a la hora " . $horaSalida;
      $okAlertPicaje = "";
    }
  }
}



?>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->






<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="./estilos/estilos.css" />
  <script src="./scripts/script.js"></script>
  <script src="./scripts/sweetalert2.all.min.js"></script>
  <title>Home</title>
</head>

<body id="home">
  <!-- -------------------------------------------NAVBAR--------------------------------- -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="./media/Logo.png" class="logo-brand" alt="logo" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" id="home">Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./calendario.php" id="Calendario">Calendario</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./fichaje.php" id="Fichaje">Fichaje</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php" id="Salir">Salir</a>
          </li>
          <ul class="nav">

            <img class="imgNavbar" src="https://graph.facebook.com/66200111/picture?width=64&height=64" />
            <?php

            if (isset($_COOKIE["ifpUser"]) && !isset($_SESSION["usuario"])) {
              $_SESSION["usuario"] = obtenerUsuarioPorId($_COOKIE["ifpUser"]);
            }



            ?>
            <h4 class="pl-3 pt-2"> <?php echo  $_SESSION["usuario"]["nombre"] ?></h4>
            </a>
            </li>
          </ul>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ------------------------------------------FINAL-NAVBAR--------------------------------- -->

  <!-- -------------------------------------------HEADER--------------------------------- -->
  <div id="header">
  </div>
  <div class="titleHeader">
    <h1 class="display-4 ">
      Con Journ Work el control <br>
      horario es mucho más fácil
    </h1>

  </div>
  </div>




  <!-- --------------------------------------BOTON------------------------------------------------------ -->
  <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="row justify-content-center">
      <button type="submit" class="btn btn-outline-dark col-1 m-2 " name="entrar">
        <h3>Entrar</h3>
      </button>
      <button type="submit" class="btn btn-outline-dark col-1 m-2" name="salir">
        <h3>Salir</h3>
      </button>

    </div>


    <h5 class="row justify-content-center pt-3 text-danger"><?php echo $mensajePicaje;
                                                            if (isset($errorAlertPicaje)) {
                                                              echo "<script>";
                                                              echo "fichajeIncorrecto();";
                                                              echo "</script>";
                                                            } ?></h5>
    <h5 class="row justify-content-center pt-3 text-success"><?php echo $picajeCorrecto;
                                                              if (isset($okAlertPicaje)) {
                                                                echo "<script>";
                                                                echo "fichajeCorrecto();";
                                                                echo "</script>";
                                                              } ?></h5>
  </form>

  <!-- ------------------------------------FIN--BOTON------------------------------------------------------ -->




  <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <?php
  if (isset($errorFichajeEntrar)) {
    echo "<script>";
    echo "errorr();";
    echo "</script>";
  }
  ?>
  <script>
    setInterval(heroSlideShow, 3000);
  </script>
</body>

</html>

<!-- Codigo ------------------------------------------------------------------------------------------------------------------------------->