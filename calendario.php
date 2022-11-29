<?php require "controladores/controladorUsuario.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./estilos/estilos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="./scripts/script.js"></script>
  <title>Calendario</title>
</head>

<body>
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
            <a class="nav-link" href="#" id="Calendario">Calendario</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./fichaje.php" id="Fichaje">Fichaje</a>
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
  <div id="calendarioContenedor">

    <div id="calendario">
      <div id="anterior" onclick="mesantes()"></div>
      <div id="posterior" onclick="mesdespues()"></div>
      <h2 id="titulos"></h2>
      <table id="diasc">
        <tr id="fila0">
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr id="fila1">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id="fila2">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id="fila3">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id="fila4">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id="fila5">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id="fila6">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
      <div id="buscafecha">
        <form action="#" name="buscar">
          <p class="textoCalendario">Buscar ... MES
            <select name="buscames">
              <option value="0">Enero</option>
              <option value="1">Febrero</option>
              <option value="2">Marzo</option>
              <option value="3">Abril</option>
              <option value="4">Mayo</option>
              <option value="5">Junio</option>
              <option value="6">Julio</option>
              <option value="7">Agosto</option>
              <option value="8">Septiembre</option>
              <option value="9">Octubre</option>
              <option value="10">Noviembre</option>
              <option value="11">Diciembre</option>
            </select>
            ... AÑO ...
            <input type="text" name="buscaanno" maxlength="4" size="4" />
            ...
            <input type="button" value="BUSCAR" onclick="mifecha()" />
          </p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>