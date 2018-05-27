<?php
 require_once '../controller/controllerRegistroUsuarios.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php 
    include_once '../src/header.php';
     ?>
    <script type="text/javascript" src="../resources/js/usuario.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registrate en MetroFood</title>
  </head>
  <body>
    <?php require_once '../src/menuResgistrar.php' ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Registrate</h1>
          <div class="list-group">
            <a href="registrar_restaurante.php" class="list-group-item">O registra tu restaurante</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <div class="row" id="InfoUsuarioCliente">

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                  </h5>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                  </h5>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Nombre de usuario
                  </h5>
                  <input type="text" class='form-control' name="nombreUsuario" id="nombreUsuario">
                </div>
              </div>
            

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Contraseña
                  </h5>
                  <input type="password" class='form-control' name="password" id="password">
                </div>
              </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Repetir contraseña
                  </h5>
                  <input type="password" class='form-control' name="repeatPassword" id="repeatPassword">
                </div>
              </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Nombres
                  </h5>
                  <input type="text" class='form-control' name="nombreCliente" id="nombreCliente">
                </div>
              </div>
            

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Apellidos
                  </h5>
                  <input type="text" class='form-control' name="apellidoCliente" id="apellidoCliente">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Edad
                  </h5>
                  <input type="number" class='form-control' name="edadCliente" id="edadCliente">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    DUI
                  </h5>
                  <input type="text" class='form-control' name="dui" id="dui">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Dirección
                  </h5>
                  <input type="text" class='form-control' name="direccionCliente" id="direccionCliente">
                </div>
              </div>


              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Teléfono(s)
                  </h5>
                  <input type="text" class='form-control' name="telefonoCliente" id="telefonoCliente">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <h5 class='form-group'>
                    Email
                  </h5>
                  <input type="email" class='form-control' name="emailCliente" id="emailCliente">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 mb-4">
                <div class="card-body">
                  <button class="btn btn-primary btn-sm" id="enviarDatosClientes">Guardar datos</button>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

  </body>

</html>