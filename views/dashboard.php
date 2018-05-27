<?php 

  require_once '../app/validacionGeneral.php';  

 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>METROFOOD - DASHBOARD</title>
  
</head>
<body>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php require_once '../src/header.php'; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>


  </head>

  <body>
   <?php 

  if($_SESSION['ROL'] == 'ADMIN'){
    require_once '../src/menuAdmin.php';
    echo "<center><h2> Bienvenido Administrador </h2></center>";
  }
  else{
    require_once '../src/menuAdmin.php';
    echo "<center><h2> Bienvenido Usuario </h2></center>";
  }
  

   ?>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
</body>
</html>