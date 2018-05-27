<!DOCTYPE html>
<html lang="es">
<head>
  <title>LogIn</title>
  <meta charset="UTF-8">
  <!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
  <link rel="stylesheet" href="css/main.css">
</head>
<body background="image3.jpg">
  
  <form id="#Administrador" action="controller/usuarioController.php" method="POST" autocomplete="on" class="full-box logInForm">

    <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
    <p class="text-center text-muted text-uppercase">Inicio de sesión</p>
    <div class="form-group label-floating">
      <label class="control-label" for="UserEmail">Usuario</label>
      <input class="form-control" id="UserEmail" type="text" required="true" placeholder="Nombre Usuario" name="username" >
      <p class="help-block">Usuario</p>
    </div>
    <div class="form-group label-floating">
      <label class="control-label" for="UserPass">Contraseña</label>
      <input class="form-control" id="UserPass" type="password" required="true" placeholder="Contraseña" name="password">
      <p class="help-block">Escribe tu contraseña</p>
    </div>
    <div class="form-group text-center">
      <input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger" name="login">
    </div>
  </form>
  <!--====== Scripts -->
  <script src="./js/jquery-3.1.1.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/material.min.js"></script>
  <script src="./js/ripples.min.js"></script>
  <script src="./js/sweetalert2.min.js"></script>
  <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="./js/main.js"></script>
  <script>
    //$.material.init();
  </script>
</body>
</html>