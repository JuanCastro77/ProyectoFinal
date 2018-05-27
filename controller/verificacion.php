<?php 

include_once '../model/Usuario.php';
if (isset($_POST['enviarDatos'])) {
	iniciarSesion();
}

function iniciarSesion()
{
	$nombreUsuario = $_POST['user'];
	$contrasenha = $_POST['pass'];

	$objUsuario = new Usuario();
	$objUsuario->iniciarSesion($nombreUsuario, $contrasenha);
}

 ?>