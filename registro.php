<?php require "controladores/controladorUsuario.php"; ?>

<?php
//registrarUsuario('26', '456', 'asd@gmail.com', 'Javi');
session_start(); //Siempre iniciar la session
if (isset($_POST["registro"])) { //si le da al boton de registrar...
  //envio estos parametros por POST para crear usuario
  registrarUsuario(
    null,
    $_POST['password'],
    $_POST['email'],
    $_POST['name']
  );
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="./estilos/estilos.css" />
  <title>Registro</title>
</head>

<body id="registro">
  <div class="row justify-content-center cen pt-5 mt-5">
    <div class="col-s-3">
      <div>
        <img src="./media/Logo.png" alt="" />
      </div>
      <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input class="form-control" type="text" placeholder="Nombre" name="name" required />
        <input class="form-control" type="password" placeholder="Contraseña" name="password" required />
        <input class="form-control" type="password" placeholder="Confirmar contraseña" name="password2" required />
        <input class="form-control" type="text" placeholder="Correo Electronico" name="email" required />
        <input class="form-control" type="submit" placeholder="Registrar" value="Registro" name="registro" />
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>