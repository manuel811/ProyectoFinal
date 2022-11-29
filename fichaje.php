<?php
require "controladores/conexion.php";
//require "controladores/controladorUsuario.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="./estilos/estilos.css" />
  <script src="./scripts/script.js"></script>
  <title>Fichaje</title>
</head>

<body id="pageFichaje">
  <img class="imgBackgroundFichaje" src="./media/bgCalendar.jpg" alt="background">
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
            <a class="nav-link" href="./index.php" id="home">Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./calendario.php" id="Calendario">Calendario</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#" id="Fichaje">Fichaje</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php" id="Salir">Salir</a>
          </li>
          <ul class="nav">
            <img class="imgNavbar" src="https://graph.facebook.com/66200111/picture?width=64&height=64" />
            <h4 class="pl-3 pt-2"> <?php echo  $_SESSION["usuario"]["nombre"] ?></h4>
            </a>
            </li>
          </ul>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ------------------------------------------FINAL-NAVBAR--------------------------------- -->

  <div class="row pl-5 pt-5 mt-5  overflow-scroll">
    <div id="tablaFichaje" class="col-md-7">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope=" col">Fecha</th>
            <th scope="col">Entrada</th>
            <th scope="col">Salida</th>
            <th scope="col">Tiempo</th>
          </tr>
          <?php
          $sql = "SELECT * FROM actividades AS act,usuarios AS us WHERE act.usuario=us.id AND us.id=" . $_SESSION["usuario"]["id"];
          $result = mysqli_query($conexion, $sql);
          while ($mostrar =  mysqli_fetch_array($result)) {


          ?>
        </thead>
        <tbody>
          <tr>
            <th scope="row"> <?php echo $mostrar['fecha'] ?></th>
            <td><?php echo $mostrar['entrada'] ?></td>
            <td><?php echo $mostrar['salida'] ?></td>
            <td><?php echo $mostrar['total'] ?></td>
          </tr>
          <?php //echo $mostrar['nombre'] 
          ?>
        </tbody>
      <?php
          }

      ?>
      </table>
    </div>
  </div>




</body>

</html>