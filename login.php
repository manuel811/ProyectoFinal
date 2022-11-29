<?php
require "controladores/controladorUsuario.php";

session_start(); //Siempre iniciar la session
if (isset($_POST["entrar"])) { //si le da al boton de entrar...

  $obtenerUser = obtenerUsuario($_POST["name"], $_POST["password"]);

  if ($obtenerUser) {
    hacerLogin($obtenerUser);
  } else {
    $errorLogin = "";
  }
}
if (isset($_POST["registrar"])) {
  header("Location: registro.php"); //Y lo mandamos al registro
  exit();
  //echo 'Entra aqui';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="scripts/sweetalert2.all.min.js"></script>
  <script src="scripts/script.js"></script>
  <link rel="stylesheet" href="./estilos/estilos.css" />
  <title>Login</title>
</head>

<body id="login">
  <div class="row justify-content-center cen pt-5 mt-5">
    <div class="col-s-3">
      <div>
        <img src="./media/Logo.png" alt="" />
      </div>
      <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input class="form-control" type="text" placeholder="Usuario" name="name" />
        <input class="form-control" type="password" placeholder="Contraseña" name="password" />
        <input class="form-control" type="submit" placeholder="Entrar" name="entrar" value="Entrar" />
        <input class="form-control" type="submit" placeholder="Registrar" name="registrar" value="Registrar" />
      </form>
      <?php
      if (isset($errorLogin)) {
        echo "<script>";
        echo "contrasenaIncorrecta();";
        echo "</script>";
      }
      ?>
    </div>

  </div>

</body>

</html>